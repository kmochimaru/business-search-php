<?php
  // require_once("../db_connection.php");

  $host = "localhost";
  $user = "chiangr1";
  $pass = "!Kenjung288";
  $database = "chiangr1_bs";
  $conn = new mysqli(, $user, $pass, $database);

  $sql = "SELECT * FROM category";
  $result = $conn->query($sql);
  while ($row = $result->fetch_assoc()) {
      $rows[] = $row;
  }
  $conn->close();
  echo json_encode($rows);

  ?>
