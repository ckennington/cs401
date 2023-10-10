<?php
// Dao.php
// class for saving and getting comments from MySQL
class Dao {

  private $host = "localhost";
  private $db = "ckenning";
  private $user = "ckenning";
  private $pass = "password";

  public function getConnection () {
    return
      new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user,
          $this->pass);
  }

  public function deleteComment ($id) {
    $conn = $this->getConnection();
    $deleteComment =
        "DELETE FROM comments
        WHERE id = :id";
    $q = $conn->prepare($deleteComment);
    $q->bindParam(":id", $id);
    $q->execute();
  }

  public function saveComment ($name, $comment) {
      $conn = $this->getConnection();
      $saveQuery =
            "INSERT INTO comments
            (name, comment)
            VALUES
            (:name, :comment)";
        $q = $conn->prepare($saveQuery);
        $q->bindParam(":name", $name);
        $q->bindParam(":comment", $comment);
        $q->execute();
  }

  public function getComments () {
    $conn = $this->getConnection();
    return $conn->query("SELECT name, comment, date_entered FROM comments ORDER BY date_entered desc")->fetchAll(PDO::FETCH_ASSOC);
  }

  public function authenticate ($username, $password) {
     // TODO make an actual table.
     return ($username == "conrad" && $password == 'abc123');
  }
} // end Dao
