<?php

$comment = $_POST['comment'];

require_once 'Dao.php';
$dao = new Dao();
$dao->saveComment($comment);

header('Location: comment.php');
exit;
