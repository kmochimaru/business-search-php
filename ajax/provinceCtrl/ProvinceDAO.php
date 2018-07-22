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

  }
 ?>
