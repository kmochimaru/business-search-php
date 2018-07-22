<?php
  require "CategoryDAO.php";

  if (isset($_GET["category_id"]) && isset($_GET["category_name"]) && isset($_GET["category_img"])) {
      $category_id = $_GET["category_id"];
      $category_name = $_GET["category_name"];
      $category_img = $_GET["category_img"];
      $province_id = $_GET["province_id"];
      $dao = new CategoryDAO();
      $result = $dao->update($category_id, $category_name, $category_img, $province_id);
      echo json_encode($result);
  }
