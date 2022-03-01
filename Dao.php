<?php
// Dao.php
// class for saving and getting comments from MySQL
require_once 'KLogger.php';
class Dao {

  private $logger = null;

  private $host = "localhost";
  private $db = "ckenning";
  private $user = "ckenning";
  private $pass = "password";

  public function __construct() {
    $this->logger = new KLogger ( "log.txt" , KLogger::WARN );
  }

  public function getConnection () {
    $this->logger->LogDebug("getting a connection...");
    try {
      return
        new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user, $this->pass);
    } catch (Exception $e) {
       $this->logger->LogFatal("The database exploded " . print_r($e,1));
       exit;
    }
  }
  public function deleteComment ($id) {
     $this->logger->LogInfo("comment deleted, id=[{$id}]");
    
    $conn = $this->getConnection();
    $deleteQuery = "DELETE FROM comment WHERE comment_id = :id";
    $q = $conn->prepare($deleteQuery);
    $q->bindParam(":id", $id);
    $q->execute();
  }

  public function saveComment ($comment) {
    $conn = $this->getConnection();
    $saveQuery =
        "INSERT INTO comment
        (comment)
        VALUES
        (:comment)";
    $q = $conn->prepare($saveQuery);
    $q->bindParam(":comment", $comment);
    $q->execute();
  }

  public function getComments () {
    $conn = $this->getConnection();
    return $conn->query("SELECT * FROM comment ORDER BY date_entered DESC");
  }
} // end Dao
