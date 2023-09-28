<?php

require_once 'Dao.php';

$name = $_POST['name'];
$comment = $_POST['comment'];

$dao = new Dao();
$dao->saveComment($name, $comment);

header('Location: http://localhost/comment_page/comments.php');
exit();
