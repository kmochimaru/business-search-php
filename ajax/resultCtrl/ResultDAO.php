<?php
  require("../db_connection.php");

  class ResultDAO
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

      public function create($result_name, $result_img, $category_id)
      {
          $query = $this->db->prepare("INSERT INTO result(result_name, result_img, category_id) VALUES (:result_name, :result_img, :category_id)");
          $query->bindParam("result_name", $result_name, PDO::PARAM_STR);
          $query->bindParam("result_img", $result_img, PDO::PARAM_STR);
          $query->bindParam("category_id", $category_id, PDO::PARAM_INT);
          $query->execute();
          return $this->db->lastInsertId();
      }

      public function read()
      {
          $query = $this->db->prepare("SELECT * FROM result");
          $query->execute();
          $results = $query->fetchAll(PDO::FETCH_ASSOC);
          return $results;
      }

      public function readByCountryAndCategory($country_id, $category_id)
      {
      }

      public function update($result_id, $result_name, $result_img, $category_id)
      {
          $query = $this->db->prepare("UPDATE result SET result_name = :result_name, result_img = :result_img, category_id = :category_id WHERE result_id = :result_id");
          $query->bindParam("result_id", $result_id, PDO::PARAM_INT);
          $query->bindParam("result_name", $result_name, PDO::PARAM_STR);
          $query->bindParam("result_img", $result_img, PDO::PARAM_STR);
          $query->bindParam("category_id", $category_id, PDO::PARAM_INT);
          $result = $query->execute();
          return $result;
      }

      public function detail($result_id)
      {
          $query = $this->db->prepare("SELECT * FROM result WHERE result_id = :result_id");
          $query->bindParam("result_id", $result_id, PDO::PARAM_INT);
          $query->execute();
          return $query->fetch(PDO::FETCH_ASSOC);
      }

      public function delete($result_id)
      {
          $query = $this->db->prepare("DELETE FROM result WHERE result_id = :result_id");
          $query->bindParam("result_id", $result_id, PDO::PARAM_INT);
          $query->execute();
          return $query->rowCount();
      }
  }
