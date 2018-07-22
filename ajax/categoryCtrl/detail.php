<?php
  require "CategoryDAO.php";
  if (isset($_GET["category_id"])) {
      $category_id = $_GET["category_id"];
      $dao = new CategoryDAO();
      $result = $dao->detail($category_id);
      echo json_encode($result);
  }
?>
