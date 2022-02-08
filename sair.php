<?php

include('conexao.php');
session_start();

$id = $_GET['id'];
$s = session_id();

$query3 = "SELECT * FROM `$id` where `id` = '$s'";
$result2 = mysqli_query($conexao, $query3);
$row = mysqli_num_rows($result2);

if ($row == 1) {
    session_destroy();
    setcookie("id", "");
    $query = "UPDATE `$id` SET `id` = '', `user` = '', `profileimg` = '' WHERE `id` = '$s'";
    $result = mysqli_query($conexao, $query);
    $queryP = "SELECT * FROM `publicrooms` where `id` = '$id'";
    $conP = $conexao->query($queryP);
        while($dadoP = $conP->fetch_array()) {
            $participantes = $dadoP['participantes'];
            $participantesless = $participantes - 1;
            $queryUPD = "UPDATE `publicrooms` SET `participantes` = '$participantesless' where `id` = '$id'";
            $resultUPD = mysqli_query($conexao, $queryUPD);
        }
    echo ("<script> location.href='index.php' </script>");
} else {
    echo ("<script> location.href='erro4.php' </script>");
}

?>