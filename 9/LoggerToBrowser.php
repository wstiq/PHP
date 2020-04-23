<?php
require_once 'Logger.php';

class LoggerToBrowser extends Logger
{

    public function log($data)
    {
        echo $data."<br/>";
    }

}