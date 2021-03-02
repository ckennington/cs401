<?php

require_once 'KLogger.php';

class Dao {

  public $dsn = 'mysql:dbname=ckenning;host=127.0.0.1';
  public $user = "ckenning";
  public $password = "password";
  protected $logger;

  public function __construct () {
    $this->logger = new KLogger ( "log.txt" , KLogger::WARN );
  }

  private function getConnection () {
    try {
        $connection = new PDO($this->dsn, $this->user, $this->password);
        $this->logger->LogDebug("Got a connection");
    } catch (PDOException $e) {
        $error = 'Connection failed: ' . $e->getMessage();
        $this->logger->LogError($error);
    }
    return $connection;
  }

  public function deleteComment ($id) {
    $this->logger->LogInfo("deleting comment id [{$id}]");
    $conn = $this->getConnection();
    $deleteQuery = "delete from comment where comment_id = :id";
    $q = $conn->prepare($deleteQuery);
    $q->bindParam(":id", $id);
    $q->execute();
  }

  public function insertComment ($name, $comment) {
    $this->logger->LogInfo("inserting a comment name=[{$name}], comment=[{$comment}]");
    $conn = $this->getConnection();
    $saveQuery = "insert into comment (name, comment) values (:name, :comment)";
    $q = $conn->prepare($saveQuery);
    $q->bindParam(":name", $name);
    $q->bindParam(":comment", $comment);
    $q->execute();
  }

  public function getComments () {
    $connection = $this->getConnection();
    try {
        $rows = $connection->query("select name, comment_id, comment, date_entered from comment order by date_entered desc", PDO::FETCH_ASSOC);
    } catch(Exception $e) {
      echo print_r($e,1);
      exit;
    }
    return $rows;
  }

}
