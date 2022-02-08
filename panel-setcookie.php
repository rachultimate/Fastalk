<?php

session_start();

$id = $_COOKIE['PHPSESSID'];

$options_array = array (
    'expires' => time()+60*60*24*30,
    'httponly' => true
);

$stoken1url = $_GET['stoken1'];
$stoken2url = $_GET['stoken2'];

setcookie('stoken1', $stoken1url, $options_array);
setcookie('stoken2', $stoken2url, $options_array);
setcookie('us_uuid', $id, $options_array);

echo ("<script> location.href='mainpanel.php' </script>");