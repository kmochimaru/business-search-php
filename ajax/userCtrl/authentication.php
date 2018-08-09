<?php
  require 'UserDAO.php';

  session_start();
  ob_start();
  $obj = json_decode(file_get_contents("php://input"));
  if (isset($obj)) {
      $dao = new UserDAO();
      $email = $obj->email;
      $password = $obj->password;
      $result = $dao->isLogin($email, md5($password));
      if ($result == 1) {
          $_SESSION['auth_email'] = $obj->email;
      }
      echo json_encode($result);
  } else if(isset($_GET['action'])){
    isset($_SESSION['auth_email'])? $_SESSION['auth_email']: NULL;
    echo $_SESSION['auth_email'];
    // if (isset($_SESSION['auth_email'])) {
    //     $email = $_SESSION['auth_email'];
    //     $dao = new UserDAO();
    //     $result = $dao->getByEmail($email);
    //     echo json_encode($result);
    // } else {
    //     echo json_encode(["Message"=>"unauthorized"]);
    // }
  }
