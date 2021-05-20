<?php
include "../../includes/db/connection.php";
$table_to_read_from = $_POST["table_to_read_from"];

$read_query = "SELECT * FROM $table_to_read_from";
$result = mysqli_query($conn, $read_query);

if ($result) {
  $rows = [];
  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $rows[] = $row;
  }
  header("HTTP/1.1 200 Ok");
  echo json_encode($rows);
} else {
  header("HTTP/1.1 500 Internal Server Error");
  echo mysqli_error($conn);
}

?>
