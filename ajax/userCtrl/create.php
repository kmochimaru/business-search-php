<?php
  require "UserDAO.php";

  $obj = json_decode(file_get_contents("php://input"));
  if (isset($obj)) {
      $firstname = $obj->firstname;
      $lastname = $obj->lastname;
      $email = $obj->email;
      $password = $obj->password;
      $role = $obj->role;
      $created_at = $obj->created_at;
      $updated_at = $obj->updated_at;
      $dao = new UserDAO();
      try{
        $result = $dao->create($firstname, $lastname, $role, $email, md5($password), $created_at, $updated_at);
        echo $result;
      }catch(Exception $exception) {
        echo json_encode($exception);
      }

  }
