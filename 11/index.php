<?php
require "index.html";
require_once "Logger.php";
require_once "LoggerFile.php";

if (isset($_POST['data'])) {
    $data = $_POST['data'];

    function writeFormat($data)
    {
        $data_array = explode("\n", $data);
        for ($i = 0; $i < count($data_array); $i++) {
            $data_array[$i] = str_replace("\r", "", $data_array[$i]);
        }
        $object = [];

        for ($i = 0; $i < count($data_array); $i++) {
            $createObject = (object)[];
            if (preg_match("/^[1-9][\.\d]*(,\d+)?$/", $data_array[$i])) {
                $createObject->type = "numeric/number";
            } else $createObject->type = "string";

            $createObject->date = '[' . date("d-m-Y h:i:s") . ']'; //who cares if not msk time?
            $createObject->info = $data_array[$i];

            array_push($object, $createObject);
        }
        $main["json"] = $object;
        return json_encode($main, JSON_UNESCAPED_UNICODE);

    }

    $fileName = $_POST["fileName"] ? $_POST["fileName"] : "File";
    $toFile = new LoggerFile($fileName);
    $toFile->log(writeFormat($data));
}