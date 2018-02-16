<?php

class Dao {

  private $host = "localhost";
  private $db = "ckenning";
  private $user = "ckenning";
  private $pass = "password";

  private function getConnection () {
    try {
      return
        new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user,
            $this->pass);
    } catch (Exception $e) {
      echo "connection failed: " . $e->getMessage();
    }
  }

  public function getComments () {
     $conn = $this->getConnection();
     $query = $conn->prepare("select * from comments");
     $query->setFetchMode(PDO::FETCH_ASSOC);
     $query->execute();
     return $query->fetchAll();
  }

  public function saveComment ($name, $comment) {
     $conn = $this->getConnection();
     $query = $conn->prepare("INSERT INTO comments (name, comment) VALUES (:name, :comment)");
     $query->bindParam(':name', $name);
     $query->bindParam(':comment', $comment);
     $query->execute();
  }

  public function deleteComment ($id) {
     $conn = $this->getConnection();
     $query = $conn->prepare("DELETE FROM comments WHERE id = :id");
     $query->bindParam(':id', $id);
     $query->execute();
  }

}


/*
 *
  public function getComments () {
    $conn = $this->getConnection();
    $stmt = $conn->prepare("SELECT * FROM comments ORDER BY date_entered DESC");
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $results = $stmt->execute();
    echo print_r($stmt->fetchAll(), 1);
  }

 */
