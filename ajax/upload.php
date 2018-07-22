<?php
  header("Access-Control-Allow-Origin: *");

  $target_dir = realpath(__DIR__ . '/..') . "/assets/images/";
  $ext = pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);
  $image = time().'.'.$ext;
	move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir.$image);
  echo json_encode($image);
