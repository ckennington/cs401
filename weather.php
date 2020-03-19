<?php
   $places = array("Boise", "London", "New+York");

   foreach ($places as $place) {
     $weather = file_get_contents("http://api.openweathermap.org/data/2.5/weather?APPID=59a81c1439622ed68f86f05a14419875&q={$place}");
     $weather = json_decode($weather);
     echo "{$place} wind speed: " . $weather->wind->speed . "</br>";
   }
