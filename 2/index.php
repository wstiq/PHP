<?php
readfile('index.html');
//isset; refactor form;
require "generator.php";

$h = new generatorClass($_POST['code']);

$h->run();
?>