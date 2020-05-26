<pre><?php
    require_once("Logger.php");

    use logger\Logger;

    if (isset($_POST["send"])) {
        $logger = new Logger("log.txt");
        $logger->log("debug", "debug");
//        $logger->log("info", "info");
//        https://www.php-fig.org/psr/psr-3/
//        $logger->log("notice", "notice");
//        $logger->log("warning", "warning");
//        $logger->log("error", "error");
//        $logger->log("critical", "critical");
//        $logger->log("alert", "alert");
//        $logger->log("emergency", "emergenct");


    } else {
        include "web.html";
    }


    ?>



</pre>



