<?php
require_once 'KLogger.php';

class Dao {

  private $host = 'localhost';
  private $dbname = 'ckenning';
  private $username = 'ckenning';
  private $password = 'password';
  private $logger;

  public function __construct() {
    $this->logger = new KLogger("log.txt", KLogger::WARN);
  }

  public function getConnection() {
    try {
       $connection = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password);
    } catch (Exception $e) {
      $this->logger->LogError("Couldn't connect to the database: " . $e->getMessage());
      return null;
    }
    return $connection;
  }


  public function getComments() {
    $conn = $this->getConnection();
    if(is_null($conn)) {
      return;
    }
    try {
      return $conn->query("select image, comment_id, comment, date_entered  from comment order by date_entered desc", PDO::FETCH_ASSOC);
    } catch(Exception $e) {
      echo print_r($e,1);
      exit;
    }
  }

  public function saveComment ($comment, $destination) {
    $this->logger->LogDebug("Saving a comment [{$comment}]");
    $conn = $this->getConnection();
    $saveQuery = "insert into comment (comment, image) values (:comment, :destination)";
    $q = $conn->prepare($saveQuery);
    $q->bindParam(":comment", $comment);
    $q->bindParam(":destination", $destination);
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
