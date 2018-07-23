<?php
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Headers: *");
  header("Content-Type: text/html;charset: utf-8");

  // define("HOST", "localhost");
  // define("USER", "chiangr1");
  // define("PASSWORD", "!Kenjung288");
  // define("DATABASE", "chiangr1_bs");
  define("USER", "root");
  define("PASSWORD", "");
  define("DATABASE", "business-search");
  define("CHARSET", "utf8");
  function DB()
  {
      static $instance;
      if ($instance === null) {
          $opt = array(
              PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
              PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
              PDO::ATTR_EMULATE_PREPARES => false,
          );
          try {
              $dns = "mysql:host=" .HOST. ";dbname=" .DATABASE. ";charset=" .CHARSET;
          } catch (Exception $e) {
              die('Error : ' . $e->getMessage());
          }

          $instance = new PDO($dns, USER, PASSWORD, $opt);
      }
      return $instance;
  }
