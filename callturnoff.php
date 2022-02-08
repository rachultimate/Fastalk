<?php

include('conexao.php');

$id = $_COOKIE['id'];
$s = $_COOKIE['us_uuid'];


$query = "UPDATE `$id` SET `incall` = '0' where `id` = '$s'";
$result = mysqli_query($conexao, $query);