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
       $conn= new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user,
          $this->pass);
    return $conn;
  }

  public function getComments () {
    $this->log->LogDebug("Getting comments");
    $conn = $this->getConnection();
    return $conn->query("select id, image_path, name, comment, date_entered from comment order by date_entered desc", PDO::FETCH_ASSOC);
  }

  public function saveComment ($name, $comment, $path) {
    $this->log->LogInfo("Save comment [{$name}] [{$comment}]");
    $conn = $this->getConnection();
    $saveQuery =
        "INSERT INTO comment
        (name, comment, image_path)
        VALUES
        (:name, :comment, :image_path)";
    $q = $conn->prepare($saveQuery);
    $q->bindParam(":name", $name);
    $q->bindParam(":comment", $comment);
    $q->bindParam(":image_path", $path);
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
