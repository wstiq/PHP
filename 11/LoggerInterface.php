<?php
//The LoggerInterface exposes eight methods to write logs to the eight RFC 5424 levels (debug, info, notice, warning, error, critical, alert, emergency).
//
//A ninth method, log, accepts a log level as the first argument.
namespace loggerInterface;

interface LoggerInterface
{
    public function debug($message, array $context = []);

    public function info($message, array $context = []);

    public function notice($message, array $context = []);

    public function warning($message, array $context = []);

    public function error($message, array $context = []);

    public function critical($message, array $context = []);

    public function alert($message, array $context = []);

    public function emergency($message, array $context = []);

    public function log($logtype, $message, array $arr = []);
}