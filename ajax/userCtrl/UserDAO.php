<?php
  require_once("../db_connection.php");

  class UserDAO
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

      public function create($firstname, $lastname, $role, $email, $password, $created_at, $updated_at)
      {
          $query = $this->db->prepare("INSERT INTO users(firstname, lastname, email, password, role, created_at, updated_at) VALUES (:firstname, :lastname, :email, :password, :role, :created_at, :updated_at)");
          $query->bindParam("firstname", $firstname, PDO::PARAM_STR);
          $query->bindParam("lastname", $lastname, PDO::PARAM_STR);
          $query->bindParam("email", $email, PDO::PARAM_STR);
          $query->bindParam("password", $password, PDO::PARAM_STR);
          $query->bindParam("role", $role, PDO::PARAM_STR);
          $query->bindParam("created_at", $created_at, PDO::PARAM_STR);
          $query->bindParam("updated_at", $updated_at, PDO::PARAM_STR);
          $query->execute();
          return $this->db->lastInsertId();
      }

      public function read()
      {
          $query = $this->db->prepare("SELECT * FROM users");
          $query->execute();
          $results = $query->fetchAll(PDO::FETCH_ASSOC);
          return $results;
      }

      public function update($id, $firstname, $lastname, $email, $password, $role, $updated_at)
      {
          $query = $this->db->prepare("UPDATE users SET firstname = :firstname, lastname = :lastname, email = :email, password = :password, role = :role, updated_at = :updated_at WHERE id = :id");
          $query->bindParam("firstname", $firstname, PDO::PARAM_STR);
          $query->bindParam("lastname", $lastname, PDO::PARAM_STR);
          $query->bindParam("email", $email, PDO::PARAM_STR);
          $query->bindParam("password", $password, PDO::PARAM_STR);
          $query->bindParam("role", $role, PDO::PARAM_STR);
          $query->bindParam("updated_at", $updated_at, PDO::PARAM_STR);
          $query->bindParam("id", $id, PDO::PARAM_INT);
          $result = $query->execute();
          return $result;
      }

      public function detail($id)
      {
          $query = $this->db->prepare("SELECT * FROM users WHERE id = :id");
          $query->bindParam("id", $id, PDO::PARAM_INT);
          $query->execute();
          return $query->fetch(PDO::FETCH_ASSOC);
      }

      public function getByEmail($email)
      {
        $query = $this->db->prepare("SELECT * FROM users WHERE email = :email");
        $query->bindParam("email", $email, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
      }

      public function delete($id)
      {
          $query = $this->db->prepare("DELETE FROM users WHERE id = :id");
          $query->bindParam("id", $id, PDO::PARAM_INT);
          $query->execute();
          return $query->rowCount();
      }

      public function isLogin($email, $password)
      {
          $query = $this->db->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
          $query->bindParam("email", $email, PDO::PARAM_STR);
          $query->bindParam("password", $password, PDO::PARAM_STR);
          $query->execute();
          return $query->rowCount();
      }
  }
