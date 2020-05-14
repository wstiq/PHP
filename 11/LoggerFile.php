<?php


class LoggerFile implements Logger
{
    private $fp = null;

    public function __construct($fileName)
    {
        $this->fp = fopen($fileName . ".json", "w");
    }

    public function __destruct()
    {
        fclose($this->fp);
    }

    public function log($data)
    {
        fwrite($this->fp, $data . "\r\n");
    }
}