<?php
  require "ProvinceDAO.php";

  $dao = new ProvinceDAO();
  $province = $dao->readByCategory();
  echo json_encode($province);
