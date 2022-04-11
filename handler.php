<?php

  $comment = $_POST['comment'];

  require_once 'Dao.php';
  $dao = new Dao();
  $dao->saveComment($comment, "");
  sleep(1);
