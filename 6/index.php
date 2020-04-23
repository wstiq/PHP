<?php
$text = fopen("text.txt", "r");
if ($text) {
    $config = [];
    $config = (parse_ini_file(basename(__FILE__, ".php") . ".ini", true, INI_SCANNER_RAW));
    while (!feof($text)) {
        $sstr = fgets($text);
        $symbol = substr($sstr, 0, 1);
        if($config["first_rule"]["symbol"] == $symbol){
            echo register($sstr, $config["first_rule"]["upper"])."<br>";
        } else if ($config["second_rule"]["symbol"] == $symbol){
            echo countF($sstr, $config["second_rule"]["direction"])."<br>";
        } else if ($config["third_rule"]["symbol"] == $symbol){
            echo delete($sstr, $config["third_rule"]["delete"])."<br>";
        } else{
            echo $sstr."<br>";
        }
    }
} else {
    echo "Файл открыть не удалось";
}

function register($string, $upper){
    switch ($upper){
        case "true":
            return mb_strtoupper($string, 'UTF-8');
        case "false":
            return mb_strtolower($string, 'UTF-8');
    }
}

function countF($string, $direction){
    $str = "";
    if ($direction == "+") {
        for ($i = 0; $i < strlen($string); $i++) {
            if (is_numeric($string[$i])&& $i!=0) {
                $str .=(string)(((int)$string[$i])+1 % 10);
            } else {
                $str .=$string[$i];
            }
        }
    } else {
        for ($i = 0; $i < strlen($string); $i++) {
            if (is_numeric($string[$i]) && $i!=0 ) {
                $str .=(string)(((int)$string[$i])-1 % 10);
            } else {
                $str .= $string[$i];
            }
        }
    }
    return $str;
}

function delete($string, $delete){
    return str_replace($delete, "", $string);
}