<?php
    session_start();
    session_destroy();
    header("Location: http://localhost/black_market/login.php");
    exit();
