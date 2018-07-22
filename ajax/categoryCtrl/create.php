<?php
  require "CategoryDAO.php";
  
  $obj = json_decode(file_get_contents("php://input"));
  if (isset($obj)) {
      $category_name = $obj->category_name;
      $category_img = $obj->category_img;
      $province_id = $obj->province_id;
      $dao = new CategoryDAO();
      $result = $dao->create($category_name, $category_img, $province_id);
      echo json_encode($result);
  }
?>
