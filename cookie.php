<?php

echo "<pre>" . print_r($_COOKIE, 1) . "</pre>";

  if (isset($_COOKIE["visits"])) {
    // seen this guy before
    $visits = $_COOKIE["visits"] + 1;
  } else {
    // first timer
    $visits = 1;
  }

  // must be at the top before any HTML, since it's a header
  setcookie("visits", $visits, time() + 23423);

  if (isset($_COOKIE["uniqid"])) {
    // seen this guy before
    $uniqId = $_COOKIE["uniqid"];
  } else {
    // first timer
    $uniqId = uniqid();
  }
  setcookie("uniqid", $uniqId, time() + (365 * 24 * 60 * 60));
?>

<html>
  <head>
    <link href="cookie.css" rel="stylesheet" type="text/css">
    <script src="js/jquery-1.8.2.js"></script>
    <script src="js/track.js"></script>
  </head>
  <body>
    <h1>I'm just a simple, non-assuming page that doesn't try to track anything.</h1>
    <h2>tee hee</h2>
    <hr/>
    <div><span>Visited:</span> <?php echo $visits; ?></div>
    <div><span><?php echo "User agent:</span> " .
      $_SERVER['HTTP_USER_AGENT']; ?></div>
    <div><span><?php echo "User IP address:</span> " .
      $_SERVER['REMOTE_ADDR']; ?></div>
    <div><span><?php echo "Language:</span> " .
      $_SERVER['HTTP_ACCEPT_LANGUAGE']; ?></div>
    <div><span><?php echo "Cookies:</span> " .
      $_SERVER['HTTP_COOKIE']; ?></div>
    <div id="js_h"></div>
    <div id="js_w"></div>
    <div id="js_avail_h"></div>
    <div id="js_avail_w"></div>
    <div id="js_color"></div>
    <div id="js_tz"></div>
    what else??
  </body>
</html>
