<?php

require_once 'KLogger.php';

class Dao {

  public $dsn = 'mysql:dbname=ckenning;host=127.0.0.1';
  public $user = "ckenning";
  public $password = "password";
  protected $logger;

  public function __construct () {
    $this->logger = new KLogger ( "log.txt" , KLogger::DEBUG );
  }

  private function getConnection () {
    try {
        $connection = new PDO($this->dsn, $this->user, $this->password);
        $this->logger->LogDebug("Got a connection");
    } catch (PDOException $e) {
        echo "<pre>" . print_r($e, 1) . "</pre>";
        exit;
        $error = 'Connection failed: ' . $e->getMessage();
        $this->logger->LogError($error);
    }
    return $connection;
  }

  public function userExist ($email, $password) {
    $connection = $this->getConnection();
    try {
        $q = $connection->prepare("select count(*) as total from user where email = :email and password = :password");
        $q->bindParam(":email", $email);
        $q->bindParam(":password", $password);
        $q->execute();
        $row = $q->fetch();
        if ($row['total'] == 1) {
           $this->logger->LogInfo("user found!" . print_r($row,1));
           return true;
        } else {
           return false;
        }
    } catch(Exception $e) {
      echo print_r($e,1);
      exit;
    }

  }

  public function deleteComment ($id) {
    $this->logger->LogInfo("deleting comment id [{$id}]");
    $conn = $this->getConnection();
    $deleteQuery = "delete from comment where comment_id = :id";
    $q = $conn->prepare($deleteQuery);
    $q->bindParam(":id", $id);
    $q->execute();
  }

  public function insertComment ($name, $comment, $imagePath) {
    $this->logger->LogInfo("inserting a comment name=[{$name}], comment=[{$comment}]");
    $conn = $this->getConnection();
    $saveQuery = "insert into comment (name, comment, image_path) values (:name, :comment, :image_path)";
    $q = $conn->prepare($saveQuery);
    $q->bindParam(":name", $name);
    $q->bindParam(":comment", $comment);
    $q->bindParam(":image_path", $imagePath);
    $q->execute();
  }

  public function getComments () {
    $connection = $this->getConnection();
    try {
        $rows = $connection->query("select name, comment_id, comment, image_path, date_entered from comment order by date_entered desc", PDO::FETCH_ASSOC);
    } catch(Exception $e) {
      echo print_r($e,1);
      exit;
    }
    return $rows;
  }

}

