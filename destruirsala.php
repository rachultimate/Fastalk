<?php

include('conexao.php');
session_start();

$id = $_GET['id'];
$s = session_id();

$queryADM = "SELECT * FROM `$id` where `id` = '$s' and `Admin` = 'Sim'";
$resultADM = mysqli_query($conexao, $queryADM);
$rowADM = mysqli_num_rows($resultADM);

if ($rowADM == 1) {
    $conSALA = $conexao->query($queryADM);

    while($dadoSALA = $conSALA->fetch_array()) {
        $newid = $id."_".$dadoSALA['pwd'];
    }
    $queryTRANSFER = "INSERT INTO deletedrooms (roomid, userid, profileimg, sendid, user, tag, mensagem, img, video, file, filename, horario, data, Admin, Banido, Cor, online, pwd, pwdrequired, token, ip, cidade, estado, pais,dispositivo)
    SELECT '$newid', id, profileimg, sendid, user, tag, mensagem, img, video, file, filename, horario, data, Admin, Banido, cor, online, pwd, pwdrequired, token, ip, cidade,estado, pais, dispositivo
    FROM $id";
    $resultTRANSFER = mysqli_query($conexao, $queryTRANSFER);
    echo ("<script> location.href='index.php' </script>");
    session_destroy();
    setcookie("id", "");
    $query = "DROP TABLE `$id`";
    $result = mysqli_query($conexao, $query);
    $query2 = "DELETE FROM `publicrooms` where `id` = '$id'";
    $result2 = mysqli_query($conexao, $query2);
} else {
    echo ("You have no permission to delete this room");
}

?>