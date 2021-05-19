<?php

include "../../includes/db/connection.php";

$fullname = $_POST["name"];
$email = $_POST["email"];
$faculty = $_POST["faculty"];
$semester = $_POST["semester"];
$associated_subject = $_POST["associated_subject"];
$create_type = $_POST["create_type"];

$table = $create_type . "s";
$insert_query = "INSERT INTO $table 
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

$result = mysqli_query($conn, $insert_query);

if ($result) {
  header("HTTP/1.1 201 Created");
} else {
  header("HTTP/1.1 500 Internal Server Error");
  echo mysqli_error($conn);
}
?>
