<?php

$str = time() . "JHJDSH@*#&(@HJHS@*#&*SHDES";
$pass = substr(sha1($str), 0, 12);


$message = strip_tags($_POST['message']);
$message = stripslashes($message);
$user = $_POST['user'];

if ($user != "admin") {
    $user = '';
}

$log_contents = file("message_log.txt", FILE_IGNORE_NEW_LINES);

$log_contents[] = time() . "<!@!>" . $user . "" . $message;
if (count(log_contents) > 50)
    $log_contents = array_slice($log_contents, 1);
$file_save = fopen("message_log.txt", "w+");
flock($file_save, LOCK_EX);
for ($line = 0; $line < count($log_contents); $line++) {
    fputs($file_save, $log_contents[$line] . "\n");
};
flock($file_save, LOCK_UN);
fclose($file_save);
exit();


?>

