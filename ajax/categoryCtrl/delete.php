<?php
  require "CategoryDAO.php";
  $target_dir = realpath(__DIR__ . '/..' . '/..') . "/assets/images/";

  if (isset($_GET["category_id"])) {
      $id = $_GET["category_id"];
      $dao = new CategoryDAO();
      $result = $dao->delete($id);
      if($result)
        unlink($target_dir . $_GET["category_img"]);
      echo json_encode($result);
  }
?>
