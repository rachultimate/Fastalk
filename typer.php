<?php

error_reporting(0);

include('conexao.php');
$id = $_COOKIE['id'];
$s = $_COOKIE['us_uuid'];

$country = $_COOKIE['country'];

$query = "SELECT * FROM `$id` where `digitando` = '1' and `id` != '$s'";
$con = $conexao->query($query);
$conduo = mysqli_query($conexao, $query);
$row = mysqli_num_rows($conduo);

while($dado = $con->fetch_array()) {
    $nick = $dado['user'];
}

if($row != 0) {
    if($country == "Brazil") {
        $estadigitando = "está digitando...";
    } else {
        $estadigitando = "is typing...";
    }
    echo ("<main style='margin-top: -22px; background-color: transparent; position: absolute;' class='digitando'><span style='background-color: rgb(37, 37, 37);'><span style='color: white;'>".$nick."</span> ".$estadigitando."</span></main>");
}