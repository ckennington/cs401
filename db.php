<?php

  require_once 'Dao.php';
  $dao = new Dao();
  try {
    $comments = $dao->getComments();
  } catch (Exception $e) {
    echo "oops, i crapped my pants\n";
  }

  foreach ($comments as $comment) {
    echo print_r($comment,1) . "\n";

  }
