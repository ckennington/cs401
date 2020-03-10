<?php
  require_once 'Dao.php';
  $dao = new Dao();
  $logger = new KLogger('log.txt', KLogger::DEBUG);
  $logger->LogInfo("deleting a comment with id [{$_GET['id']}]");
  $dao->deleteComment($_GET['id']);
  header("Location: http://cs401/comments.php");
  exit;

