<?php
if (isset($_REQUEST['send'])) {
    $string = $_REQUEST['string'];
    $result = concatenateString($string);
    $str = $result[0];
    $count = $result[1];
    print ($string. " - исходная строка".'   ');
    print ($str." ".$count." - количество замен");
} else {
    include("index.html");
}

function generator($string)
{
    static $count = 0;
    for ($i = 0; $i < strlen($string); $i++) {
        switch ($string[$i]) {
            case "h":
            case "H":
                $count++;
                yield "4";
                break;
            case "l":
            case "L":
                $count++;
                yield "1";
                break;
            case "e":
            case "E":
                $count++;
                yield "3";
                break;
            case "o":
            case "O":
                $count++;
                yield "0";
                break;
            default:
                yield $string[$i];
        }
    }
    return $count;
}

function concatenateString($data) //added function to concatenate strings
{
    $str = "";
    $generator = generator($data);
    foreach ($generator as $item) {
        $str .= $item;
    }
    $count = $generator -> getReturn();
    return [$str, $count];
}