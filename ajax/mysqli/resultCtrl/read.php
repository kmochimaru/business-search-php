<?php
  require_once("../db_connection.php");

  $sql = "SELECT * FROM result";
  $result = $conn->query($sql);
  while ($row = $result->fetch_assoc()) {
      $rows[] = $row;
  }
  $conn->close();
  echo json_encode($rows);
