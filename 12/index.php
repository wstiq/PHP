<?php

if (isset($_GET["send"])) {
    $par_pos = 0;
    $text = (string) $_GET["text"];
    $pos = 0;
    $arr = array(0);
    header("Expires: Thu, 19 Feb 1998 13:24:18 GMT");
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header("Cache-Control: no-cache, must-revalidate");
    header("Cache-Control: post-check=0,pre-check=0");
    header("Cache-Control: max-age=0");
    header("Pragma: no-cache");
    if(!isset($_COOKIE["string"])){
        setcookie("string", $text);
        header("Location: http://localhost:63342/12/task2.php?text=$text&send=Redirect");

    }else{
//        header("Location: http://localhost:63342/12/task2.php");
        header("Location: http://localhost:63342/12/task2.php?text=$text&send=Redirect");

    }


} else {
    include "web.php";
}
?>