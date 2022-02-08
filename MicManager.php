<?php

include('conexao.php');

$id = $_COOKIE['id'];
$s = $_COOKIE['us_uuid'];

$query = "SELECT * FROM `$id` where `id` = '$s'";
$con = $conexao->query($query);

while($dado = $con->fetch_array()) {
    $mic = $dado['mic'];
}

if($mic == 0) {
    $queryChange = "UPDATE `$id` SET `mic` = '1' where `id` = '$s'";
    $resultChange = mysqli_query($conexao, $queryChange);
} else {
    $queryChange = "UPDATE `$id` SET `mic` = '0' where `id` = '$s'";
    $resultChange = mysqli_query($conexao, $queryChange);
}