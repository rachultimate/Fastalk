<?php

include('conexao.php');

$id = $_COOKIE['id'];
$s = $_COOKIE['us_uuid'];

$query2 = "UPDATE `$id` SET `digitando` = '0' where `id` = '$s'";
$resultado2 = mysqli_query($conexao, $query2);