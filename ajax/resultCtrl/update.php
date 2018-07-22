<?php
  require "ResultDAO.php";

  if (isset($_GET["result_id"]) && isset($_GET["result_name"]) && isset($_GET["result_img"]) && isset($_GET["category_id"])) {
      $result_id = $_GET["result_id"];
      $result_name = $_GET["result_name"];
      $result_img = $_GET["result_img"];
      $category_id = $_GET["category_id"];
      $dao = new ResultDAO();
      $result = $dao->update($result_id, $result_name, $result_img, $category_id);
      echo json_encode($result);
  }
