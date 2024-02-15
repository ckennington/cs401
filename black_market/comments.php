<?php require_once "header.php";
require_once "Dao.php";
$dao = new Dao("comments.log");
?>

 <div id="text">

  <h2>Leave a Comment</h2>

  <form method="post" action="comment_handler.php">
      <div>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name">
      </div>
      <div>
        <label for="name">Comment:</label>
        <input type="text" id="comment" name="comment">
      </div>

      <div>
        <label for="name">Rating:</label>
        <input type="text" id="rating" name="rating">
        <input type="submit" value="Submit">
      </div>
   </form>

    <h2>Comments</h2>
    <table>
       <thead>
          <tr>
          <th>Comment</th>
          <th>Date</th>
       </tr>
       </thead>
    <?php

       $lines = $dao->getComments();
       foreach ($lines as $line) {
           echo "<tr><td>{$line['comment']}</td><td>{$line['date_entered']}</td></tr>";
       }
    ?>     
    </table>

 </div>
<?php require_once "footer.php"; ?>
