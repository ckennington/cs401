<?php

  echo "<div>cookie page!</div>";

  $cookie_name = 'visits';
  $cookie_value = $_COOKIE['visits'] + 1;
  setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

  
  echo "<pre>" . $_COOKIE['visits'] . "</pre>";
