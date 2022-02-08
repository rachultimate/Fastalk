<?php

error_reporting(0);

$id = $_COOKIE['id'];
$s = $_COOKIE['us_uuid'];
include('conexao.php');


$query = "SELECT * FROM `$id` where `apenasadmins` = 'Sim'";
$result = mysqli_query($conexao, $query);
$row = mysqli_num_rows($result);

$query2 = "SELECT * FROM `$id` where `id` = '$s' and `Admin` = 'Sim'";
$result2 = mysqli_query($conexao, $query2);
$row2 = mysqli_num_rows($result2);

if($row == 0) {
    echo ("margin-left: 5px; font-size: 15px;");
} else {
    if($row2 == 0) {
    echo ("margin-left: 5px; font-size: 15px; cursor: not-allowed; background-color: rgba(0, 0, 0, 0.5);");
    } else {
        echo ("margin-left: 5px; font-size: 15px;");
    }
}