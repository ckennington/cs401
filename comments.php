<html>
  <head>
    <link rel="stylesheet" href="comment.css">
  </head>
  <body>
    <h1>Leave a Comment</h1>
    <form method="post" action="comment_handler.php">
      <div class="input_box">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name">
      </div>
      <div class="input_box">
        <label for="comment">Comment:</label>
        <input type="text" id="comment" name="comment">
      </div>
      <input type="submit" value="Submit">
    </form>
<?php
    $contents = file_get_contents("posted_comments.txt");
    $comments = explode("\n", trim($contents));
    $comments = array_reverse($comments);
    $i = 0;
    if (count($comments) == 1) {
      echo "no comments";
    } else {
?>
    <table id="comments">
      <thead>
        <tr>
          <th>Name</th>
          <th>Comment</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
      <?php
          foreach ($comments as $comment) {
             list($name, $comment) = explode("|", trim($comment));
             echo "<tr><td>{$name}</td><td>{$comment}</td><td><a href='delete_comment.php?id={$i}'>X</a></td></tr>";
             $i++;
          }
      ?>
      </tbody>
    </table>
    <?php } ?>
  </body>
</html>
