<?php

if (isset($_GET["send"])) {

    $text = (string)$_GET["text"];

    $arr = array(0);

    function changeText($text)
    {
        for ($i = 0; $i < strlen($text); ++$i) {
            yield $text[$i];
        }
        return $text;
    }

    $changes = 0;
    print("New text: ");
    $gen = changeText($text);
    foreach ($gen as $item) {
        switch ($item) {
            case "h":
            case "H":
                echo(4);
                $changes++;
                break;
            case "i":
            case "I":
                echo(1);
                $changes++;
                break;
            case "e":
            case "E":
                echo(3);
                $changes++;
                break;
            case "o":
            case "O":
                echo(0);
                $changes++;
                break;
            default:
                echo($item);
                break;
        }

    }
//    echo "return = ".$gen->getReturn();
    print("<br/>");
    print(" and number of changes: ");
    print($changes);

} else {
    include "web.php";
}
?>