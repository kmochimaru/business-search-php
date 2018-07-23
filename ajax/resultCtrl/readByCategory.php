<?php
  require("ResultDAO.php");

  if (isset($_GET["category_id"])) {
      $dao = new ResultDAO();
      $results = $dao->findByCategory($_GET["category_id"]);
      echo json_encode($results);
  }
