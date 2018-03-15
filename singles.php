<?php

$ip = "218.230.2.3";
$data = json_decode(file_get_contents("http://freegeoip.net/json/{$ip}"), true);
echo "Meet local singles in " . $data['city'] . ", " . $data['country_code'];

