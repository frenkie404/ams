<?php

include "./includes/session.php";
include "./includes/functions.php";
include "./includes/header.php";

function handleRouting()
{
  $logged_in_as = get_session("logged_in_as");
  if (!$logged_in_as) {
    include "./screens/landing.php";
  } else {
    redirect("/dashboard");
  }
}

$error = get_session("error");

if (!$error) {
  handleRouting();
} else {
  switch ($error) {
    case 500:
      include "./screens/500.php";
  }
}

include "./includes/footer.php";
?>
