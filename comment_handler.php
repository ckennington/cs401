<?php

require_once 'Dao.php';
$dao = new Dao();
$dao->addComment($_POST['comment']);

// redirect back to the comments page
header("Location: http://cs401/comments.php");
exit();
