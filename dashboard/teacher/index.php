<?php
$teacher = get_session("teacher");

if ($teacher["password"] === null) {
  include "setPassword.php";
  return;
}
?>

<h3>teacher has password</h3>
