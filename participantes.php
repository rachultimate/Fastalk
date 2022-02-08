<?php

$id = $_COOKIE['id'];
include('conexao.php');
$sID = $_COOKIE['us_uuid'];

$queryC = "SELECT * FROM `$id` where `id` = '$sID'";
$sqlC = mysqli_query($conexao, $queryC);
$rowC = mysqli_num_rows($sqlC);

$queryC2 = "SELECT * FROM `$id` where `id` = '$sID' and `Banido` = 'Sim'";
$sqlC2 = mysqli_query($conexao, $queryC2);
$sqlCON2 = $conexao->query($queryC2);
$rowC2 = mysqli_num_rows($sqlC2);

if($rowC2 == 0) {


if ($rowC != 0) {


$sql = $pdo->query("SELECT * FROM `$id` where `Banido` = 'Não' ORDER BY `online` DESC");

foreach ($sql->fetchAll() as $key) {
    if(strlen($key['user']) > 10) {
        if($key['Admin'] == "Sim") {
                $style = "style='font-size: 12px; margin-top: -30px; color: red;'";
                } else {
                $style = "style='font-size: 12px; margin-top: -30px;'";
                }
            } else {
                if($key['Admin'] == "Sim") {
                    $style = "style='color: red;'";
                } else {
                    $style = "style='color: white'";
                }
            }

            if ($key['user'] != "" && $key['id'] != "" && $key['id'] != "BOT") {
                    if($key['online'] > time()-10) {
                        if($key['Admin'] == "Sim") {
                            echo ('
                            <main class="userbox">          
                            <main class="usuario">
                                <div class="usuario-img">
                                    <div class="online"></div>
                                    <img width="35" height="35" src="midia/'.$key['profileimg'].'"></div>
                                <p '.$style.'>'.$key['user'].'</p>  
                            </main>
                        </main>
                            ');       
                        } else {
                            echo('
                            <main class="userbox">          
                            <main class="usuario">
                                <div class="usuario-img">
                                    <div class="online"></div>
                                    <img width="35" height="35" src="midia/'.$key['profileimg'].'"></div>
                                <p '.$style.'>'.$key['user'].'</p>  
                            </main>
                        </main>
                            ');
                        }
                    } else {
                        if($key['Admin'] == "Sim") {
                            echo ('<main class="userbox">          
                            <main class="usuario">
                                <div class="usuario-img">
                                    <div style="background-color: gray;" class="online"></div>
                                    <img width="35" height="35" src="midia/'.$key['profileimg'].'"></div>
                                <p '.$style.'>'.$key['user'].'</p>  
                            </main>
                        </main>
                                ');   
                        } else {
                            echo ('
                            <main class="userbox">          
                            <main class="usuario">
                                <div class="usuario-img">
                                    <div style="background-color: gray;" class="online"></div>
                                    <img width="35" height="35" src="midia/'.$key['profileimg'].'"></div>
                                <p '.$style.'>'.$key['user'].'</p>  
                            </main>
                        </main>
                            ');
                        }
                    }
                }
                if ($key['Admin'] != "Sim") {
                    $queryBAN = "SELECT * FROM `$id` where `id` = '$sID' and `Admin` = 'Sim'";
                    $conBAN = mysqli_query($conexao, $queryBAN);
                    $rowBAN = mysqli_num_rows($conBAN);
        
                    $nick = $key['user'];
                    
                    if($rowBAN == 1) {
                        if($nick != "" && $key['id'] != "" && $key['id'] != "BOT") {
                        echo ('<button id="ban" name="ban" class="banir" value="'.$key['user'].'">Ban</button>');
                        }
                    }          
                }
            }
    }
}
