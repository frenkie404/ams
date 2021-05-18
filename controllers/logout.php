<?php
	if(isset($_POST["logout"])){
        session_start();

	session_destroy();
	session_unset();
	header('location:/');
    }
?>