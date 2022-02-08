<?php

include('conexao.php');


if(isset($_POST['changepm'])) {
    $query = "SELECT * FROM `$id` where `Admin` = 'Sim' and `allowcc` = '1'";
    $result = mysqli_query($conexao, $query);
    $row = mysqli_num_rows($result);

        if($row == 1) {
    $newcor = random_int(1, 9);

    $newquery = "UPDATE `$id` SET `Cor` = '$newcor' where `id` = '$s'";
    $resultnewquery = mysqli_query($conexao, $newquery);
    } else {
        $newquery = "SELECT * FROM `$id` where `Admin` = 'Sim' and `id` = '$s'";
        $newresult = mysqli_query($conexao, $newquery);
        $newrow = mysqli_num_rows($newresult);

        if($newrow == 1) {
            $newcor = random_int(1, 9);

            $newquery2 = "UPDATE `$id` SET `Cor` = '$newcor' where `id` = '$s'";
            $resultnewquery2 = mysqli_query($conexao, $newquery2); 
        } else {
            echo ("<script> alert('O administrador não permite que membros mudem a cor do nick') </script>");
        }
    }
}