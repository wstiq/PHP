<?php
require 'index.html';
include 'Generator4.php';
if (isset($_REQUEST["text"])) {
    $data = $_REQUEST["text"];
    $data_array = explode("\n", $data);
    $array = [];

    for ($i = 0; $i < count($data_array); $i++) {
        $data_array[$i] = str_replace("\r", "", $data_array[$i]);
    }
    if (check($data_array)) {
        $sum = 0;
        $array["sum"] = [];
        $array["data"] = [];
        $prob = 0;
        array_push($array["sum"], $array["data"]);

        for ($i = 0; $i < count($data_array); $i++) {
            $text = explode(" ", $data_array[$i]);
            $explode_for_sum = explode(" ", $data_array[$i]);
            $for_sum = array_pop($explode_for_sum);
            $sum += $for_sum;
            array_push($array["data"], ["text" => arrText($text),
                "weight" => $for_sum, "probability" => $prob]);
        }
        $array["sum"] = $sum;

        for ($i = 0; $i < count($array["data"]); $i++) {
            $prob = $array["data"][$i]["weight"] / $sum;
            $array["data"][$i]["probability"] = $prob;
        }


    } else $array["error"] = "Число отрицательное или не число";
    echo "Задание 1: " . json_encode((object)$array, JSON_UNESCAPED_UNICODE) . '<br>' . '<br>';
    echo "Задание 2: " . generate($array);
}
function arrText($array)
{
    $result = [];
    for ($i = 0; $i < count($array) - 1; $i++) {
        array_push($result, $array[$i]);
    }
    return implode(" ", $result);
}

function check($array)
{
    for ($i = 0; $i < count($array); $i++) {
        $explode_for_sum = explode(" ", $array[$i]);
        $for_sum = array_pop($explode_for_sum);
        if (!is_numeric($for_sum) || $for_sum < 0) return false;
    }
    return true;
}
