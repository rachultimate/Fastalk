<?php
error_reporting(0);
include('conexao.php');
session_start();

$s = $_COOKIE['us_uuid'];
$token1 = $_COOKIE['stoken1'];
$token2 = $_COOKIE['stoken2'];

$queryVERIFY = "SELECT * FROM `adminlogs` where `sid` = '$s' and `securitytoken1` = '$token1' and `securitytoken2` = '$token2'";
$resultVERIFY = mysqli_query($conexao, $queryVERIFY);
$conVERIFY = $conexao->query($queryVERIFY);
$rowVERIFY = mysqli_num_rows($resultVERIFY);

$options_array = array (
    'expires' => time()+60*60*24*30,
    'httponly' => true
);

if($rowVERIFY == 1) {
    setcookie('stoken1', $token1, $options_array);
    setcookie('stoken2', $token2, $options_array);

    while($dado = $conVERIFY->fetch_array()) {
        if($dado['id'] == 1) {
            $nome = "Pedro";
        } elseif($dado['id'] == 2) {
            $nome = "Rafael";
        } elseif($dado['id'] == 3) {
            $nome = "Gabriel";
        }
    }

    $querySALAS = "SHOW TABLES from `fastalk`";
    $resultSALAS = mysqli_query($conexao, $querySALAS);
    $salasativas = mysqli_num_rows($resultSALAS);

    $querySALASpb = "SELECT * FROM `publicrooms`";
    $resultSALASpb = mysqli_query($conexao, $querySALASpb);
    $salaspublicas = mysqli_num_rows($resultSALASpb);

    $salasprivadas = $salasativas - $salaspublicas;

    $querydestaque = "SELECT MAX(`participantes`), nomesala, participantes FROM `publicrooms`";
    $condestaque = $conexao->query($querydestaque);

    while($dadoSALAS = $condestaque->fetch_array()) {
        $salads_nome = $dadoSALAS['nomesala'];
        $salads_ptcp = $dadoSALAS['participantes'];
    }

    $queryvisitantes = "SELECT * FROM `livecounter`";
    $convisitantes = $conexao->query($queryvisitantes);

    while($dadoVST = $convisitantes->fetch_array()) {
        $usersonline = $dadoVST['result'];
        $acessos = $dadoVST['acessos'];
    }

    $visitasmensais = $acessos / 30;

    $retornomensal = $visitasmensais / 1000 * 0.68;
    $retornototal = $acessos / 1000 * 0.68;

    $lucrototal = $retornototal - 50;

    if($lucrototal > 0) {
        $respostalucro = "<span style='color: green;'>US$ $lucrototal</span>";
    } elseif($lucrototal < 0) {
        $respostalucro = "<span style='color: red;'>US$ $lucrototal</span>";
    } elseif($lucrototal == 0) {
        $respostalucro = "<span>US$ $lucrototal</span>";
    }

    
} else {
    echo ("<script> location.href='paineldecontrole.php' </script>");
}
?>