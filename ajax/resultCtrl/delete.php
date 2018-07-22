<?php
  require "ResultDAO.php";
  if (isset($_GET["result_id"])) {
      $result_id = $_GET["result_id"];
      $dao = new ResultDAO();
      $result = $dao->delete($result_id);
      echo json_encode($result);
  }
?>
