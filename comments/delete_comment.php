<?php

// TODO.... does the current user have permission to delete this id?

require_once '../Dao.php';
$dao = new Dao();
$id = $_GET['id'];
$dao->deleteComment($id);
header("Location: comments.php");
exit;
