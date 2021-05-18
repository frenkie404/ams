<?php
    include "../includes/session.php";
    include "../includes/functions.php";

    $user_role = get_session("user_role");
    $logged_in_as = get_session("logged_in_as");

    if(!$logged_in_as || $logged_in_as !== $user_role){
        redirect("/login");
    }

    include "../includes/header.php";
?>

<main>
    <h1>Dashboard for <?php echo get_session("logged_in_as") ?></h1>
</main>