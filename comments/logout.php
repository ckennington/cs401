<?php
session_start();
session_destroy();
header('Location: http://cs401/comments/login.php');
exit;
