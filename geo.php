<?php
   $client = "2.178.207.19";
   echo $client . "<br/>";
   $ip = file_get_contents("http://free.ipwhois.io/json/{$client}");
   $ip = json_decode($ip);

   echo "Meet local singles in " . $ip->city . "!\n";
