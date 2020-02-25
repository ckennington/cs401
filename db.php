<?php

$db = new PDO('mysql:host=localhost;dbname=ckenning', 'ckenning', 'password');

$comments = $db->query("select comment_id, comment, date_entered  from comment order by date_entered desc", PDO::FETCH_ASSOC);

foreach ($comments as $comment) {
   echo print_r($comment, true);
}
