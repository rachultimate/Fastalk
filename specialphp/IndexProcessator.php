<?php

error_reporting(0);
include('conexao.php');

ini_set('session.cookie_secure', '1');
ini_set('session.cookie_httponly', '1');
ini_set('session.use_only_cookies', '1');
session_start();
require('recaptchalib.php');
$sJ = session_id();

$options_array = array (
    'expires' => time()+60*60*24*30,
    'httponly' => true
);
setcookie('us_uuid', $sJ, $options_array);

if ($_POST["g-recaptcha-response"]) {
    $response = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
}

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

$profileimg = $_COOKIE['profileimg'];

if($profileimg != "") {
    $source = $profileimg;
} else {
    $source = "guest.jpg";
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

setcookie('country', $country);

$querylvc = "SELECT * FROM `livecounter`";
$conlvc = $conexao->query($querylvc);

while($dadolvc = $conlvc->fetch_array()) {
    $users = $dadolvc['result'];
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

    if(isset($_POST['createroom'])) {
        $user = mysqli_real_escape_string($conexao, $_POST['nick']);

$time_md5 = md5(time());
$encryption_value = password_hash($time_md5, PASSWORD_BCRYPT);

$ciphering = "AES-128-CTR"; 
$iv_length = openssl_cipher_iv_length($ciphering); 
$options = 0;
$encryption_iv = '1234567891011121'; 
$encryption_key = "RHrND!g?6sL@u#Z7q=+nxJ%WtM'<vV{dm;Tf93_K2-()~`Y8S&utpZJy;s^!w`}G2jEBeYd~c-7QH.SWRDqkfAhT?@5xX&[N{V>Ubj>q<~;{9mzW?Gvs-KyQpYnhtd(6`a*ZcrTVNf%74^P/J#5SH:pW'S@4937#=mt5N}.6P8jxRK>)ck,nZ%T;s/qGMz{<b~_A]QCfL8vQtJc?!P7(dkpG*@Na{2Heu;/E#qs3Y_6}Xfb.CxW5[mTw]=";  

$token = openssl_encrypt($encryption_value, $ciphering, $encryption_key, $options, $encryption_iv);

if ($response != null && $response->success) {
    if (!empty($user)) {
        if (strlen($user) > 1) {
            if (strlen($user) < 16) {
                if (!preg_match("/[^A-Za-z0-9_-àèìòùãñõâêîôû @]/", $user)) {
                    session_start();

                    $s = $_COOKIE['us_uuid'];

                    $codigo = substr(strtoupper(md5(uniqid(mt_rand(), true))) , 0, 5);
                    $queryV = "SELECT * FROM `$codigo`";
                    $conV = mysqli_query($conexao, $queryV);
                    $rowV = mysqli_num_rows($conV);
                    $pwd = md5(time());
                    if ($rowV == 0) {
                    $query1 = "CREATE TABLE `$codigo` ( `id` TEXT NULL , `profileimg` TEXT NULL , `sendid` BIGINT NOT NULL AUTO_INCREMENT, PRIMARY KEY (`sendid`) , `user` TEXT NULL , `tag` TEXT NULL , `mensagem` TEXT NULL , `img` TEXT NULL , `video` TEXT NULL , `file` TEXT NULL , `filename` TEXT NULL , `horario` TEXT NULL , `data` TEXT NULL , `Admin` TEXT NULL , `Banido` TEXT NULL , `Cor` TEXT NULL , `online` TEXT NULL , `digitando` TEXT NULL , `anunciado` TEXT NULL , `saiu` TEXT NULL , `apenasadmins` TEXT NULL , `pwd` TEXT NULL , `pwdrequired` TEXT NULL , `token` TEXT NULL , `incall` TEXT NULL , `mic` TEXT NULL , `vid` TEXT NULL , `estafalando` TEXT NULL , `salapublica` TEXT NULL , `ip` TEXT NULL , `cidade` TEXT NULL , `estado` TEXT NULL , `pais` TEXT NULL , `dispositivo` TEXT NULL)";
                    $result1 = mysqli_query($conexao, $query1);

                    $cor = random_int(1, 8);

                    $query2 = "INSERT INTO `$codigo` (`id`, `user`, `mensagem`, `profileimg`, `img`, `video`, `file`, `filename`, `tag`, `horario`, `data`, `Admin`, `Banido`, `Cor`, `online`, `digitando`, `anunciado`, `saiu`, `apenasadmins`, `pwd`, `pwdrequired`, `token`, `incall`, `mic`, `vid`, `estafalando`, `salapublica`, `ip`, `cidade`, `estado`, `pais`, `dispositivo`) VALUES ('$s', '$user', '', '$source', '', '', '', '', '$user', '', '', 'Sim', 'Não', '$cor', '0', '0', '1', 'Não', 'Não', '$pwd', '0', '$token', '0', '0', '0', '0', '0', '$ipv', '$cidade', '$estado', '$country', '$useragent');";
                    $result2 = mysqli_query($conexao, $query2);

                    echo ("<script> location.href='sala.php?id=$codigo'</script>");
                    } else {
                        while ($rowV != 0) {
                            $codigo = substr(strtoupper(md5(uniqid(mt_rand(), true))) , 0, 5); 
                            $queryV = "SELECT * FROM `$codigo`";
                            $conV = mysqli_query($conexao, $queryV);
                            $rowV = mysqli_num_rows($conV);       
                        }
                        $query1 = "CREATE TABLE `$codigo` ( `id` TEXT NULL , `profileimg` TEXT NULL , `sendid` BIGINT NOT NULL AUTO_INCREMENT, PRIMARY KEY (`sendid`) , `user` TEXT NULL , `tag` TEXT NULL , `mensagem` TEXT NULL , `img` TEXT NULL , `video` TEXT NULL , `file` TEXT NULL , `filename` TEXT NULL , `horario` TEXT NULL , `data` TEXT NULL , `Admin` TEXT NULL , `Banido` TEXT NULL , `Cor` TEXT NULL , `online` TEXT NULL , `digitando` TEXT NULL , `anunciado` TEXT NULL , `saiu` TEXT NULL , `apenasadmins` TEXT NULL , `pwd` TEXT NULL , `pwdrequired` TEXT NULL , `token` TEXT NULL , `incall` TEXT NULL , `mic` TEXT NULL , `vid` TEXT NULL , `estafalando` TEXT NULL , `salapublica` TEXT NULL , `ip` TEXT NULL , `cidade` TEXT NULL , `estado` TEXT NULL , `pais` TEXT NULL , `dispositivo` TEXT NULL)";
                        $result1 = mysqli_query($conexao, $query1);
    
                        $cor = random_int(1, 8);
    
                        $query2 = "INSERT INTO `$codigo` (`id`, `user`, `mensagem`, `profileimg`, `img`, `video`, `file`, `filename`, `tag`, `horario`, `data`, `Admin`, `Banido`, `Cor`, `online`, `digitando`, `anunciado`, `saiu`, `apenasadmins`, `pwd`, `pwdrequired`, `token`, `incall`, `mic`, `vid`, `estafalando`, `salapublica`, `ip`, `cidade`, `estado`, `pais`, `dispositivo`) VALUES ('$s', '$user', '', '$source', '', '', '', '', '$user', '', '', 'Sim', 'Não', '$cor', '0', '0', '1', 'Não', 'Não', '$pwd', '0', '$token', '0', '0', '0', '0', '0', '$ipv', '$cidade', '$estado', '$country', '$useragent');";
                        $result2 = mysqli_query($conexao, $query2);
    
                        echo ("<script> location.href='sala.php?id=$codigo'</script>"); 
                    } 
                } else {
                    echo ("<script> location.href='erro3.php' </script>");
                }
            } else {
                echo ("<script> location.href='erro2.php' </script>");
            }
        } else {
            echo ("<script> location.href='erro2.php' </script>");
        }
    } else {
        echo ("<script> location.href='erro1.php' </script>");
    }
} else {
    echo ("<script> location.href='erro6.php' </script>");
}
    }

    if(isset($_POST['createroom_mobile'])) {
            $user = mysqli_real_escape_string($conexao, $_POST['nick']);
            $user = mysqli_real_escape_string($conexao, $_POST['nick']);
    
    $time_md5 = md5(time());
    $encryption_value = password_hash($time_md5, PASSWORD_BCRYPT);
    
    $ciphering = "AES-128-CTR"; 
    $iv_length = openssl_cipher_iv_length($ciphering); 
    $options = 0;
    $encryption_iv = '1234567891011121'; 
    $encryption_key = "RHrND!g?6sL@u#Z7q=+nxJ%WtM'<vV{dm;Tf93_K2-()~`Y8S&utpZJy;s^!w`}G2jEBeYd~c-7QH.SWRDqkfAhT?@5xX&[N{V>Ubj>q<~;{9mzW?Gvs-KyQpYnhtd(6`a*ZcrTVNf%74^P/J#5SH:pW'S@4937#=mt5N}.6P8jxRK>)ck,nZ%T;s/qGMz{<b~_A]QCfL8vQtJc?!P7(dkpG*@Na{2Heu;/E#qs3Y_6}Xfb.CxW5[mTw]=";  
    
    $token = openssl_encrypt($encryption_value, $ciphering, $encryption_key, $options, $encryption_iv);
    
    if ($response != null && $response->success) {
        if (!empty($user)) {
            if (strlen($user) > 1) {
                if (strlen($user) < 16) {
                    if (!preg_match("/[^A-Za-z0-9_-àèìòùãñõâêîôû @]/", $user)) {
                        session_start();
    
                        $s = session_id();
    
                        $codigo = substr(strtoupper(md5(uniqid(mt_rand(), true))) , 0, 5);
                        $queryV = "SELECT * FROM `$codigo`";
                        $conV = mysqli_query($conexao, $queryV);
                        $rowV = mysqli_num_rows($conV);
                        $pwd = md5(time());

                        
                        if ($rowV == 0) {
                            $query1 = "CREATE TABLE `$codigo` ( `id` TEXT NULL , `profileimg` TEXT NULL , `sendid` BIGINT NOT NULL AUTO_INCREMENT, PRIMARY KEY (`sendid`) , `user` TEXT NULL , `tag` TEXT NULL , `mensagem` TEXT NULL , `img` TEXT NULL , `video` TEXT NULL , `file` TEXT NULL , `filename` TEXT NULL , `horario` TEXT NULL , `data` TEXT NULL , `Admin` TEXT NULL , `Banido` TEXT NULL , `Cor` TEXT NULL , `online` TEXT NULL , `digitando` TEXT NULL , `anunciado` TEXT NULL , `saiu` TEXT NULL , `apenasadmins` TEXT NULL , `pwd` TEXT NULL , `pwdrequired` TEXT NULL , `token` TEXT NULL , `incall` TEXT NULL , `mic` TEXT NULL , `vid` TEXT NULL , `estafalando` TEXT NULL , `salapublica` TEXT NULL , `ip` TEXT NULL , `cidade` TEXT NULL , `estado` TEXT NULL , `pais` TEXT NULL , `dispositivo` TEXT NULL)";
                        $result1 = mysqli_query($conexao, $query1);
    
                        $cor = random_int(1, 8);
    
                        $query2 = "INSERT INTO `$codigo` (`id`, `user`, `mensagem`, `profileimg`, `img`, `video`, `file`, `filename`, `tag`, `horario`, `data`, `Admin`, `Banido`, `Cor`, `online`, `digitando`, `anunciado`, `saiu`, `apenasadmins`, `pwd`, `pwdrequired`, `token`, `incall`, `mic`, `vid`, `estafalando`, `salapublica`, `ip`, `cidade`, `estado`, `pais`, `dispositivo`) VALUES ('$s', '$user', '', '$source', '', '', '', '', '$user', '', '', 'Sim', 'Não', '$cor', '0', '0', '1', 'Não', 'Não', '$pwd', '0', '$token', '0', '0', '0', '0', '0', '$ipv', '$cidade', '$estado', '$country', '$useragent');";
                        $result2 = mysqli_query($conexao, $query2);
    
                        echo ("<script> location.href='sala.php?id=$codigo'</script>");
                        } else {
                            while ($rowV != 0) {
                                $codigo = substr(strtoupper(md5(uniqid(mt_rand(), true))) , 0, 5); 
                                $queryV = "SELECT * FROM `$codigo`";
                                $conV = mysqli_query($conexao, $queryV);
                                $rowV = mysqli_num_rows($conV);       
                            }
                            $query1 = "CREATE TABLE `$codigo` ( `id` TEXT NULL , `profileimg` TEXT NULL , `sendid` BIGINT NOT NULL AUTO_INCREMENT, PRIMARY KEY (`sendid`) , `user` TEXT NULL , `tag` TEXT NULL , `mensagem` TEXT NULL , `img` TEXT NULL , `video` TEXT NULL , `file` TEXT NULL , `filename` TEXT NULL , `horario` TEXT NULL , `data` TEXT NULL , `Admin` TEXT NULL , `Banido` TEXT NULL , `Cor` TEXT NULL , `online` TEXT NULL , `digitando` TEXT NULL , `anunciado` TEXT NULL , `saiu` TEXT NULL , `apenasadmins` TEXT NULL , `pwd` TEXT NULL , `pwdrequired` TEXT NULL , `token` TEXT NULL , `incall` TEXT NULL , `mic` TEXT NULL , `vid` TEXT NULL , `estafalando` TEXT NULL , `salapublica` TEXT NULL , `ip` TEXT NULL , `cidade` TEXT NULL , `estado` TEXT NULL , `pais` TEXT NULL , `dispositivo` TEXT NULL)";
                            $result1 = mysqli_query($conexao, $query1);
        
                            $cor = random_int(1, 8);
        
                            $query2 = "INSERT INTO `$codigo` (`id`, `user`, `mensagem`, `profileimg`, `img`, `video`, `file`, `filename`, `tag`, `horario`, `data`, `Admin`, `Banido`, `Cor`, `online`, `digitando`, `anunciado`, `saiu`, `apenasadmins`, `pwd`, `pwdrequired`, `token`, `incall`, `mic`, `vid`, `estafalando`, `salapublica`, `ip`, `cidade`, `estado`, `pais`, `dispositivo`) VALUES ('$s', '$user', '', '$source', '', '', '', '', '$user', '', '', 'Sim', 'Não', '$cor', '0', '0', '1', 'Não', 'Não', '$pwd', '0', '$token', '0', '0', '0', '0', '0', '$ipv', '$cidade', '$estado', '$country', '$useragent');";
                            $result2 = mysqli_query($conexao, $query2);
        
                            echo ("<script> location.href='sala.php?id=$codigo'</script>"); 
                        } 
                    } else {
                        if($country == "Brazil") {
                        echo ("<script> alert('Erro: Seu nick possui caracteres inválidos') </script>");
                        } else {
                            echo ("<script> alert('Error: Your name/nick has invalid characters.') </script>");
                        }
                    }
                } else {
                    if($country == "Brazil") {
                        echo ("<script> alert('Erro: Por favor, insira um nome/nick que tenha de 2 à 16 caracteres') </script>");
                    } else  {
                        echo ("<script> alert('Error: Please enter a name/nick that is between 2 to 16 characters long.') </script>");
                    }
                }
            } else {
                if($country == "Brazil") {
                    echo ("<script> alert('Erro: Por favor, insira um nome/nick que tenha de 2 à 16 caracteres') </script>");
                } else  {
                    echo ("<script> alert('Error: Please enter a name/nick that is between 2 to 16 characters long.') </script>");
                }
            }
        } else {
            if($country == "Brazil") {
                echo ("<script> alert('Erro: Por favor, insira um nome/nick para criar uma sala') </script>");
            } else  {
                echo ("<script> alert('Error: Please, insert a name or nick to create a room') </script>");
            }
        }
    } else {
        if($country == "Brazil") {
            echo ("<script> window.alert('Erro: Por favor, preencha o captcha para criar uma sala') </script>");
        } else  {
            echo ("<script> window.alert('Error: Please, fill the captcha to create a room') </script>");
        }
    }
}


if(isset($_POST['mobile_btn_join'])) {
    $roomid = mysqli_real_escape_string($conexao, $_POST['mobile_input_join']);

    if($roomid != "") {
        $queryCheckR = "SELECT * FROM `$roomid`";
        $conCheckR = mysqli_query($conexao, $queryCheckR);
        $rowCheckR = mysqli_num_rows($conCheckR);

        if($rowCheckR != 0) {
            echo ("<script> location.href='entrar.php?id=$roomid' </script>");
        } else {
            if($country == "Brazil") {
            echo ("<script> alert('ID de Sala inválido') </script>");
            } else {
            echo ("<script> alert('Invalid Room ID') </script>");   
            }
        }
    }
}

if(isset($_POST['send'])) {
    $roomid = mysqli_real_escape_string($conexao, $_POST['join']);

    if($roomid != "") {
        $queryCheckR = "SELECT * FROM `$roomid`";
        $conCheckR = mysqli_query($conexao, $queryCheckR);
        $rowCheckR = mysqli_num_rows($conCheckR);

        if($rowCheckR != 0) {
            header("Location: entrar.php?id=$roomid");
        } else {
            header("Location: erro4.php");
        }
    }
}

$filepost = $_FILES['profile-file']['name'];

if($filepost != "") {
    $filenamePH = $_FILES['profile-file']['name'];
    $fileTmpNamePH = $_FILES['profile-file']['tmp_name'];
    $filetypePH = $_FILES['profile-file']['type'];
    $filesizePH = $_FILES['profile-file']['size'];

    if($filetypePH == "image/png" || $filetypePH == "image/jpg" || $filetypePH == "image/jpeg" || $filetypePH == "image/gif") {
        if($filesizePH < 31000000) {
            $fileExtPH = explode('.', $filenamePH);
            $fileActualExtPH = strtolower(end($fileExtPH));
            $fileNameNewPH = uniqid('', true).".".$fileActualExtPH;
            $fileDestinationPH = 'midia/'.$fileNameNewPH;
            
            if(move_uploaded_file($fileTmpNamePH, $fileDestinationPH)) {
                setcookie('profileimg', $fileNameNewPH, $options_array);
                header("Refresh:0");
            } else {
                echo ("<script> window.alert('Desculpe, mas ocorreu um erro ao tentar enviar seu arquivo. Por favor, tente de novo.') </script>");
            }
        } else {
            echo ("<script> window.alert('Por favor, envie um arquivo que tenha no máximo 30 MB') </script>");
        }
    } else {
        echo ("<script> window.alert('Por favor, envie arquivos que sejam apenas em JPG, PNG, JPEG e GIF') </script>");
    }
}
