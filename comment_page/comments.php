<?php
  session_start();

  if(!isset($_SESSION['authenticated'])) {
    header('Location: login.php');
    exit; 
  }

  if(isset($_SESSION['authenticated']) && !$_SESSION['authenticated']) {
    header('Location: login.php');
    exit; 
  }

  require_once 'Dao.php';
  $dao = new Dao();

  //echo "<pre>" . print_r($_SESSION,1) . "</pre>";
?>
<html>
  <head>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="icecream.css">
  </head>
  <body>
    <h1>Leave a Comment</h1>
    <a href="logout.php">Logout</a>
    <form method="post" action="comment_handler.php">
       <?php 
          $name = "";
          $comment = "";
          if(isset($_SESSION['messages']['bad'])) {
              if(isset($_SESSION['post'])) {
                 if(isset($_SESSION['post']['name'])) {
                    $name = $_SESSION['post']['name'];
                 }
                 if(isset($_SESSION['post']['comment'])) {
                    $comment = $_SESSION['post']['comment'];
                 }
              }
          }

       ?>
       <div>Name: <input type="text" value="<?php echo $name; ?>" name="name"/></div>
       <Br/>
       <div>Comment: <input type="text" value="<?php echo $comment; ?>"  name="comment"/></div>
       <Br/>
       <div><input type="submit" name="Submit"/></div>
    </form>

    <?php
    if (isset($_SESSION['messages'])) {
       if (isset($_SESSION['messages']['bad'])) {
          foreach ($_SESSION['messages']['bad'] as $bad) {
            echo "<div class='message bad'>{$bad}</div>";
          }
       }
       if (isset($_SESSION['messages']['good'])) {
          foreach ($_SESSION['messages']['good'] as $good) {
            echo "<div class='message good'>{$good}</div>";
          }
       }
    }

    ?>

    <table>
      <?php
      $comments = $dao->getComments();
      foreach ($comments as $comment) {
        echo "<tr><td>{$comment['name']}</td><td>" . htmlentities($comment['comment']) . "</td><td>{$comment['date_entered']}</td></tr>";
      }
      ?>
    </table>
  </body>
</html>
