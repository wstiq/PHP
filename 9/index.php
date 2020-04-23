<?php
require 'index.html';
require_once 'LoggerToBrowser.php';
require_once 'LoggerToFile.php';

if (isset($_POST["data"]) && isset($_POST["check"]) && isset($_POST["logger"])) {

    $fileName = $_POST["fileName"] ? $_POST["fileName"]  : "File";
    $data = $_POST["data"];
    $data_array = explode("\n", $data);

    for ($i = 0; $i < count($data_array); $i++) {
        $data_array[$i] = str_replace("\r", "", $data_array[$i]);
    }
    $check = $_POST["check"];
    $logger = $_POST["logger"];

    if ($logger == "one") {
        $toFile = new LoggerToFile($fileName);
        for ($i=0; $i<count($data_array); $i++){
            $log = get_log_string($data_array[$i], $check);
            $toFile->log($log);
        }
    } else {
        $toBrowser = new LoggerToBrowser();
        for ($i=0; $i<count($data_array); $i++){
            $log = get_log_string($data_array[$i], $check);
            $toBrowser->log($log);
        }
    }
}

function get_log_string($string, $param) {
    $log = "";
    if ($param == "1"){
        $log.='['.date('h:i:s').']';
    } elseif ($param =="2"){
        $log.='['.date("d-m-Y h:i:s").']';
    } else {
        $log="";
    }

    if(check($string)){
        $log.="Строка  \"$string\" содержит заглавные буквы ";
    }  else $log.="Строк \"$string\" не содержит заглавные буквы ";

    return $log;

}

function check($string){

    $array =  preg_split('//u', $string, -1, PREG_SPLIT_NO_EMPTY);

    for ($i = 0; $i < count($array); $i++) {
        if ($array[$i] > "А" && $array[$i] < "Я" || $array[$i] > "A" && $array[$i] < "Z") {
            return true;
        }
    } return false;
}