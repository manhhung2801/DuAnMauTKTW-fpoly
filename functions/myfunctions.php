<?php
session_start();
function redirect($url, $message){
    $_SESSION["message"] = $message;
    header("Location: " . $url);
    exit(0);
}

function successfully($url, $successfully){
    $_SESSION["successfully"] = $successfully;
    header("Location: " . $url);
    exit(0);
}

function warning($url, $warning){
    $_SESSION["warning"] = $warning;
    header("Location: " . $url);
    exit(0);
}

function error($url, $error){
    $_SESSION["error"] = $error;
    header("Location: " . $url);
    exit(0);
}


?>