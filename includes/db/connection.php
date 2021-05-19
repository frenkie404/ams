<?php

// Create connection

$conn = mysqli_connect("localhost", "root", "", "sms");

function closeDBConnection($conn)
{
  mysqli_close($conn);
}

// sql to create table

$create_teachers_table = "CREATE TABLE IF NOT EXISTS teachers (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    faculty text(4),
    semester text(6),
    associated_subject VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

$create_students_table = "CREATE TABLE IF NOT EXISTS students (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    faculty text(4),
    semester text(6),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if (
  mysqli_query($conn, $create_teachers_table) &&
  mysqli_query($conn, $create_students_table)
) {
  return header("HTTP/1.1 200 OK");
} else {
  return header("HTTP/1.1 500 Internal Server Error");
}

?>
