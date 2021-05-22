<?php

$teacher = get_session("teacher");
$data = get_session("data");

if ($teacher["password"] === null) {
  include "setPassword.php";
  return;
}
?>

<article id="output" class="p-4 ml-12 w-full">

  <?php if ($data) {
    output_table(
      ["Fullname", "Email", "Faculty", "Semester", "Actions"],
      $data,
      "teacher"
    );
  } else {
    echo "<h3>Hello" . $teacher["fullname"] . ", welcome to the _board</h3>";
  } ?>

</article>

<nav class="p-4 bg-blue-600 text-white rounded-lg shadow-xl">
    <div class="nav__wrap">
        <ul>
            <li><a href="/controllers/admin/read.php?type=students" class="btn btn--white w-max min-w-full">Get Students</a></li>
        </ul>
    </div>
</nav>
