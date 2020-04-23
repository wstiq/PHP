<?php
require_once 'Logger.php';

class LoggerToFile extends Logger{
    private $fp = null;
    public function __construct($fileName){
        $this-> fp = fopen($fileName.".txt", "w");
    }
    public function __destruct(){
        fclose($this-> fp);
    }

    public function log($data){

        fwrite($this-> fp, $data."\r\n");
    }
}