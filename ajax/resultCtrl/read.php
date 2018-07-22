<?php
  require "ResultDAO.php";

  $dao = new ResultDAO();
  $results = $dao->read();
  echo json_encode($results);
