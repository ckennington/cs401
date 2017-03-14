<?php

require_once 'KLogger.php';

class Dao {

  private $host = "localhost";
  private $db = "ckenning";
  private $user = "ckenning";
  private $pass = "password";
  private $log;

  public function __construct () {
    $this->log = new KLogger ("/tmp/log.txt" , KLogger::WARN);
  }

  public function getConnection () {
    $this->log->LogDebug("Trying to get a database connection...");
    try {
      $conn = new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user,
            $this->pass);
    } catch (Exception $e) {
      $this->log->LogFatal($e);
      exit;
    }
    $this->log->LogDebug("Got a database connection");
    return $conn;
  }

  public function getComments () {
    $this->log->LogInfo("Getting comments from db...");
    $conn = $this->getConnection();
    return $conn->query("select comment, date_entered, file_path from comment order by date_entered desc");
  }

  public function saveComment ($comment, $upload_location) {
    $this->log->LogInfo("Saving comment: " . $comment);
    $this->log->LogInfo("Saving filename: " . $upload_location);

    $conn = $this->getConnection();
    $saveQuery = "insert into comment (comment, user_id, file_path) values (:comment, 1,:upload_location)";
    $q = $conn->prepare($saveQuery);
    $q->bindParam(":comment", $comment);
    $q->bindParam(":upload_location", $upload_location);
    $q->execute();
  }
}
