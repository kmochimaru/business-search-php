<?php
  require "ProvinceDAO.php";

  $dao = new ProvinceDAO();
  $province = $dao->read();
  echo json_encode($province);
