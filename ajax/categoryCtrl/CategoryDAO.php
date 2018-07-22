<?php
  require("../db_connection.php");

  class CategoryDAO
  {
      protected $db;

      public function __construct()
      {
          $this->db = DB();
      }

      public function __destruct()
      {
          $this->db = null;
      }

      public function create($category_name, $category_img, $province_id)
      {
          $query = $this->db->prepare("INSERT INTO category(category_name, category_img, province_id) VALUES (:category_name, :category_img, :province_id)");
          $query->bindParam("category_name", $category_name, PDO::PARAM_STR);
          $query->bindParam("category_img", $category_img, PDO::PARAM_STR);
          $query->bindParam("province_id", $province_id, PDO::PARAM_INT);
          $query->execute();
          return $this->db->lastInsertId();
      }

      public function read()
      {
          $query = $this->db->prepare("SELECT * FROM category");
          $query->execute();
          $results = $query->fetchAll(PDO::FETCH_ASSOC);
          return $results;
      }

      public function update($category_id, $category_name, $category_img, $province_id)
      {
          $category_id_int = (int)$category_id;
          $province_id_int = (int)$province_id;
          $query = $this->db->prepare("UPDATE category SET category_name = :category_name, category_img = :category_img, province_id = :province_id WHERE category_id = :category_id");
          $query->bindParam("category_name", $category_name, PDO::PARAM_STR);
          $query->bindParam("category_img", $category_img, PDO::PARAM_STR);
          $query->bindParam("category_id", $category_id_int, PDO::PARAM_INT);
          $query->bindParam("province_id", $province_id_int, PDO::PARAM_INT);
          $result = $query->execute();
          return $result;
      }

      public function updateImage($category_id, $category_img){
         $category_id_int = (int)$category_id;
         $query = $this->db->prepare("UPDATE category SET category_img = :category_img WHERE category_id = :category_id");
         $$query->bindParam("category_id", $category_id_int, PDO::PARAM_INT);
         $query->bindParam("category_img", $category_img, PDO::PARAM_STR);
         $result = $query->execute();
         return $result;
      }

      public function detail($category_id)
      {
          $query = $this->db->prepare("SELECT * FROM category WHERE category_id = :category_id");
          $query->bindParam("category_id", $category_id, PDO::PARAM_INT);
          $query->execute();
          return $query->fetch(PDO::FETCH_ASSOC);
      }

      public function delete($category_id)
      {
          $query = $this->db->prepare("DELETE FROM category WHERE category_id = :category_id");
          $query->bindParam("category_id", $category_id, PDO::PARAM_INT);
          $query->execute();
          return $query->rowCount();
      }
  }
?>
