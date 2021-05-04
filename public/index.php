<?php
session_start();

/*
this functios show info underneath see app/core/functions
show($_SERVER);  call underneath include "..app/init.php
[SERVER_SOFTWARE] => Apache/2.4.46 (Win64) PHP/7.3.21
    [SERVER_NAME] => localhost
    [SERVER_ADDR] => ::1
    [SERVER_PORT] => 80
    [REMOTE_ADDR] => ::1
    [DOCUMENT_ROOT] => C:/wamp64/www
    [REQUEST_SCHEME] => http
    php self see browser
*/

$root = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['SERVER_NAME'] .  $_SERVER['PHP_SELF'];
//replace index.php at the end with ""   param; search replace subject
$root = str_replace("index.php", "", $root);

define('ROOT', $root);
define('ASSETS', $root . "assets/");


include "../app/init.php";
// show($root);
// show(ROOT);
//show(ASSETS);


//initialed the whole app
$app = new App();