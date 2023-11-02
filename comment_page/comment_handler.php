<?php
session_start();


sleep(5);

require_once 'Dao.php';

$name = trim($_POST['name']);
$comment = trim($_POST['comment']);

/*
$messages = array();

if (strlen($name) == 0) {
  $messages['bad'][] = "Please enter a name";
}

if (strlen($comment) == 0) {
  $messages['bad'][] = "Please enter a comment";
}

if (count($messages) == 0) {*/
$dao = new Dao();
$dao->saveComment($name, $comment);
/*  $messages['good'][] = 'Thank you for your comment!';
}

$_SESSION['messages'] = $messages;
$_SESSION['post'] = $_POST;
header('Location: http://localhost/comment_page/comments.php');
exit();*/
