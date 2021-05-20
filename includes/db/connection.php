<?php

// Create connection

$conn = mysqli_connect("localhost", "root", "", "sms");

function closeDBConnection($conn)
{
  mysqli_close($conn);
}

// sql to create table

$current_time = date("Y-m-d H:i:s");
$create_teachers_table = "CREATE TABLE IF NOT EXISTS teachers (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(30) NOT NULL,
    email VARCHAR(50) UNIQUE NOT NULL,
    faculty text(4) NOT NULL,
    semester text(6) NOT NULL,
    associated_subject VARCHAR(50) NOT NULL,
    password VARCHAR(50) DEFAULT NULL
    )";

$create_students_table = "CREATE TABLE IF NOT EXISTS students (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  fullname VARCHAR(30) NOT NULL,
  email VARCHAR(50) UNIQUE NOT NULL,
  faculty text(4) NOT NULL,
  semester text(6) NOT NULL,
  password VARCHAR(50) DEFAULT NULL
  )";

if (
  mysqli_query($conn, $create_teachers_table) &&
  mysqli_query($conn, $create_students_table)
) {
  return header("HTTP/1.1 200 OK");
} else {
  echo mysqli_error($conn);
  return header("HTTP/1.1 500 Internal Server Error");
}

?>
