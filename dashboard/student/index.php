<?php
$student = get_session("student");

if ($student["password"] === null) {
  include "setPassword.php";
  return;
}
?>

<h3>student has password</h3>
