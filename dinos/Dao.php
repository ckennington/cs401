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

  public function saveComment ($comment, $imagePath = "") {
    $conn = $this->getConnection();
    $saveQuery =
        "INSERT INTO comments
        (comment, image_path)
        VALUES
        (:comment, :image_path)";
    $q = $conn->prepare($saveQuery);
    $q->bindParam(":comment", $comment);
    $q->bindParam(":image_path", $imagePath);
    $q->execute();
  }

  public function getComments () {
    $conn = $this->getConnection();
    return $conn->query("SELECT comment, date_entered, id FROM comments ORDER BY date_entered desc")->fetchAll(PDO::FETCH_ASSOC);
  }
} // end Dao
