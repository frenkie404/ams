<?php

$student = get_session("student");

if ($student["password"] === "" || $student["password"] === null) {
  include "setPassword.php";
  return;
}
?>

<article class="p-4 ml-12 w-full">
  <h3 class="text-4xl font-bold"><?php echo $student["fullname"]; ?></h3>
  <div class="w-max">
    <strong><?php echo strtoupper($student["faculty"]); ?></strong>
    <em><?php echo $student["semester"]; ?></em>
  </div>

  <?php
  $student_id = $student["id"];
  $select_query = "SELECT associated_subject, was_present, fullname, date 
                    FROM attendance 
                    INNER JOIN teachers 
                    ON teacher=teachers.id 
                    WHERE student='$student_id'
                  ";

  $result = mysqli_query($conn, $select_query);

  if ($result) {
    $rows = [];
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
      $rows[] = $row;
    }
    // echo count($rows);
    output_table(
      ["Subject", "Was Present", "Teacher", "Date"],
      $rows,
      "student"
    );
  }
  ?>

</article>
