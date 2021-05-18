<?php

    include "./includes/session.php";
    include "./includes/functions.php";
    include "./includes/header.php";

    $logged_in_as = get_session("logged_in_as");
    
   switch($logged_in_as){
        case null:
            include "./screens/landing.php";
            break;
   }

    include "./includes/footer.php";
?>

