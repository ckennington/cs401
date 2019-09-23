<?php
  function hello($text = "there") {
     print "hello {$text}";
  }

  hello("conrad");

  print "<pre>" . print_r(get_defined_functions(),1) . "</pre>";
