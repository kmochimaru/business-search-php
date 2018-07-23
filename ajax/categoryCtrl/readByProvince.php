<?php
  require("CategoryDAO.php");

  if (isset($_GET["province_id"])) {
      $dao = new CategoryDAO();
      $results = $dao->findByProvince($_GET["province_id"]);
      echo json_encode($results);
  }
