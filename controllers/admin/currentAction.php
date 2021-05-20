<?php
$path = $_SERVER["DOCUMENT_ROOT"];
include $path . "/includes/session.php";
include $path . "/includes/functions.php";

$action = $_GET["action"];
set_session("admin_action", $action);
header("HTTP/1.1 202 Ok");
?>
