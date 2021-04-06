<?php
  session_start();
  if (!isset($_SESSION['authenticated']) || !$_SESSION['authenticated']) {
     header('Location: login.php');
     exit;
  }
  //echo "<pre>" . print_r($_SESSION,1) . "</pre>";
?>
<html>
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/comment.js"></script>
    <link rel="stylesheet" href="comment.css">
  </head>
  <body>
    <span id="logout"><a href="logout.php">Logout</a></span>
    <h1>Leave a Comment</h1>
    <form method="post" action="comment_handler.php" enctype="multipart/form-data">
      <div class="input_box">
        <label for="name">Name:</label>
        <input value="<?php echo isset($_SESSION['form_data']['name']) ? $_SESSION['form_data']['name'] : ''; ?>" type="text" id="name" name="name">
      </div>
      <div class="input_box">
        <label for="age">Age:</label>
        <input value="<?php echo isset($_SESSION['form_data']['age']) ? $_SESSION['form_data']['age'] : '' ; ?>" type="text" id="age" name="age">
      </div>
      <div class="input_box">
        <label for="comment">Comment:</label>
        <input value="<?php echo isset($_SESSION['form_data']['comment']) ? $_SESSION['form_data']['comment'] : ''; ?>" type="text" id="comment" name="comment">
      </div>
      <div class="input_box">
        <label for="comment">Comment:</label>
        <input type="file" id="fileToUpload" name="fileToUpload">
      </div>
      <input type="submit" value="Submit">
    </form>
<?php
    if (isset($_SESSION['messages'])) {
      foreach ($_SESSION['messages'] as $message) {
        echo "<div class='" . $_SESSION['class'] . " message'>{$message}<span class='close'>x</span></div>";
      }
    }
    unset($_SESSION['messages']);
?>

<?php
    require_once 'Dao.php';
    $dao = new Dao();
    $comments = $dao->getComments();
?>
    <table id="comments">
      <thead>
        <tr>
          <th>Image</th>
          <th>Name</th>
          <th>Comment</th>
          <th>Date</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
      <?php
          foreach ($comments as $comment) {
            echo
              "<tr><td><img src='{$comment['image_path']}'/></td>" .
              "<td>" . htmlspecialchars($comment['name']) . "</td>" .
              "<td>" . $comment['comment'] . "</td>" .
              "<td>{$comment['date_entered']}<td><a href='delete_comment.php?id={$comment['comment_id']}'>X</a></td></tr>";
          }
      ?>
      </tbody>
    </table>
  </body>
</html>
