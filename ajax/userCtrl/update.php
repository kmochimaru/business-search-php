<?php
  require "UserDAO.php";

  $obj = json_decode(file_get_contents("php://input"));
  if (isset($obj)) {
      $id = $obj->id;
      $firstname = $obj->firstname;
      $lastname = $obj->lastname;
      $email = $obj->email;
      $password = $obj->password;
      $opassword = $obj->opassword;
      // Check new password
      $password = $password != $opassword?md5($password):$opassword;
      $role = $obj->role;
      $updated_at = $obj->updated_at;
      $dao = new UserDAO();
      $result = $dao->update($id, $firstname, $lastname, $email, $password, $role, $updated_at);
      echo $result;
  }
