<?php
require_once 'KLogger.php';

class Comments_Dao {

  private $host = "localhost";
  private $db = "ckenning";
  private $user = "ckenning";
  private $pass = "password";
  private $log;

  public function __construct () {
    $this->log = new KLogger("log.txt", KLogger::INFO);
  }

  public function getConnection () {
    try {
       $conn= new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user,
          $this->pass);
    } catch (Exception $e) {
       $this->log->LogFatal($e);
    }
    return $conn;
  }

  public function getComments () {
    $this->log->LogDebug("Getting comments");
    $conn = $this->getConnection();
    return $conn->query("select id, name, comment, date_entered from comment order by date_entered desc", PDO::FETCH_ASSOC);
  }

  public function saveComment ($name, $comment) {
    $this->log->LogInfo("Save comment [{$name}] [{$comment}]");
    $conn = $this->getConnection();
    $saveQuery =
        "INSERT INTO comment
        (name, comment)
        VALUES
        (:name, :comment)";
    $q = $conn->prepare($saveQuery);
    $q->bindParam(":name", $name);
    $q->bindParam(":comment", $comment);
    $q->execute();
  }

  public function deleteComment ($id) {
    $conn = $this->getConnection();
    $saveQuery = "DELETE FROM comment WHERE id = :id";
    $q = $conn->prepare($saveQuery);
    $q->bindParam(":id", $id);
    $q->execute();
  }

}
