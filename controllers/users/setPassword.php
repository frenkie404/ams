<?php

include "../../includes/session.php";
include "../../includes/functions.php";
include "../../includes/db/connection.php";

if (!isset($_POST["password"]) || $_POST["password"] === "") {
  echo "password is empty!!";
  return;
}

$logged_in_as = get_session("logged_in_as");
$table = $logged_in_as . "s";

$user = get_session($logged_in_as);
$user_id = $user["id"];

$password = $_POST["password"];

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$update_query = "UPDATE $table SET password='$hashed_password' WHERE id='$user_id'";

$result = mysqli_query($conn, $update_query);

if ($result) {
  unset_session([$logged_in_as, "logged_in_as"]);
  redirect("/login");
} else {
  echo mysqli_error($conn);
}
?>
