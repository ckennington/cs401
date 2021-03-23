<?php
  $object = json_decode(file_get_contents("https://freegeoip.app/json/{$_GET['ip']}"));
  echo "Meet local singles in {$object->city} tonight!";
