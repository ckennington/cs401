<?php

  class Dao {

    public $filename;

    public function __construct ($filename = "stuff.data") {
       $this->filename = $filename;
    }
   
    public function getGoods () {
       $stuff = file_get_contents($this->filename);
       $lines = explode("\n", trim($stuff));
       return $lines; 
    }

    public function getComments () {
       $stuff = file_get_contents($this->filename);
       $lines = explode("\n", trim($stuff));
       return $lines; 
    }

  }
