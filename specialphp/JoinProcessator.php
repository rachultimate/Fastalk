<?php

error_reporting(0);

include('conexao.php');
require('recaptchalib.php');

ini_set('session.cookie_secure', '1');
ini_set('session.cookie_httponly', '1');
ini_set('session.use_only_cookies', '1');
$options_array = array (
    'expires' => time()+60*60*24*30,
    'httponly' => true
);
session_set_cookie_params($options_array);
session_start();
$s = session_id();


setcookie('us_uuid', $s, $options_array);

function getRealIpAddr()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

$xml = simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=".getRealIpAddr());
$useragent=$_SERVER['HTTP_USER_AGENT'];

if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))

header('Location: http://detectmobilebrowser.com/mobile');

$ipv = getRealIpAddr();
$country = $xml->geoplugin_countryName;
$estado = $xml->geoplugin_regionName;
$cidade= $xml->geoplugin_city;
$latitude = $xml->geoplugin_latitude;
$longitude = $xml->geoplugin_longitude;

if($_COOKIE['profileimg'] != "") {
    $source = $_COOKIE['profileimg'];
} else {
    $source = "guest.jpg";
}

setcookie('country', $country);

$sj = $_COOKIE['us_uuid'];

$cor = random_int(1, 8);

$idC = $_COOKIE['id'];
$id = $_GET['id'];

$s = $_COOKIE['us_uuid'];

$queryVER1 = "SELECT * FROM `$id` where id = '$s'";
$conVER1 = mysqli_query($conexao, $queryVER1);
$rowVER1 = mysqli_num_rows($conVER1);

$queryVER = "SELECT * FROM `$id` where `id` = '$s' and `Banido` = 'Não'";
$conVER = mysqli_query($conexao, $queryVER);
$rowVER = mysqli_num_rows($conVER);

$queryBAN = "SELECT * FROM `$id` where `id` = '$s' and `Banido` = 'Sim'";
$conBAN = mysqli_query($conexao, $queryBAN);
$rowBAN = mysqli_num_rows($conBAN);

if($rowVER1 != 0) {
    if($rowVER != 0) {
    echo ("<script> location.href='sala.php?id=$id' </script>");
    } else {
        setcookie("id", "", $options_array);
        echo ("<script> location.href='erro7.php' </script>");
    }
}

$query = "SELECT * FROM `$id`";
$result = mysqli_query($conexao, $query);
$row = mysqli_num_rows($result);

if ($row == 0) {
    echo ("<script> location.href='erro4.php' </script>");
}

if ($_POST["g-recaptcha-response"]) {
    $response = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
}

