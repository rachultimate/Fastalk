<?php

session_start();
$sJ = session_id();

if($_GET['nome'] != "" || $_GET['tema'] != "") {
    $nomeget = $_GET['nome'];
    $temaget = $_GET['tema'];
}

if(isset($_COOKIE['id'])) {
$id = $_COOKIE['id'];
}

$query = "SELECT * from `$id` where `id` = '$sJ'";
$result = mysqli_query($conexao, $query);
$row = mysqli_num_rows($result);

    if($row != 0) {
        echo ("<script> location.href='sala.php?id=$id' </script>");
    }

$querySALAS = "SELECT * FROM `publicrooms`";
$conSALAS = $conexao->query($querySALAS);

if(isset($_POST['pesquisar'])) {
    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $tema = mysqli_real_escape_string($conexao, $_POST['tema']);

    header("Location: salaspublicas.php?nome=$nome&tema=$tema");
}

if(isset($_POST['createroom'])) {
    $user = mysqli_real_escape_string($conexao, $_POST['nick']);
}

?>