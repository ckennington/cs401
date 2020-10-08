<?php
require_once 'KLogger.php';

class Dao {

  private $host = "localhost";
  private $db = "ckenning";
  private $user = "ckenning";
  private $pass = "password";
  private $logger;

  public function __construct () {
    $this->logger = new KLogger ("log.txt" , KLogger::DEBUG);
  }


  public function getConnection () {
    $this->logger->LogDebug("getting a connection");
    try {
      $conn = new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user, $this->pass);
      return $conn;
    } catch (Exception $e) {
      //echo print_r($e,1);
      $this->logger->LogFatal("Ooops the database crapped its pants: " . print_r($e, 1));
      exit;
    }
  }

  public function getComments () {
    $conn = $this->getConnection();
    return $conn->query("select comment_id, comment, date_entered from comment order by date_entered desc", PDO::FETCH_ASSOC);
  }

  public function addComment ($comment) {
    $this->logger->LogInfo("adding a comment [{$comment}]");
    $conn = $this->getConnection();
    $saveQuery = "insert into comment (comment, user_id) values (:comment, 1)";
    $q = $conn->prepare($saveQuery);
    $q->bindParam(":comment", $comment);
    $q->execute();
  }

  public function deleteComment ($id) {
    $conn = $this->getConnection();
    $this->logger->LogInfo("deleting a comment [{$id}]");
    $deleteQuery = "delete from comment where comment_id = :comment_id";
    $q = $conn->prepare($deleteQuery);
    $q->bindParam(":comment_id", $id);
    $q->execute();
  }

}
