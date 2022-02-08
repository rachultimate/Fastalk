<?php

include('conexao.php');
session_start();
$s = $_COOKIE['us_uuid'];
$id = $_COOKIE['id'];

$time=time();
$queryST = "UPDATE `$id` SET `online` = '$time' where `id` = '$s'";
$conST = mysqli_query($conexao, $queryST);
$queryST2 = "UPDATE `publicrooms` SET `online` = '$time' where `id` = '$id'";
$conST2 = mysqli_query($conexao, $queryST2);