<?php

$data = $_POST["text"];
function generator($data){
    $count = 0;

    for ($i = 0; $i < strlen($data); $i++) {
        if ($data[$i] === 'h') {
            $count++;
            yield "4";
        } else if ($data[$i] === 'l') {
            $count++;
            yield "1";
        } else if ($data[$i] === 'e') {
            $count++;
            yield "3";
        } else if ($data[$i] === 'o') {
            $count++;
            yield "0";
        } else {
            yield $data[$i];
        }
    }
    return $count;
}


function change($data){
    $string = "";
    $generators = generator($data);
    foreach ($generators as $value) {
        $string .= $value;
    }
    echo "Кол-во: " . $generators->getReturn() . "<br>";
    return $string;
}

echo "Cтрока: " . change($data) . "<br>";
