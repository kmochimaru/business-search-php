<?php
  require "UserDAO.php";
  if (isset($_GET["id"])) {
      $id = $_GET["id"];
      $dao = new UserDAO();
      $result = $dao->detail($id);
      echo json_encode($result);
  }
?>
