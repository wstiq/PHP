<?php
error_reporting(E_ALL & ~E_NOTICE); //:D

if (isset($_REQUEST["sort"])) { //добваил проверку
    $strings = $_REQUEST["strings"];
    $exploded = explode("\n", $strings);

    $sorted = sort_str($exploded);

    foreach ($sorted as $value) {
        echo($value . "<br />");
    }

} else {
    include "index.html";
}

function sort_str($separate_strings)
{
    $arrsort = [];
    for ($i = 0; $i < count($separate_strings); $i++) {
        $separate_strings[$i] = explode(' ', $separate_strings[$i]);
        array_push($arrsort, $separate_strings[$i]);
        shuffle($separate_strings[$i]);
        array_push($arrsort, $separate_strings[$i]);
    }
    usort($arrsort, function ($a, $b) {
        if ($a[1] < $b[1]) return -1;
        else return 1;
    });

    for ($i = 0; $i < count($arrsort); $i++) {
        $arrsort[$i] = implode(" ", $arrsort[$i]);
    }
    return $arrsort;
}

?>








































































