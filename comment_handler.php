<?php

// Save post items into a file
$line = $_POST['name'] . "|" . $_POST['comment'] . "\n";
file_put_contents("comments.txt", $line, FILE_APPEND | LOCK_EX);

// redirect back to the comments page
header("Location: http://cs401/comments.php");
exit();
