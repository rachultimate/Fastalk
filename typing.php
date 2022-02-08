<?php

include('conexao.php');

$id = $_COOKIE['id'];
$s = $_COOKIE['us_uuid'];

$query = "UPDATE `$id` SET `digitando` = '1' where `id` = '$s' and `Banido` = 'Não'";
$resultado = mysqli_query($conexao, $query);