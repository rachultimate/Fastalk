<?php

while ($dado = $conSALAS->fetch_array()) {

if($_GET['nome'] == "" && $_GET['tema'] == "") {
$querySEE = "SELECT * FROM `publicrooms` ORDER BY `pais` = '$country', `participantes` ASC";
} else {
    if($_GET['nome'] != "" && $_GET['tema'] == "") {
    $querySEE = "SELECT * FROM `publicrooms` where `nomesala` LIKE '%$nomeget%'";
    }
    if($_GET['nome'] == "" && $_GET['tema'] != "") {
        $querySEE = "SELECT * FROM `publicrooms` where `temasala` LIKE '%$temaget%'";
    }
    if($_GET['nome'] != "" && $_GET['tema'] != "") {
        $querySEE = "SELECT * FROM `publicrooms` where `nomesala` LIKE '%$nomeget%' or `temasala` LIKE '%$temaget%'";
    }
}
$conSEE = mysqli_query($conexao, $querySEE);
$rowSEE = mysqli_num_rows($conSEE);
$conSEEduo = $conexao->query($querySEE);

if($country == "Brazil") { 
    $donodasala = "Dono da sala: "; 
    $tema = "Tema: ";
    $Participantes = "Participantes: ";
    $Entrar = "Entrar";
} else { 
    $donodasala = "Room Host: "; 
    $tema = "Theme: ";
    $Participantes = "Participants: ";
    $Entrar = "Join";
    }

    if($rowSEE != 0 || $rowSEE != null) {
            $nomedado = htmlspecialchars($dado['nomesala'], ENT_QUOTES, 'UTF-8');
            $temadado = htmlspecialchars($dado['temasala'], ENT_QUOTES, 'UTF-8');
            $participantesnum = $dado['participantes'];
            $admin = $dado['host'];
            $id = $dado['id'];
            if($dado['online'] > time()-1800) {
                if($temadado != "") {
                echo ("                        <main class='sala'>
                <form method='POST' action='entrar.php?id=$id'>
                
                <p style='color: rgb(0, 252, 210)'>".$nomedado."</p>
                <p>ID: <span style='color: rgb(0, 156, 177);'>".$id."</span></p>
                <p> ".$donodasala." <span style='color: rgb(18, 99, 250);'>".$admin."</span></p>
                <p> ".$tema." <span style='color: rgb(18, 99, 250);'>".$temadado."</span></p>
                <p> ".$Participantes." <span style='color: rgb(111, 0, 255);'>".$participantesnum."</span></p>
                <button class='join'>".$Entrar."</button>
                </form>
                            
            </main> ");
            } else {
                echo ("                        <main class='sala'>
                <form method='POST' action='entrar.php?id=$id'>
                
                <p style='color: rgb(0, 252, 210)'>".$nomedado."</p>
                <p>ID: <span style='color: rgb(0, 156, 177);'>".$id."</span></p>
                <p> ".$donodasala." <span style='color: rgb(18, 99, 250);'>".$admin."</span></p>
                <p> ".$Participantes." <span style='color: rgb(111, 0, 255);'>".$participantesnum."</span></p>
                <button class='join'>".$Entrar."</button>
                </form>
                            
            </main> ");   
            }
        }
        if($dado['online'] < time()-86400) {
            $queryDROP = "DROP TABLE `$id`";
            $resultDROP = mysqli_query($conexao, $queryDROP);
            $queryDROP2 = "DELETE FROM `publicrooms` where `id` = '$id'";
            $resultDROP2 = mysqli_query($conexao, $queryDROP2);
        }
    } else {
        if($country == "Brazil") {
            echo ("<br> <p style='text-align: center; color: orange;'>Nenhuma sala foi encontrada com as opções inseridas</p>");
        } else {
            echo ("<br> <p style='text-align: center; color: orange;'>No rooms were found with the inserted options</p>");
        }
    }
}