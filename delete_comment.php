<?php

 $contents = file_get_contents("posted_comments.txt");
 $comments = explode("\n", trim($contents));
 $comments = array_reverse($comments);

 $id = $_GET['id'];
 unset($comments[$id]);

 $fh = fopen('posted_comments.txt', 'w' );
 fclose($fh);

 foreach ($comments as $comment) {
   file_put_contents("posted_comments.txt", $comment . "\n", FILE_APPEND | LOCK_EX);
 }
  header('Location: comments.php');
  exit;



