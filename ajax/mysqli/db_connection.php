<?php
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Headers: *");

  $host = "localhost";
  // $user = "root";
  // $pass = "";
  // $database = "business-search";
  $user = "chiangr1";
  $pass = "!Kenjung288";
  $database = "chiangr1_bs";

  $conn = new mysqli($host, $user, $pass, $database);

  if ($conn->connect_errno) {
      echo 'Error ' .$mysqli->connect_errno. ' : '.$mysqli->connect_error;
  }

  $conn->set_charset("utf8");
