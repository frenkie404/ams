<?php
$path = $_SERVER["DOCUMENT_ROOT"];
include $path . "/includes/session.php";
include $path . "/includes/functions.php";
include $path . "/includes/db/connection.php";

$logged_in_as = get_session("logged_in_as");

if (!$logged_in_as || $logged_in_as !== "teacher") {
  return redirect("/");
}

$action = $_GET["action"];

$student_id = $_GET["student_id"];
$teacher_id = get_session("teacher")["id"];
$current_datetime = date("Y-m-d H:i:s");
$was_present = $action === "present" ? 1 : 0;

$insert_query = "INSERT INTO attendance VALUES(
    '',
    '$student_id',
    '$teacher_id',
    '$current_datetime',
    '$was_present'
)";

$result = mysqli_query($conn, $insert_query);

if ($result) {
  redirect("/dashboard");
} else {
  echo mysqli_error($conn);
}

?>