if (isset($_POST['join'])) {
    $nick = mysqli_real_escape_string($conexao, $_POST['nick']);
    $queryN = "SELECT * FROM `$id` where `user` = '$nick' and `Banido` = 'Não'";
    $sqlN = mysqli_query($conexao, $queryN);
    $rowN = mysqli_num_rows($sqlN);

    $queryIP = "SELECT * FROM `$id` where `id` = '$sj' and `Banido` = 'Sim'";
    $sqlIP = mysqli_query($conexao, $queryIP);
    $rowIP = mysqli_num_rows($sqlIP);

    $queryPWD = "SELECT * FROM `$id` where `pwdrequired` = '1' and `Admin` = 'Sim'";
    $resultPWD = mysqli_query($conexao, $queryPWD);
    $rowPWD = mysqli_num_rows($resultPWD);

        $urlpwd = $_GET['pwd'];
        $queryPWDver = "SELECT * FROM `$id` where `pwd` = '$urlpwd' and `pwdrequired` = '1'";
        $resultPWDver = mysqli_query($conexao, $queryPWDver);
        $rowPWDver = mysqli_num_rows($resultPWDver);
        $conPWDver = $conexao->query($queryPWDver);

        while($dadoPWD = $conPWDver->fetch_array()) {
            $pwdrqrd = $dadoPWD['pwdrequired'];
        }

    if($rowPWDver == 1 || $rowPWD == 0) {
        if ($rowIP == 0) {
            if (!empty($nick)) {
            if ($rowN == 0) {
                    if (strlen($nick) > 2) {
                        if (strlen($nick) < 16) {
                            if (!preg_match("/[^A-Za-z0-9_-àèìòùãñõâêîôû@ ]/", $nick)) {
                                if ($response != null && $response->success) {
                                    echo("<script> location.href='sala.php?id=$id' </script>");

                                    $queryCOR = "SELECT * FROM `$id` where `Cor` = '$cor' and `user` != ''";
                                    $conCOR = mysqli_query($conexao, $queryCOR);
                                    $rowCOR = mysqli_num_rows($conCOR);

                                    if($rowCOR < 10) {
                                        while ($rowCOR != 0) {
                                            $cor = random_int(1, 9);
                                        }
                                    } else {
                                        $cor = random_int(1, 9);
                                    }

                                    $queryP = "SELECT * FROM `publicrooms` where `id` = '$id'";
                                    $conP = $conexao->query($queryP);
                                        while($dadoP = $conP->fetch_array()) {
                                            $participantes = $dadoP['participantes'];
                                            $participantesless = $participantes + 1;
                                            $queryUPD = "UPDATE `publicrooms` SET `participantes` = '$participantesless' where `id` = '$id'";
                                            $resultUPD = mysqli_query($conexao, $queryUPD);
                                        }

                                    $query2 = "INSERT INTO `$id` (`id`, `user`, `profileimg`, `mensagem`, `tag`, `Admin`, `Banido`, `Cor`, `online`, `digitando`, `saiu`, `incall`, `mic`, `vid`, `ip`, `cidade`, `estado`, `pais`, `dispositivo`) VALUES ('$s', '$nick', '$source', '', '$nick', 'Não', 'Não', '$cor', '0', '0', 'Não', '0', '0', '0', '$ipv', '$cidade', '$estado', '$country', '$useragent');";
                                    $result2 = mysqli_query($conexao, $query2);
                                    $query3 = "INSERT INTO `$id` (`tag`, `anunciado`) VALUES ('$nick', '0');";
                                    $result3 = mysqli_query($conexao, $query3);
                                    setcookie('id', $id, $options_array);
                                } else {
                                    if($country == "Brazil") {
                                        echo ("<div class='erro'>Por favor, preencha o captcha para confirmarmos que você não é um robô.</div>");
                                    } else {
                                        echo ("<div class='erro'>Please fill out the captcha to confirm that you are not a robot.</div>"); 
                                    }
                                }
                            } else {
                                if($country == "Brazil") {
                                echo ("<div class='erro'>Seu nick possui caracteres inválidos. Utiize apenas ['a-Z, 0-9, _, -, @']</div>");
                                } else {
                                    echo ("<div class='erro'>Your nick has invalid characters. Use only ['a-Z, 0-9, _, -, @']</div>");    
                                }
                            }
                        } else {
                            if($country == "Brazil") {
                            echo ("<div class='erro'>Por favor, insira um nick que tenha pelo menos 3 e menos que 16 caracteres.</div>");
                            } else {
                                echo ("<div class='erro'>Please enter a nickname that is at least 3 and less than 16 characters long.</div>");   
                            }
                        }
                    } else {
                        if($country == "Brazil") {
                        echo ("<div class='erro'>Por favor, insira um nick que tenha pelo menos 3 e menos que 16 caracteres.</div>");
                        } else {
                            echo ("<div class='erro'>Please enter a nickname that is at least 3 and less than 16 characters long.</div>");  
                        }
                    }
                } else {
                    if($country == "Brazil") {
                        echo ("<div class='erro'>Esse nick já está em uso nesta sala. Por favor, escolha outro.</div>");
                    } else {
                        echo ("<div class='erro'>That nick is already in use in this room. Please choose another one.</div>");
                    }           
                    }
            } else {
                if($country == "Brazil") {
                    echo ("<div class='erro'>Por favor, insira um nick que tenha pelo menos 3 e menos que 16 caracteres.</div>");
                    } else {
                        echo ("<div class='erro'>Please enter a nickname that is at least 3 and less than 16 characters long.</div>");  
                    }
        }
        } else {
            if($country == "Brazil") {
            echo ("<div class='erro'>Desculpe, mas você foi banido pelo administrador dessa sala.</div>");
            } else {
                echo ("<div class='erro'>Sorry, but you have been banned by the administrator of that room.</div>");     
            }
        }
    } else {
        if($country == "Brazil") {
        echo ("<div class='erro'>Para entrar nessa sala é necessário um link de convite.</div>");
        } else {
            echo ("<div class='erro'>To join in this room, an invitation link is required.</div>");  
        }
    }
}