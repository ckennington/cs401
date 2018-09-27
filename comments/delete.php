<?php

$id = $_GET['id'];

require_once 'Comments_Dao.php';
$dao = new Comments_Dao();
$dao->deleteComment($id);

header('Location: http://cs401/comments');
exit;
