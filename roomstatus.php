<?php

include('conexao.php');

$id = $_COOKIE['id'];
$s = $_COOKIE['us_uuid'];
$country = $_COOKIE['country'];

$query = "SELECT * FROM `publicrooms` where `id` = '$id'";
$result = mysqli_query($conexao, $query);
$row = mysqli_num_rows($result);

$queryAdm = "SELECT * FROM `$id` where `id` = '$s' and `Admin` = 'Sim'";
$resultAdm = mysqli_query($conexao, $queryAdm);
$rowAdm = mysqli_num_rows($resultAdm);

if($row == 0) {
    if($country == "Brazil") {
    echo ("Status da Sala: <span style='color: yellow'>Privada</span>");
    } else {
        echo ("Room Status: <span style='color: yellow'>Private</span>");
    }
} else {
    if($country == "Brazil") {
    echo ("Status da Sala: <span style='color: darkcyan'>Pública</span>");
        if($rowAdm == 1) {
            echo (" <br> <form method='POST' target='hiddenFrame'><li><button name='private-btn' class='limpar-chat3'>Privar Sala</button></li></form>");
        }
    } else {
    echo ("Room Status: <span style='color: darkcyan'>Public</span>");
        if($rowAdm == 1) {
            echo (" <br> <form method='POST' target='hiddenFrame'><li><button name='private-btn' class='limpar-chat3'>Private Room</button></li></form>");
        }
    }
}