<?php
  require "CategoryDAO.php";

  $dao = new CategoryDAO();
  $categories = $dao->read();
  echo json_encode($categories);
