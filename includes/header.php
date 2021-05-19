<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/style.css" />
    <title>
        <?php if (!isset($_SESSION["user_role"])) {
          echo "HDC AMS";
        } else {
          echo $_SESSION["user_role"];
        } ?>
    </title>
</head>

<!-- check connection to database -->

<?php
include "db/connection.php";

if (mysqli_connect_errno()) {
  echo mysqli_connect_error();
  set_session("error", "500");
}
?>

<body class="bg-gray-200 grid place-items-center min-h-screen overflow-x-hidden font-body">
    <nav class="bg-blue-600 text-white px-12 py-4 shadow-lg w-full fixed top-0 z-10">
        <div class="flex justify-between">
            <a href="/" class="text-lg">Team R2HS</a>
            <?php if (isset($_SESSION["logged_in_as"])) {
              echo '<form action="/controllers/logout.php" method="post">
                    <input type="submit" name="logout" value="Logout" class="btn" />
                </form>';
            } ?>
        </div>   
    </nav>