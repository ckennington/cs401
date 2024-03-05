<?php
  require_once '../KLogger.php';

  class Dao {

    public $filename;

    private $host = "localhost";
    private $db = "ckenning";
    private $user = "ckenning";
    private $pass = "password";
    protected $logger;

    public function getConnection () {
      $this->logger->LogDebug("getting a connection...");
 
      return
        new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user,
            $this->pass);
    }

    public function __construct ($filename = "stuff.data") {
       $this->logger = new KLogger ( "log.txt" , KLogger::WARN ) ;
       $this->filename = $filename;
    }
   
    public function getGoods () {
       $stuff = file_get_contents($this->filename);
       $lines = explode("\n", trim($stuff));
       return $lines; 
    }

    public function saveComment($name, $comment) {
        $this->logger->LogInfo("saveComment: [{$name}], [{$comment}]");
        $conn = $this->getConnection();
        $saveQuery =
            "INSERT INTO comments
            (comment, name)
            VALUES
            (:comment, :name)";
        $q = $conn->prepare($saveQuery);
        $q->bindParam(":comment", $comment);
        $q->bindParam(":name", $name);
        $q->execute();
    }

    public function getComments () {
       $conn = $this->getConnection();
       return $conn->query("SELECT comment, date_entered, id FROM comments ORDER BY date_entered desc")->fetchAll(PDO::FETCH_ASSOC);
    }

  }
