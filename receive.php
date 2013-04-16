<?php

$lastreceived = $_POST['lastreceived'];
$log_contents = file("message_log.txt", FILE_IGNORE_NEW_LINES);
for ($line = 0; $line < count($log_contents); $line++) {
    $Got_Message = split("<!@!>", $log_contents[$line]);
    if ($Got_Message[0] > $lastreceived)
        echo $Got_Message[1] . "<br>";
}
echo "<SRVTM>" . $Got_Message[0];
?>

