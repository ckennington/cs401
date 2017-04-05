<?php
  session_start();

  require_once 'classes/Dao.php';
  require_once 'classes/KLogger.php';
  $log = new KLogger ("/tmp/log.txt" , KLogger::DEBUG);
  $log->LogDebug("GOT INSIDE THE HANDLER! YAY!");
  $log->LogDebug(print_r($_POST,1));
  $comment = htmlentities($_POST['comment']);
  $dao = new Dao();
  $dao->saveComment($comment);
  exit;
