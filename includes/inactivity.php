<?php
if (isset($_SESSION['userId'])) {
$_SESSION['timesince'] = time() - $_SESSION['sessionTimeStamp'];
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
$json = trim(file_get_contents($root."/setup.json"), "\xEF\xBB\xBF");
$settings = json_decode($json, true);
#30 minutes = 1800 15 minutes = 900
if($_SESSION['timesince'] >= $settings['inactivityTimer']) {
    session_destroy();
    sleep(5);
    header("Location: ../log-in/index.php?timeout");
    exit();
} else {
    $_SESSION['sessionTimeStamp'] = time();
}
$timer = $settings['inactivityTimer'] + 1;
    echo '<script>
    function quizTimer(){
        if (typeof secondsCounter == \'undefined\') {
            secondsCounter = 0;
        }
        if (secondsCounter >= '.$timer.') {
            document.querySelector(\'.innerHere\').innerHTML = "<div class=\'expire\' id=\'expireNot\'><h1 id=\'expireh1\'>You have been logged out due to inactivity<button onclick=\'removeSessionMessage()\'>Sign back in</button></h1></div>";
        } else {
            secondsCounter++;
            console.log(secondsCounter);
        }
    }
    </script>';
}
?>