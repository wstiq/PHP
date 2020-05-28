<?php

namespace logger;

use loggerInterface\LoggerInterface;

require "LoggerInterface.php";

class Logger implements LoggerInterface
{
    public $json_array = [];
    public $path;
    public $file;

    public function __construct($filePath)
    {
        $this->path = $filePath;
        $this->file = fopen($this->path, 'a');
    }


    public function log($logtype, $message, array $arr = [])
    {
        switch ($logtype) {
            case "emergency":
                $this->emergency($message, $arr);
                break;
            case "alert":
                $this->alert($message, $arr);
                break;
            case "critical":
                $this->critical($message, $arr);
                break;
            case "error":
                $this->error($message, $arr);
                break;
            case "warning":
                $this->warning($message, $arr);
                break;
            case "notice":
                $this->notice($message, $arr);
                break;
            case "info":
                $this->info($message, $arr);
                break;
            case "debug":
                $this->debug($message, $arr);
                break;
            default:
                echo "No info";
        }
    }

    function __destruct()
    {
//        $json = json_encode($this->json_array, JSON_UNESCAPED_UNICODE);
//        fwrite($this->file, $json); //записываем файл один раз
//        fclose($this->file);
        fwrite($this->file, json_encode($this->json_array, JSON_UNESCAPED_UNICODE));
    }

    public function emergency($message, array $context = [])
    {
        $this->createJson(__CLASS__ . " " . __FUNCTION__, $message);
    }

    public function alert($message, array $context = [])
    {
        $this->createJson(__CLASS__ . " " . __FUNCTION__, $message);
    }

    public function critical($message, array $context = [])
    {
        $this->createJson(__CLASS__ . " " . __FUNCTION__, $message);
    }

    public function error($message, array $context = [])
    {
        $this->createJson(__CLASS__ . " " . __FUNCTION__, $message);
    }

    public function warning($message, array $context = [])
    {
        $this->createJson(__CLASS__ . " " . __FUNCTION__, $message);
    }

    public function notice($message, array $context = [])
    {
        $this->createJson(__CLASS__ . " " . __FUNCTION__, $message);
    }

    public function info($message, array $context = [])
    {
        $this->createJson(__CLASS__ . " " . __FUNCTION__, $message);
    }

    public function debug($message, array $context = [])
    {
        $this->createJson(__CLASS__ . " " . __FUNCTION__, $message);
    }

    private function createJson($logtype, $message)
    {
        $info = ['date' => date("d.m.y G:i:s:u"), 'type' => $logtype, 'content' => $message . ", "];
        array_push($this->json_array, $info); //добавляем переданные значения в конец как в стек
    }
}