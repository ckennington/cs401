<?php

echo "<pre>" . print_r($_POST,1) . "</pre>";
  exit;


  $name = $_POST["name"];
  $comment = $_POST["comment"];

  file_put_contents("comments.dat", "$name|$comment\n", FILE_APPEND);

  header("Location: comments.php");
  exit;
