<?php

  function caesarCipher($strText, $iShiftValue) {
    $strCipherText = "";

    $iShift = $iShiftValue % 26;
    if ($iShift < 0) {
      $iShift += 26;
    }

    $i = 0;
    while ($i < strlen($strText)) {
      $c = strtoupper($strText{$i});

      if ( ($c >= "A") && ($c <= 'Z')) {
        if ( (ord($c) + $iShift) > ord("Z") ) {
           $strCipherText .= chr(ord($c) + $iShift - 26);
        } else {
          $strCipherText .= chr(ord($c) + $iShift);
        }
      } else {
        $strCipherText .= " ";
      }

      $i++;
    }

    return $strCipherText;
  }

  $plainText = $argv[1];
  $key = $argv[2];

  echo $plainText . "\n";
  $cipherText = caesarCipher($plainText, $key);
  echo $cipherText . "\n";
  $plainText = caesarCipher($cipherText, -$key);
  echo $plainText . "\n";

