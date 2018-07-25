<?php

function cookieIsset($name) {
    return isset($_COOKIE[$name]) && '' !== $_COOKIE[$name];
}


session_start();
$_SESSION["pages"][] = $_SERVER['PHP_SELF'];
var_dump($_SESSION);


echo '<br>=================================================<br>';

