<?php

include('conexao.php');

$id = $_COOKIE['id'];
$s = $_COOKIE['us_uuid'];

$query = "UPDATE `$id` SET `pwdrequired` = '0' where `id` = '$s' and `Admin` = 'Sim'";
$resultado = mysqli_query($conexao, $query);