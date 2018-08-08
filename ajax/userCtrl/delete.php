<?php
  require "UserDAO.php";
  if (isset($_GET["id"])) {
      $id = $_GET["id"];
      $dao = new UserDAO();
      $result = $dao->delete($id);
      echo json_encode($result);
  }
?>
