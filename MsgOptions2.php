<?php

error_reporting(0);

$id = $_COOKIE['id'];
$s = $_COOKIE['PHPSESSIONID'];
include('conexao.php');


$query = "SELECT * FROM `$id` where `apenasadmins` = 'Sim'";
$result = mysqli_query($conexao, $query);
$row = mysqli_num_rows($result);

$country = $_COOKIE['country'];

if($country == "Brazil") {
    $placeholder = "Digite alguma coisa aqui...";
    $apenasadmins = "Apenas adminstradores podem falar agora...";
} else {
    $placeholder = "Type something here...";
    $apenasadmins = "Only admins can talk now...";
}

if($row == 0) {
    echo ($placeholder);
} else {
    echo ($apenasadmins);
}