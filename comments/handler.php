<?php
session_start();
$name = $_POST['name'];
$comment = $_POST['comment'];

$_SESSION['presets']['name'] = $name;
$_SESSION['presets']['comment'] = $comment;
/*
$imagePath = '';
if (count($_FILES) > 0) {
  if ($_FILES["pic"]["error"] > 0) {
    throw new Exception("Error: " . $_FILES["pic"]["error"]);
  } else {
    $basePath = "/Users/crk/projects/cs401/src/www";
    $imagePath = "/comments/images/" . $_FILES["pic"]["name"];
    if (!move_uploaded_file($_FILES["pic"]["tmp_name"], $basePath . $imagePath)) {
      throw new Exception("File move failed");
    }
  }
}
 */

$messages = array();
$presets = array();
$bad = false;
if (empty($name)) {
  $_SESSION['messages'][] = "Name is required.";
  $bad = true;
}

if (empty($comment)) {
  $_SESSION['messages'][] = "Comment is required.";
  $bad = true;
}

if ($bad) {
  header('Location: http://cs401/comments');
  $_SESSION['validated'] = 'bad';
  exit;
}

// Got here, means everything validated, and the comment will post.
$_SESSION['messages'][] = "Thanks for posting!";
$_SESSION['validated'] = 'good';

unset($_SESSION['presets']);

require_once 'Comments_Dao.php';
$dao = new Comments_Dao();
$dao->saveComment($name, $comment, $imagePath);

header('Location: http://cs401/comments');
exit;
