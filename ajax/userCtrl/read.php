<?php
  require "UserDAO.php";

  $dao = new UserDAO();
  $results = $dao->read();
  echo json_encode($results);
