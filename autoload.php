<?php

if(file_exists('config.php')){
    include_once "config.php";
}

if(file_exists('app/functions.php')){
    // echo 'working';
    include_once "app/functions.php";
}
if(file_exists('app/database.php')){
    include_once "app/database.php";
    echo "Database";
}
if(file_exists('app/functions.php')){
    include_once "app/functions.php";
}

if(file_exists('app/session.php')){
    include_once "app/session.php";
}
if(file_exists('app/auth.php')){
    include_once "app/auth.php";
}

if(file_exists('app/cookies.php')){
    include_once "app/cookies.php";
}





?>