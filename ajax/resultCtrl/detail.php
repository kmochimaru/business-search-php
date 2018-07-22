<?php
  require "ResultDAO.php";
  if (isset($_GET["result_id"])) {
      $category_id = $_GET["result_id"];
      $dao = new ResultDAO();
      $result = $dao->detail($result_id);
      echo json_encode($result);
  }
?>
