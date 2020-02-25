<?php
class Dao {

  private $host = 'localhost';
  private $dbname = 'ckenning';
  private $username = 'ckenning';
  private $password = 'password';

  public function __construct() {
  }

  public function getConnection() {
    try {
       $connection = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password);
    } catch (Exception $e) {
      echo print_r($e,1);
    }
    return $connection;
  }


  public function getComments() {
    $conn = $this->getConnection();
    try {
    return $conn->query("select comment_id, comment, date_entered  from comment order by date_entered desc", PDO::FETCH_ASSOC);
    } catch(Exception $e) {
      echo print_r($e,1);
      exit;
    }
  }

  public function saveComment ($comment) {
    $conn = $this->getConnection();
    $saveQuery = "insert into comment (comment) values (:comment)";
    $q = $conn->prepare($saveQuery);
    $q->bindParam(":comment", $comment);
    $q->execute();
  }

  public function deleteComment ($id) {
    $conn = $this->getConnection();
    $deleteQuery = "delete from comment where comment_id = :id";
    $q = $conn->prepare($deleteQuery);
    $q->bindParam(":id", $id);
    $q->execute();
  }

}
