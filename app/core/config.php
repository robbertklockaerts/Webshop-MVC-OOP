<?php 

//name website
define("WEBSITE_TITLE", 'FreshShop');

//db name
define('DB_NAME', "webshop");
define('DB_USER', "root");
define('DB_PASS', "");
define('DB_TYPE', "mysql");
define('DB_HOST', "localhost");

// if you put your template in a separate folder
// define('THEME', vb webshopTemp/)

// set debugs on show them, you can set them of for the user sake
define('DEBUG', true);

if (DEBUG){
     ini_set('display_errors', 1); 
}else{
    ini_set('display_errors', 0); 
}