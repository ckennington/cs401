<?php

$data = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=Boise&APPID=59a81c1439622ed68f86f05a14419875");

$array = json_decode($data, true);
echo $array['wind']['speed'] . " wind speed obtained by our professional weather data person.";
