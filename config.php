<?php

define('DB_HOST','localhost');
define('DB_USER', 'root');
define('DB_PASS','root');
define('DB_NAME', 'projet1-cepegra');

define('MODE', 'dev'); //dev ou prod (production)

$connect = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if($connect->connect_error){
    echo 'Erreur de connexion à la DB';
    exit;
}
else{
    $connect->set_charset("utf8");
}

session_start();

include('functions.php');

?>