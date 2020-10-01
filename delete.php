<?php
require_once 'Dao.php';
$dao = new Dao();
$dao->deleteComment($_GET['id']);

// redirect back to the comments page
header("Location: http://cs401/comments.php");
exit();
