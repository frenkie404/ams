<?php
include "../includes/session.php";
include "../includes/functions.php";
include "../includes/db/connection.php";

if (isset($_POST["login"])) {
  validate_login();
}

function validate_login()
{
  $email = $_POST["email"];
  $password = $_POST["password"];
  $user_role = get_session("user_role");

  if ($email === "") {
    echo "email is empty!";
    header("HTTP/1.1 400 Bad Request");
    exit(400);
  }

  if ($user_role === "admin") {
    validate_admin($email, $password);
  } else {
    validate_user($user_role, $email, $password);
  }
}

function validate_admin($email, $password)
{
  if ($email === "admin" && $password === "admin") {
    set_session("logged_in_as", "admin");
    redirect("/dashboard");
  }
  echo "invalid credentials";
  return false;
}

function validate_user($user_role, $email, $password)
{
  $table = $user_role . "s";
  $read_query = "SELECT * FROM $table WHERE email='$email'";
  global $conn;
  $result = mysqli_query($conn, $read_query);

  if ($result->num_rows > 0) {
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if ($user["password"] === "" || $user["password"] === null) {
      set_session("logged_in_as", $user_role);
      set_session($user_role, $user);
      redirect("/dashboard");
    } else {
      if (password_verify($password, $user["password"])) {
        set_session("logged_in_as", $user_role);
        set_session($user_role, $user);
        redirect("/dashboard");
      } else {
        echo "invalid";
      }
    }
  } else {
    header("HTTP/1.1 500 Internal Server Error");
    echo mysqli_error($conn);
  }
}
?>
