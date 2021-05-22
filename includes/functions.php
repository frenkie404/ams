<?php

function redirect($path)
{
  header("Location: " . $path);
  return die();
}

function output_table($headings, $data, $current_user)
{
  echo "<table class=\"w-full\">";
  echo "<tr class=\"mb-2 border-current border-b-2\">";

  foreach ($headings as $heading) {
    echo "<th class=\"p-4 text-center\">$heading</th>";
  }

  echo "</tr>";

  foreach ($data as $student) {
    $id = $student["id"];
    echo "<tr class=\"mb-2 border-current border-b-2\">";
    foreach ($student as $key => $value) {
      if ($key !== "id") {
        echo "<td class=\"p-4 text-center\">$value</td>";
      }
    }
    if ($current_user === "teacher") {
      echo "<td class=\"p-4 text-center\">
                <a href=\"/controllers/teacher/handleAttendance?student=$id&action=present\"  class=\"btn mr-4\">Present</a>
                <a href=\"/controllers/teacher/handleAttendance?student=$id&action=absent\"  class=\"btn\">Absent</a>
            </td>";
    } else {
      echo "<td class=\"p-4 text-center\">
                <a href=\"/controllers/admin?action=edit\"  class=\"btn mr-4\">Present</a>
                <a href=\"/controllers/admin/delete?id=x\"  class=\"btn\">Absent</a>
        </td>";
    }

    echo "</tr>";
  }

  echo "</table>";
}

?>
