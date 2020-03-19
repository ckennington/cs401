<?php

  $ipAddress = '174.126.206.63';


  $object = json_decode(file_get_contents("https://freegeoip.app/json/174.126.206.63"));

  echo "Meet local singles in {$object->city} tonight!";
