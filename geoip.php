<?php

  $object = json_decode(file_get_contents("https://freegeoip.app/json/132.178.207.16"));

  echo "Meet local singles in {$object->city} tonight!";
