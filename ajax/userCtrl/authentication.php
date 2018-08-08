<?php
  require 'UserDAO.php';

  $obj = json_decode(file_get_contents("php://input"));
  if (isset($obj)) {
      $dao = new UserDAO();
      $email = $obj->email;
      $password = $obj->password;
      $result = $dao->isLogin($email, md5($password));
      echo json_encode($result);
  }
