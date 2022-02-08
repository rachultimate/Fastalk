<?php

include('conexao.php');
$id = $_COOKIE['id'];
$country = $_COOKIE['country'];

error_reporting(0);

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