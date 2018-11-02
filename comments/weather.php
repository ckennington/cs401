<?php

   $zip = $_GET['zip'];
   $weather = file_get_contents("http://api.openweathermap.org/data/2.5/weather?zip={$zip},us&APPID=59a81c1439622ed68f86f05a14419875");
   $decoded = json_decode($weather);
   echo "Current wind speed in " . $zip . "</br>";
   echo "<pre>" . print_r($decoded->wind->speed,1) . "</pre>";
