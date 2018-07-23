<?php
  require("ProvinceDAO.php");

  if (isset($_GET["province_id"])) {
      $dao = new ProvinceDAO();
      $result = $dao->detail($_GET["province_id"]);
      echo json_encode($result);
  }
