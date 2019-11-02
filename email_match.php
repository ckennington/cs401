<?php
$matches = array();
$string = 'my email is conradkennington@gmail.com';
preg_match('/\w+@\w+\.[a-zA-Z]{2,4}/', $string, $matches);

echo "<pre>" . print_r($matches,1) . "</pre>";
