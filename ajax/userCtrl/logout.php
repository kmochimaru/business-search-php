<?php
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Headers: *");
  header('Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS');
  header("Content-Type: text/html;charset: utf-8");
  session_start();
  ob_start();
  unset($_SESSION['auth_email']);
  echo json_encode(['Message'=>'logout success']);
?>
