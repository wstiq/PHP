<?php

require "index.html";

$in = "";
if (isset($_POST["text"])) {
    $data = $_POST["text"];
    if (isset($_COOKIE["cookie"]))
        $in = $_COOKIE["cookie"];
    else setcookie("cookie", $data, time() + 10);

    $postdata = http_build_query(
        array(
            'text' => $data
        )
    );
    $opts = array('http' =>
        array(
            'method' => 'POST',
            'header' => 'Content-Type: application/x-www-form-urlencoded',
            'content' => $postdata
        )
    );

    $context = stream_context_create($opts);
    $result = file_get_contents('file.php', false, $context);


    echo $result;


}

?>


<script>
    let input = document.getElementById("text");
    let inf = '<?php echo $in;?>';
    input.value = inf;
</script>





