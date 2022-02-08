<?php 

$sid = $_COOKIE['us_uuid'];
$rid = $_GET['roomid'];
$stoken1 = $_COOKIE['stoken1'];
$stoken2 = $_COOKIE['stoken2'];

$queryVER = "SELECT * FROM `adminlogs` where `sid` = '$sid' and `securitytoken1` = '$stoken1' and `securitytoken2` = '$stoken2'";
$resultadoVER = mysqli_query($conexao, $queryVER);
$rowVER = mysqli_num_rows($resultadoVER);

if($rowVER == 1) {

$sql = $pdo->query("SELECT * FROM `deletedrooms` where `roomid` = '$rid'");

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

            if ($key['user'] != "" && $key['userid'] != "" && $key['userid'] != "BOT") {
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
            }
} else {
    echo ("<script> location.href='paineldecontrole.php' </script>");
}