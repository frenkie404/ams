<?php
include "../../includes/db/connection.php";
include "../../includes/session.php";
include "../../includes/functions.php";

$type = $_GET["type"];
$logged_in_as = get_session("logged_in_as");
$teacher = get_session("teacher");

$read_query = "SELECT id, fullname, email, faculty, semester FROM $type";

if ($logged_in_as === "teacher" && $teacher) {
  $faculty = $teacher["faculty"];
  $semester = $teacher["semester"];
  $read_query = "SELECT id, fullname, email, faculty, semester FROM $type WHERE faculty='$faculty' AND semester='$semester'";
}

$result = mysqli_query($conn, $read_query);

if ($result) {
  $rows = [];
  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $rows[] = $row;
  }
  header("HTTP/1.1 200 Ok");
  set_session("data", $rows);
  redirect("/dashboard");
  // echo json_encode($rows);
} else {
  header("HTTP/1.1 500 Internal Server Error");
  echo mysqli_error($conn);
}

?>
