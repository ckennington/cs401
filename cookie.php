<?php

  setcookie("COOKIE_MONSTER", "NOM NOM", time()+86400*30);

echo  "<pre>" .  print_r($_COOKIE['COOKIE_MONSTER'],1) .  "</pre>";
