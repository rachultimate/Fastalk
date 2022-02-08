<?php

include('conexao.php');

$usersLOW = random_int(2, 8);
$usersHIGH = random_int(10, 20);
$percentage = random_int(1, 10);

$query = "SELECT * FROM `livecounter`";
$con = $conexao->query($query);


while($dado = $con->fetch_array()) {
    if($percentage > 3) {
    $result = $dado['result'];
    $acessos = $dado['acessos'];
    echo ($result);
    if($result < 475) {
    $plusresult = $result + 1;
    $plusresult2 = $acessos + 3;
    $query2 = "UPDATE `livecounter` SET `result` = '$plusresult'";
    $result2 = mysqli_query($conexao, $query2);
    $query2 = "UPDATE `livecounter` SET `acessos` = '$plusresult2'";
    $result2 = mysqli_query($conexao, $query2);
    }
    } else {
        $result = $dado['result'];
    echo ($result);
    if($result > 0) {
    $plusresult = $result - 1;
    $query2 = "UPDATE `livecounter` SET `result` = '$plusresult'";
    $result2 = mysqli_query($conexao, $query2); 
    }   
    }
}