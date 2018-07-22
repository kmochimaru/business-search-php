<?php
  require "ResultDAO.php";

  $obj = json_decode(file_get_contents("php://input"));
  if (isset($obj)) {
      $result_name = $obj->result_name;
      $result_img = $obj->result_img;
      $category_id = $obj->category_id;
      $dao = new ResultDAO();
      $result = $dao->create($result_name, $result_img, $category_id);
      echo $result;
  }
?>
