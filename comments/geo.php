<?php
   $client = $_SERVER['REMOTE_ADDR'];
   echo $client . "<br/>";
   $ip = file_get_contents("http://geoip.nekudo.com/api/{$client}");
   $ip = json_decode($ip);

   echo "Meet local singles in " . $ip->city . "!\n";
