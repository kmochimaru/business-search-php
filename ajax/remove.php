<?php
  header("Access-Control-Allow-Origin: *");

  $target_dir = realpath(__DIR__ . '/..') . "/assets/images/";
  unlink($target_dir . $_GET["image_name"]);
