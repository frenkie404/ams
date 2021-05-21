<?php
include "../includes/session.php";
include "../includes/functions.php";

$user_role = get_session("user_role");
$logged_in_as = get_session("logged_in_as");

if (!$logged_in_as || $logged_in_as !== $user_role) {
  redirect("/login");
}

include "../includes/header.php";
?>

<main class="w-screen h-4/5 px-12 pt-3 mt-12">
    <?php include "./$user_role/index.php"; ?>
</main>

<?php include "../includes/footer.php";
?>
