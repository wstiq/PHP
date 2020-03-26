<?php
require "index.html";
if (isset($_REQUEST["text"])) {
    $data = $_REQUEST["text"];
    $flag = false;
    if (!preg_match("/^(?=.{10,}$)/", $data)) {
        echo "Пароль менее 10 символов" . "<br>";
        $flag = true;
    }
    if (!preg_match("/(?=(.*\d){2})(?=(.*[a-z]){2})(?=(.*[A-Z]){2})(?=(.*[_\*#$%]){2})/", $data)) {
        echo "В пароле содержится менее 2 специальных символов"."<br>";
        $flag = true;
    }
    if (preg_match("/\d{4,}/", $data)) { //odin
        echo "Пароль содержит более 3 цифр подряд"."<br>";
        $flag = true;
    }
    if (preg_match("/[A-Z]{4,}/", $data)) { //dva
        echo "Пароль содержит более 3 заглавные латинские буквы подряд"."<br>";
        $flag = true;
    }
    if (preg_match("/[a-z]{4,}/", $data)) {
        echo "Пароль содержит более 3 прописные латинские буквы подряд"."<br>"; ///tri
        $flag = true;
    }
    if (preg_match("/[_\*#$%]{4,}/", $data)) {
        echo "Пароль содержит более 3 специальных символов (_ * # $ %) подряд"."<br>";////dvenadtcat`
        $flag = true;
    }
    if(!$flag){
        echo "Пароль корректный";
    }

}
/*
test
qw5Hg6*%FsdR
*/
