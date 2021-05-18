<?php

    include "./includes/session.php";
    include "./includes/functions.php";
    include "./includes/header.php";

    $logged_in_as = get_session("logged_in_as");
    
   if(!$logged_in_as){
    include "./screens/landing.php";
   }else{
       redirect("/dashboard");
   }

    include "./includes/footer.php";
?>

