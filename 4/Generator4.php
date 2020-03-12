<?php

function getRandomString($data_json)
{
    $sum = $data_json["sum"];
    $data = $data_json["data"];
    $rand = mt_rand(1, $sum);
    $cur = 0;
    $prev = 0;
    for ($i = 0; $i < count($data); ++$i) {
        if ($i != 0) {
            $prev += $data[$i - 1]["weight"];
        } else $prev += 0;
        $cur += $data[$i]["weight"];
        if ($rand > $prev && $rand <= $cur) {
            return $data[$i]["text"];
        }
    }
    return -1;
}

function generate($data_json)
{
    $iter = 10000;

    for ($i = 0; $i <= $iter; $i++) {
        $str = getRandomString($data_json);

        for ($j = 0; $j < count($data_json["data"]); $j++) {
            if (!isset($data_json["data"][$j]["count"])) {
                $data_json["data"][$j]["count"] = 0;
            } else if ($data_json["data"][$j]["text"] === $str) {
                $count = $data_json["data"][$j]["count"]++;
                $data_json["data"][$j]["calculated_probability"] = ($count / $iter);
            }
        }
    }
    for ($i = 0; $i < count($data_json["data"]); $i++) {
        unset($data_json["data"][$i]["weight"]);
        unset($data_json["data"][$i]["probability"]);
    }

    return json_encode($data_json["data"], JSON_UNESCAPED_UNICODE); //256
}
