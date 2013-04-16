<?php

function saveUsers($onlineusers_file) {
    $file_save = fopen("onlineusers.txt", "w+");
    flock($file_save, LOCK_EX);
    for ($line = 0; $line < count($onlineusers_file); $line++) {
        fputs($file_save, $onlineusers_file[$line] . "\n");
    };
    flock($file_save, LOCK_UN);
    fclose($file_save);
}

$onlineusers_file = file("onlineusers.txt", FILE_IGNORE_NEW_LINES);
$password= "help";
if (isset($_POST['user'], $_POST['oper'])) {
    $user = $_POST['user'];
    $oper = $_POST['oper'];
    $pass = $_POST['pass'];
    
    $userexist = in_array($user, $onlineusers_file);
    if ($userexist)
        $userindex = array_search($user, $onlineusers_file);

    if ($oper == "signin" && $userexist == false && $pass == $password) {
        $onlineusers_file[] = $user;
        saveUsers($onlineusers_file);
        echo "signin";
        exit();
    }

    if ($oper == "signin" && $userexist == true && $pass == $password ) {
        echo "userexist";
        exit();
    }
    
        if ($oper == "signin" && $userexist == false && $pass != $password ) {
        echo "passwrong";
        exit();
    }
    
    

    if ($oper == "signout" && $userexist == true) {
        array_splice($onlineusers_file, $userindex, 1, $user);
        saveUsers($onlineusers_file);
        echo "signout";
        exit();
    }

    if ($oper == "signout" && $userexist == false) {
        echo "usernotfound";
        exit();
    }
}
$olu = join("<br>", $onlineusers_file);
echo $olu;
?>

