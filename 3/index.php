<?php
require('index.html');
$data = $_REQUEST["text"];
// $data = mb_strtolower($data, 'UTF-8'); //почему-то не поддерживает функцию)))
$data_array = explode("\n", $data); //массив предложений

function sort_array($elem1, $elem2)
{
    if ($elem1[1] == $elem2[1]) {
        return 0;
    }
    return ($elem1[1] < $elem2[1]) ? -1 : 1;
    //Выражение (expr1) ? (expr2) : (expr3) интерпретируется как expr2, если expr1 имеет значение TRUE, или как expr3, если expr1 имеет значение FALSE.
}

function getResult($array)
{
    $result_array = [];
    for ($i = 0; $i < count($array); $i++) {
        $array[$i] = explode(" ", $array[$i]);
        array_push($result_array, $array[$i]);
        shuffle($array[$i]);
        array_push($result_array, $array[$i]);
    }
    usort($result_array, "sort_array");

    for ($i = 0; $i < count($result_array); $i++) {
        $result_array[$i] = implode(" ", $result_array[$i]);
    }
    return $result_array;
}

$r = getResult($data_array);

for ($i = 0; $i < count($r); $i++) {
    echo $r[$i] .= "<br/>"; //перенос на следующую строку ч/з конкатенацию с тегом бр
}
