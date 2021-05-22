<?php

include "../../includes/db/connection.php";
include "../../includes/session.php";

$fullname = $_POST["name"];
$email = $_POST["email"];
$faculty = $_POST["faculty"];
$semester = $_POST["semester"];
$associated_subject = isset($_POST["associated_subject"])
  ? $_POST["associated_subject"]
  : null;
$admin_action = get_session("admin_action");

$table = $admin_action === "create_student" ? "students" : "teachers";
$teacher_insert_query = "INSERT INTO $table 
                  VALUES(
                          '', 
                          '$fullname', 
                          '$email', 
                          '$faculty', 
                          '$semester', 
                          '$associated_subject', 
                          ''
                          )
                  ";
$student_insert_query = "INSERT INTO $table 
                  VALUES(
                          '', 
                          '$fullname', 
                          '$email', 
                          '$faculty', 
                          '$semester',  
                          ''
                          )
                  ";

$result =
  $admin_action === "create_student"
    ? mysqli_query($conn, $student_insert_query)
    : mysqli_query($conn, $teacher_insert_query);

if ($result) {
  header("HTTP/1.1 201 Created");
} else {
  header("HTTP/1.1 500 Internal Server Error");
  echo mysqli_error($conn);
}
?>
