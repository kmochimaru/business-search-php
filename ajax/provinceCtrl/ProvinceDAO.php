<?php
  header("Access-Control-Allow-Origin: *");
  require_once("../db_connection.php");

  class ProvinceDAO {
    protected $db;

    function __construct(){
      $this->db = DB();
    }

    function __destruct(){
      $this->db = null;
    }

    public function read(){
      $query = $this->db->prepare("SELECT * FROM province");
      $query->execute();
      $results = $query->fetchAll(PDO::FETCH_ASSOC);
      return $results;
    }

    public function readByCategory(){
      $query = $this->db->prepare("SELECT * FROM province WHERE PROVINCE_ID IN (SELECT DISTINCT province_id FROM category)");
      $query->execute();
      $results = $query->fetchAll(PDO::FETCH_ASSOC);
      return $results;
    }

    public function detail($province_id){
      $query = $this->db->prepare("SELECT * FROM province WHERE province_id = :province_id");
      $query->bindParam("province_id", $province_id, PDO::PARAM_INT);
      $query->execute();
      $result = $query->fetchAll(PDO::FETCH_ASSOC);
      return $result;
    }

  }
 ?>
