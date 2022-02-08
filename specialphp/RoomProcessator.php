<?php

error_reporting(0);

ini_set('session.cookie_secure', '1');
ini_set('session.cookie_httponly', '1');
ini_set('session.use_only_cookies', '1');
session_start();
$s = session_id();

$options_array = array (
    'expires' => time()+60*60*24*30,
    'httponly' => true
);
setcookie('us_uuid', $s, $options_array);
setcookie('PHPSESSID', $s, $options_array);
session_set_cookie_params('PHPSESSID', $s, $options_array);

$sC = $_COOKIE['us_uuid'];
$st = session_status();

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

$id = $_GET['id'];
setcookie("id", $id, $options_array);

$query = "SELECT * FROM `$id`";
$result = mysqli_query($conexao, $query);
$row = mysqli_num_rows($result);

$queryJ = "SELECT * FROM `$id` where `id` = '$s' and `Banido` = 'Não'";
$resultJ =  mysqli_query($conexao, $queryJ);
$rowJ = mysqli_num_rows($resultJ);


$queryVERIFY = "SELECT * FROM `$id` where `id` = '$s' and `Admin` = 'Sim'";
$conVERIFY = mysqli_query($conexao, $queryVERIFY);
$rowVERIFY = mysqli_num_rows($conVERIFY);

$queryVERbot = "SELECT * FROM `$id` where `id` = 'BOT'";
$resultVERbot = mysqli_query($conexao, $queryVERbot);
$rowVERbot = mysqli_num_rows($resultVERbot);
if($rowVERbot == 0) {
    $queryBOT1 = "INSERT INTO `$id` (`id`, `user`, `profileimg`, `mensagem`, `tag`, `Admin`, `Banido`, `Cor`, `online`, `digitando`, `saiu`, `incall`, `mic`, `vid`) VALUES ('BOT', 'Helpy', 'bot-guest.jpg', '', 'Helpy', 'Não', 'Não', '6', '0', '0', 'Não', '0', '0', '0');";
    $resultBOT1 = mysqli_query($conexao, $queryBOT1);

    $queryENC = "SELECT * FROM `$id` where `Admin` = 'Sim'";
    $conENC = $conexao->query($queryENC);

    if($country == "Brazil") {
        $mensagemBOT = "Olá, eu sou o Helpy, o BOT do Fastalk. Eu estou aqui pra te ajudar a usar e configurar sua sala. <br> <br> Se esse é seu primeiro acesso ao site ou você ainda não sabe como utilizar o Fastalk, digite o comando '/help' no chat. <br> <br> Se você nem sabe o que é o Fastalk, digite o comando '/info'. <br> <br> Você também pode digitar o comando '/commands' para ver uma lista de comandos que você pode usar. <br> <br> Se você quer deletar essa mensagem, use o comando: '/cleanchat'. <br> <strong>Obrigado por usar o Fastalk</strong>";
    } else {
        $mensagemBOT = "Hey, I'm Helpy, the Fastalk BOT. I'm here to help you to use and configure your Room. <br> <br> If this is your first access to the website or you don't know how to use Fastalk yet, type the command '/help' on the chat. <br> <br> If you don't know what is Fastalk, type the command '/info' on the chat. <br> <br> You can also type the command '/commands' to see a list of all the commands you can use. <br> <br> If you want to delete this message, type the command: '/cleanchat'. <br> <strong>Thank you for using Fastalk</strong>";
    }

    while($dadoENC = $conENC->fetch_array()) {
        $ciphering = "AES-128-CTR"; 
        $iv_length = openssl_cipher_iv_length($ciphering); 
        $options = 0;
    
        $encryption_iv_code = '1234567891011121'; 
        $encryption_key_token = "RHrND!g?6sL@u#Z7q=+nxJ%WtM'<vV{dm;Tf93_K2-()~`Y8S&utpZJy;s^!w`}G2jEBeYd~c-7QH.SWRDqkfAhT?@5xX&[N{V>Ubj>q<~;{9mzW?Gvs-KyQpYnhtd(6`a*ZcrTVNf%74^P/J#5SH:pW'S@4937#=mt5N}.6P8jxRK>)ck,nZ%T;s/qGMz{<b~_A]QCfL8vQtJc?!P7(dkpG*@Na{2Heu;/E#qs3Y_6}Xfb.CxW5[mTw]="; 
        $encrypted_token = openssl_encrypt($mensagemBOT, $ciphering, $encryption_key_token, $options, $encryption_iv_code);

        $encryption_iv = '1234567891011121'; 
        $encryption_key = $dadoENC['token'];  
        $mensagemencBOT = openssl_encrypt($encrypted_token, $ciphering, $encryption_key, $options, $encryption_iv);
    
        $horario = date("H:i"); $data = date("Y/m/d");
    }
    $sql = $pdo->query("INSERT INTO `$id` (`tag`, `profileimg`, `mensagem`, `horario`, `data`, `Cor`) VALUES ('Helpy', 'bot-guest.jpg', '$mensagemencBOT', '$horario', '$data', '4')");
}

$filepost = $_FILES['imgchanger']['name'];

        if($filepost != "") {
            $filenamePH = $_FILES['imgchanger']['name'];
            $fileTmpNamePH = $_FILES['imgchanger']['tmp_name'];
            $filetypePH = $_FILES['imgchanger']['type'];
            $filesizePH = $_FILES['imgchanger']['size'];

            if($filetypePH == "image/png" || $filetypePH == "image/jpg" || $filetypePH == "image/jpeg" || $filetypePH == "image/gif") {
                if($filesizePH < 31000000) {
                    $fileExtPH = explode('.', $filenamePH);
                    $fileActualExtPH = strtolower(end($fileExtPH));
                    $fileNameNewPH = uniqid('', true).".".$fileActualExtPH;
                    $fileDestinationPH = 'midia/'.$fileNameNewPH;
                    
                    if(move_uploaded_file($fileTmpNamePH, $fileDestinationPH)) {
                        if($country == "Brazil") {
                        echo ("<script> alert('Foto de perfil alterada com sucesso.') </script>");
                        } else {
                            echo ("<script> alert('Profile picture successfully changed.') </script>");    
                        }
                        $sqlPRF = "UPDATE `$id` SET `profileimg` = '$fileNameNewPH' where `id` = '$s'";
                        $conPRF = mysqli_query($conexao, $sqlPRF);
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

if ($rowJ == 0) {
    echo ("<script> location.href='entrar.php?id=$id' </script>");
    setcookie("id", "", $options_array);
}

if ($row == 0) {
    echo ("<script> location.href='erro4.php' </script>");
}

$query6 = "SELECT * from `$id` WHERE `id` = '$s'";
$con5 = $conexao->query($query6) or die($mysqli->error);

while ($dado6 = $con5->fetch_array()) {
    $tag = $dado6['tag'];
}

$mensagem = $_POST['mensagem'];

$queryAccess = "SELECT * FROM `$id` where `id` = '$s'";
$conAccess = $conexao->query($queryAccess) or die($mysqli->error);
while ($dadoAccess = $conAccess->fetch_array()) {
    $imgIN = $dadoAccess['profileimg'];
    $cor = $dadoAccess['Cor'];
    $nickUser = $dadoAccess['user'];
}

$queryVERmsg = "SELECT * FROM `$id` where `apenasadmins` = 'Sim'";
$resultVERmsg = mysqli_query($conexao, $queryVERmsg);
$rowVERmsg = mysqli_num_rows($resultVERmsg);

if ($mensagem != "") {
    if($rowVERmsg != 0) {
        if($rowVERIFY == 1) {
            $queryENC = "SELECT * FROM `$id` where `Admin` = 'Sim'";
            $conENC = $conexao->query($queryENC);

            while($dadoENC = $conENC->fetch_array()) {
                $ciphering = "AES-128-CTR"; 
                $iv_length = openssl_cipher_iv_length($ciphering); 
                $options = 0;
            
                $encryption_iv_code = '1234567891011121'; 
                $encryption_key_token = "RHrND!g?6sL@u#Z7q=+nxJ%WtM'<vV{dm;Tf93_K2-()~`Y8S&utpZJy;s^!w`}G2jEBeYd~c-7QH.SWRDqkfAhT?@5xX&[N{V>Ubj>q<~;{9mzW?Gvs-KyQpYnhtd(6`a*ZcrTVNf%74^P/J#5SH:pW'S@4937#=mt5N}.6P8jxRK>)ck,nZ%T;s/qGMz{<b~_A]QCfL8vQtJc?!P7(dkpG*@Na{2Heu;/E#qs3Y_6}Xfb.CxW5[mTw]="; 
                $encrypted_token = openssl_encrypt($mensagem, $ciphering, $encryption_key_token, $options, $encryption_iv_code);

                $encryption_iv = '1234567891011121'; 
                $encryption_key = $dadoENC['token'];  
                $mensagemenc = openssl_encrypt($encrypted_token, $ciphering, $encryption_key, $options, $encryption_iv);
            
                $horario = date("H:i"); $data = date("Y/m/d");
            }
            $sql = $pdo->query("INSERT INTO `$id` (`tag`, `profileimg`, `mensagem`, `horario`, `data`, `Cor`, `ip`, `cidade`, `estado`, `pais`, `dispositivo`) VALUES ('$tag', '$imgIN', '$mensagemenc', '$horario', '$data', '$cor', '$ipv', '$cidade', '$estado', '$country', '$useragent')");  
        } else {
        echo ("<script> window.alert('Apenas ADMINISTRADORES da sala podem falar no chat.') </script>");
    }
} else {
    $queryENC = "SELECT * FROM `$id` where `Admin` = 'Sim'";
    $conENC = $conexao->query($queryENC);

    while($dadoENC = $conENC->fetch_array()) {
    $ciphering = "AES-128-CTR"; 
    $iv_length = openssl_cipher_iv_length($ciphering); 
    $options = 0;

    $encryption_iv_code = '1234567891011121'; 
    $encryption_key_token = "RHrND!g?6sL@u#Z7q=+nxJ%WtM'<vV{dm;Tf93_K2-()~`Y8S&utpZJy;s^!w`}G2jEBeYd~c-7QH.SWRDqkfAhT?@5xX&[N{V>Ubj>q<~;{9mzW?Gvs-KyQpYnhtd(6`a*ZcrTVNf%74^P/J#5SH:pW'S@4937#=mt5N}.6P8jxRK>)ck,nZ%T;s/qGMz{<b~_A]QCfL8vQtJc?!P7(dkpG*@Na{2Heu;/E#qs3Y_6}Xfb.CxW5[mTw]="; 
    $encrypted_token = openssl_encrypt($mensagem, $ciphering, $encryption_key_token, $options, $encryption_iv_code);

    $encryption_iv = '1234567891011121'; 
    $encryption_key = $dadoENC['token'];  
    $mensagemenc = openssl_encrypt($encrypted_token, $ciphering, $encryption_key, $options, $encryption_iv);

    $horario = date("H:i"); $data = date("Y/m/d");
    }
    $sql = $pdo->query("INSERT INTO `$id` (`tag`, `profileimg`, `mensagem`, `horario`, `data`, `Cor`, `ip`, `cidade`, `estado`, `pais`, `dispositivo`) VALUES ('$tag', '$imgIN', '$mensagemenc', '$horario', '$data', '$cor', '$ipv', '$cidade', '$estado', '$country', '$useragent')");
    }
        if($mensagem == "/cleanchat" || $mensagem == "/clear" || $mensagem == "/limparchat" || $mensagem == "/clean") {
            if($rowVERIFY == 1) {
            $querycl = "UPDATE `$id` SET `mensagem` = '' WHERE `mensagem` != ''";
            $concl = mysqli_query($conexao, $querycl);
        
            $querycl2 = "UPDATE `$id` SET `img` = '' WHERE `img` != ''";
            $concl2 = mysqli_query($conexao, $querycl2);
        
            $querycl3 = "UPDATE `$id` SET `video` = '' WHERE `video` != ''";
            $concl3 = mysqli_query($conexao, $querycl3);

            $querycl4 = "UPDATE `$id` SET `file` = '' WHERE `file` != ''";
            $concl4 = mysqli_query($conexao, $querycl4);
        
            $queryANI = "UPDATE `$id` SET `anunciado` = '1' where `anunciado` = '0'";
            $resultANI = mysqli_query($conexao, $queryANI);
            } else {
                if($rowVERmsg == 0) {
                    if($country == "Brazil") {
                        $replyBOT = "❌ Erro: Apenas administradores podem executar esse comando.";            
                    } else {
                        $replyBOT = "❌ Error: Only room administrators can execute this command.";
                    }
                    $queryENC = "SELECT * FROM `$id` where `Admin` = 'Sim'";
                    $conENC = $conexao->query($queryENC);
            
                    while($dadoENC = $conENC->fetch_array()) {
                    $ciphering = "AES-128-CTR"; 
                    $iv_length = openssl_cipher_iv_length($ciphering); 
                    $options = 0;
            
                    $encryption_iv_code = '1234567891011121'; 
                    $encryption_key_token = "RHrND!g?6sL@u#Z7q=+nxJ%WtM'<vV{dm;Tf93_K2-()~`Y8S&utpZJy;s^!w`}G2jEBeYd~c-7QH.SWRDqkfAhT?@5xX&[N{V>Ubj>q<~;{9mzW?Gvs-KyQpYnhtd(6`a*ZcrTVNf%74^P/J#5SH:pW'S@4937#=mt5N}.6P8jxRK>)ck,nZ%T;s/qGMz{<b~_A]QCfL8vQtJc?!P7(dkpG*@Na{2Heu;/E#qs3Y_6}Xfb.CxW5[mTw]="; 
                    $encrypted_token = openssl_encrypt($replyBOT, $ciphering, $encryption_key_token, $options, $encryption_iv_code);
            
                    $encryption_iv = '1234567891011121'; 
                    $encryption_key = $dadoENC['token'];  
                    $replyBOTenc = openssl_encrypt($encrypted_token, $ciphering, $encryption_key, $options, $encryption_iv);
                    }
            
                    $sql = $pdo->query("INSERT INTO `$id` (`tag`, `profileimg`, `mensagem`, `horario`, `data`, `Cor`) VALUES ('Helpy', 'bot-guest.jpg', '$replyBOTenc', '$horario', '$data', '4')");  
                }
        }
    } 
    if ($mensagem == "/help") {
        if($country == "Brazil") {
            $replyBOT = "<strong>AJUDA</strong> <br> Para acessar as configurações da sala, clique no ícone com 3 riscos no canto superior direito. <br> <br> Para ver uma lista de todos os comandos, utilize o comando '/commands'. <br> <br> Para iniciar uma chamada de voz/vídeo, clique no ícone 'Ligar' no lado inferior direito do chat. <br> <br> Para enviar um arquivo, arraste-o até aqui ou clique no ícone 'Enviar arquivo'. <br> <br> Para mudar sua foto de perfil, clique no ícone 'Mudar foto de perfil' no canto inferior direito no chat.";            
        } else {
            $replyBOT = "<strong>HELP</strong> <br> To access the room settings, click on the icon with 3 streaks in the upper right corner. <br> <br> To see a list of all the commands, use the command '/commands'. <br> <br> To initiate a voice / video call, click on the 'Call' icon at the bottom right of the chat. <br> <br> To send a file, drag it here or click on the 'Send file' icon. <br> <br> To change your profile photo, click on the 'Change profile photo' icon in the lower right corner in the chat.";
        }
        $queryENC = "SELECT * FROM `$id` where `Admin` = 'Sim'";
        $conENC = $conexao->query($queryENC);

        while($dadoENC = $conENC->fetch_array()) {
        $ciphering = "AES-128-CTR"; 
        $iv_length = openssl_cipher_iv_length($ciphering); 
        $options = 0;

        $encryption_iv_code = '1234567891011121'; 
        $encryption_key_token = "RHrND!g?6sL@u#Z7q=+nxJ%WtM'<vV{dm;Tf93_K2-()~`Y8S&utpZJy;s^!w`}G2jEBeYd~c-7QH.SWRDqkfAhT?@5xX&[N{V>Ubj>q<~;{9mzW?Gvs-KyQpYnhtd(6`a*ZcrTVNf%74^P/J#5SH:pW'S@4937#=mt5N}.6P8jxRK>)ck,nZ%T;s/qGMz{<b~_A]QCfL8vQtJc?!P7(dkpG*@Na{2Heu;/E#qs3Y_6}Xfb.CxW5[mTw]="; 
        $encrypted_token = openssl_encrypt($replyBOT, $ciphering, $encryption_key_token, $options, $encryption_iv_code);

        $encryption_iv = '1234567891011121'; 
        $encryption_key = $dadoENC['token'];  
        $replyBOTenc = openssl_encrypt($encrypted_token, $ciphering, $encryption_key, $options, $encryption_iv);
        }

        $sql = $pdo->query("INSERT INTO `$id` (`tag`, `profileimg`, `mensagem`, `horario`, `data`, `Cor`) VALUES ('Helpy', 'bot-guest.jpg', '$replyBOTenc', '$horario', '$data', '4')");
    }
    if ($mensagem == "/commands") {
        if($country == "Brazil") {
            $replyBOT = "<strong>COMANDOS</strong> <br> <span style='font-family: Arial; -family: Arial; color: red'><strong>/ban [nick]</strong></span> = Bane um usuário <br> <span style='font-family: Arial; -family: Arial; color: orange'><strong>/cleanchat</strong></span> = Limpa o chat <br> <span style='font-family: Arial; -family: Arial; color: forestgreen;'><strong>/help</strong></span> = Mostra uma mensagem de ajuda sobre como usar o Fastalk <br> <span style='font-family: Arial; -family: Arial; color: darkcyan;'><strong>/info</strong></span> = Explica o que é o Fastalk";            
        } else {
            $replyBOT = "<strong>COMMANDS</strong> <br> <span style='font-family: Arial; -family: Arial; color: red'><strong>/ban [nick]</strong></span> = Ban an user. <br> <span style='font-family: Arial; color: orange'><strong>/cleanchat</strong></span> = Clean the chat <br> <span style='font-family: Arial; -family: Arial; color: forestgreen;'><strong>/help</strong></span> = Show a help message explaining how to use Fastalk <br> <span style='font-family: Arial; color: darkcyan;'><strong>/info</strong></span> = Explain what is Fastalk";            
        }
        $queryENC = "SELECT * FROM `$id` where `Admin` = 'Sim'";
        $conENC = $conexao->query($queryENC);

        while($dadoENC = $conENC->fetch_array()) {
        $ciphering = "AES-128-CTR"; 
        $iv_length = openssl_cipher_iv_length($ciphering); 
        $options = 0;

        $encryption_iv_code = '1234567891011121'; 
        $encryption_key_token = "RHrND!g?6sL@u#Z7q=+nxJ%WtM'<vV{dm;Tf93_K2-()~`Y8S&utpZJy;s^!w`}G2jEBeYd~c-7QH.SWRDqkfAhT?@5xX&[N{V>Ubj>q<~;{9mzW?Gvs-KyQpYnhtd(6`a*ZcrTVNf%74^P/J#5SH:pW'S@4937#=mt5N}.6P8jxRK>)ck,nZ%T;s/qGMz{<b~_A]QCfL8vQtJc?!P7(dkpG*@Na{2Heu;/E#qs3Y_6}Xfb.CxW5[mTw]="; 
        $encrypted_token = openssl_encrypt($replyBOT, $ciphering, $encryption_key_token, $options, $encryption_iv_code);

        $encryption_iv = '1234567891011121'; 
        $encryption_key = $dadoENC['token'];  
        $replyBOTenc = openssl_encrypt($encrypted_token, $ciphering, $encryption_key, $options, $encryption_iv);
        }

        $sql = $pdo->query("INSERT INTO `$id` (`tag`, `profileimg`, `mensagem`, `horario`, `data`, `Cor`) VALUES ('Helpy', 'bot-guest.jpg', '$replyBOTenc', '$horario', '$data', '4')");
    }
    if ($mensagem == "/info") {
        if($country == "Brazil") {
            $replyBOT = "<strong>INFO</strong> <br> O Fastalk é um sistema de chat rápido e 100% anônimo, que funciona por meio de criação de salas. Essas salas podem ser privadas ou públicas (que permite com que sua sala apareça na aba Salas Públicas, e qualquer um pode entrar). O objetivo do Fastalk é fazer com que você converse com alguém que já conheça ou com pessoas que você acabou de conhecer de forma privada, 100% anônima e extremamente rápida e simples. As mensagens que você envia são criptografadas duas vezes com tokens diferentes que se alteram a todo instante para impedir que hackers interceptem sua conversa. O Fastalk foi fundado por 3 garotos brasileiros (<span style='color: darkcyan'><a target='_blank' style='color: darkcyan; font-family: Arial; text-decoration: none;' href='https://twitter.com/pedro0_ferreira'>@pedro0_ferreira</a></span>, <span style='color: orange'><a target='_blank' style='color: orange; font-family: Arial; text-decoration: none;' href='https://www.instagram.com/rafaelrzin/'>@rafaelrzin</a></span> e <span style='color: orange'><a target='_blank' style='color: orange; font-family: Arial; text-decoration: none;' href='https://www.instagram.com/gabriel_17pk/'>@gabriel_17pk</a></span> ) no dia 03/01/2021, porém só foi lançado oficialmente em 15/05/2021 e atualmente conta com mais de mil usuários ativos.";            
        } else {
            $replyBOT = "<strong> INFO </strong> <br> Fastalk is a fast and 100% anonymous chat system, which works by creating rooms. These rooms can be private or public (which allows your room to appear in the Public Rooms tab, and anyone can join on it). The goal of Fastalk is to get you to chat with someone you already know or with people you just met privately, 100% anonymously and extremely fast and simple. The messages you send are encrypted twice with different tokens that change all the time to prevent hackers from intercepting your conversation. Fastalk was founded by 3 Brazilian boys (<span style = 'color: darkcyan'> <a target='_blank' style='color: darkcyan; font-family: Arial; text-decoration: none;' href='https://twitter.com/pedro0_ferreira'> @pedro0_ferreira </a> </span> , <span style = 'color: orange'> <a target='_blank' style='color: orange; font-family: Arial; text-decoration: none;' href='https://www.instagram.com/rafaelrzin/'> @rafaelrzin </a> </span> and <span style = 'color: orange'> <a target='_blank' style='color: orange; font-family: Arial; text-decoration: none;' href='https://www.instagram.com/gabriel_17pk/'> @ gabriel_17pk </a> </span>) on 1/3/2021, however it was only officially released on 05/15/2021 and currently has over a thousand active users.";            
        }
        $queryENC = "SELECT * FROM `$id` where `Admin` = 'Sim'";
        $conENC = $conexao->query($queryENC);

        while($dadoENC = $conENC->fetch_array()) {
        $ciphering = "AES-128-CTR"; 
        $iv_length = openssl_cipher_iv_length($ciphering); 
        $options = 0;

        $encryption_iv_code = '1234567891011121'; 
        $encryption_key_token = "RHrND!g?6sL@u#Z7q=+nxJ%WtM'<vV{dm;Tf93_K2-()~`Y8S&utpZJy;s^!w`}G2jEBeYd~c-7QH.SWRDqkfAhT?@5xX&[N{V>Ubj>q<~;{9mzW?Gvs-KyQpYnhtd(6`a*ZcrTVNf%74^P/J#5SH:pW'S@4937#=mt5N}.6P8jxRK>)ck,nZ%T;s/qGMz{<b~_A]QCfL8vQtJc?!P7(dkpG*@Na{2Heu;/E#qs3Y_6}Xfb.CxW5[mTw]="; 
        $encrypted_token = openssl_encrypt($replyBOT, $ciphering, $encryption_key_token, $options, $encryption_iv_code);

        $encryption_iv = '1234567891011121'; 
        $encryption_key = $dadoENC['token'];  
        $replyBOTenc = openssl_encrypt($encrypted_token, $ciphering, $encryption_key, $options, $encryption_iv);
        }

        $sql = $pdo->query("INSERT INTO `$id` (`tag`, `profileimg`, `mensagem`, `horario`, `data`, `Cor`) VALUES ('Helpy', 'bot-guest.jpg', '$replyBOTenc', '$horario', '$data', '4')");
    }
    if (stristr($mensagem, "/ban ") !== false) {
        if($rowVERIFY == 1) {
            $nickBAN = str_replace("/ban ", "", $mensagem);
            $queryBANr = "SELECT * FROM `$id` where `user` = '$nickBAN'";
            $conBANr = $conexao->query($queryBANr) or die($mysqli->error);
            while ($dadoBAN = $conBANr->fetch_array()) {
                $idBANm = $dadoBAN['id'];
            }
            if(empty($idBANm) || $nickBAN == "Helpy") {
                    if($country == "Brazil") {
                        $replyBOT = "❌ Erro: Nome de usuário não encontrado.";            
                    } else {
                        $replyBOT = "❌ Error: Username not found.";            
                    }
                    $queryENC = "SELECT * FROM `$id` where `Admin` = 'Sim'";
                    $conENC = $conexao->query($queryENC);
        
                    while($dadoENC = $conENC->fetch_array()) {
                    $ciphering = "AES-128-CTR"; 
                    $iv_length = openssl_cipher_iv_length($ciphering); 
                    $options = 0;
                
                    $encryption_iv_code = '1234567891011121'; 
                    $encryption_key_token = "RHrND!g?6sL@u#Z7q=+nxJ%WtM'<vV{dm;Tf93_K2-()~`Y8S&utpZJy;s^!w`}G2jEBeYd~c-7QH.SWRDqkfAhT?@5xX&[N{V>Ubj>q<~;{9mzW?Gvs-KyQpYnhtd(6`a*ZcrTVNf%74^P/J#5SH:pW'S@4937#=mt5N}.6P8jxRK>)ck,nZ%T;s/qGMz{<b~_A]QCfL8vQtJc?!P7(dkpG*@Na{2Heu;/E#qs3Y_6}Xfb.CxW5[mTw]="; 
                    $encrypted_token = openssl_encrypt($replyBOT, $ciphering, $encryption_key_token, $options, $encryption_iv_code);
        
                    $encryption_iv = '1234567891011121'; 
                    $encryption_key = $dadoENC['token'];  
                    $replyBOTenc = openssl_encrypt($encrypted_token, $ciphering, $encryption_key, $options, $encryption_iv);
                    }
        
                    $sql = $pdo->query("INSERT INTO `$id` (`tag`, `profileimg`, `mensagem`, `horario`, `data`, `Cor`) VALUES ('Helpy', 'bot-guest.jpg', '$replyBOTenc', '$horario', '$data', '4')");
            } else {
                if($nickBAN != $nickUser) { 
                $queryBAN3 = "DELETE FROM `$id` where `user` = '$nickBAN'";
                $sqlBAN = mysqli_query($conexao, $queryBAN3);
                $queryBAN4 = "INSERT INTO `$id` (`id`, `user`, `Banido`, `anunciado`) VALUES ('$idBANm', '$nickBAN', 'Sim', '0')";
                $sqlBAN4 = mysqli_query($conexao, $queryBAN4);
                } else {
                    if($country == "Brazil") {
                        $replyBOT = "❌ Erro: Você não pode se banir.";            
                    } else {
                        $replyBOT = "❌ Error: You can't ban yourself.";            
                    }
                    $queryENC = "SELECT * FROM `$id` where `Admin` = 'Sim'";
                    $conENC = $conexao->query($queryENC);
        
                    while($dadoENC = $conENC->fetch_array()) {
                    $ciphering = "AES-128-CTR"; 
                    $iv_length = openssl_cipher_iv_length($ciphering); 
                    $options = 0;
                
                    $encryption_iv_code = '1234567891011121'; 
                    $encryption_key_token = "RHrND!g?6sL@u#Z7q=+nxJ%WtM'<vV{dm;Tf93_K2-()~`Y8S&utpZJy;s^!w`}G2jEBeYd~c-7QH.SWRDqkfAhT?@5xX&[N{V>Ubj>q<~;{9mzW?Gvs-KyQpYnhtd(6`a*ZcrTVNf%74^P/J#5SH:pW'S@4937#=mt5N}.6P8jxRK>)ck,nZ%T;s/qGMz{<b~_A]QCfL8vQtJc?!P7(dkpG*@Na{2Heu;/E#qs3Y_6}Xfb.CxW5[mTw]="; 
                    $encrypted_token = openssl_encrypt($replyBOT, $ciphering, $encryption_key_token, $options, $encryption_iv_code);
        
                    $encryption_iv = '1234567891011121'; 
                    $encryption_key = $dadoENC['token'];  
                    $replyBOTenc = openssl_encrypt($encrypted_token, $ciphering, $encryption_key, $options, $encryption_iv);
                    }
        
                    $sql = $pdo->query("INSERT INTO `$id` (`tag`, `profileimg`, `mensagem`, `horario`, `data`, `Cor`) VALUES ('Helpy', 'bot-guest.jpg', '$replyBOTenc', '$horario', '$data', '4')");  
                }
            }
        } else {
            if($country == "Brazil") {
                $replyBOT = "❌ Erro: Apenas administradores podem executar esse comando.";            
            } else {
                $replyBOT = "❌ Error: Only administrators can execute this command.";            
            }
            $queryENC = "SELECT * FROM `$id` where `Admin` = 'Sim'";
            $conENC = $conexao->query($queryENC);

            while($dadoENC = $conENC->fetch_array()) {
            $ciphering = "AES-128-CTR"; 
            $iv_length = openssl_cipher_iv_length($ciphering); 
            $options = 0;
        
            $encryption_iv_code = '1234567891011121'; 
            $encryption_key_token = "RHrND!g?6sL@u#Z7q=+nxJ%WtM'<vV{dm;Tf93_K2-()~`Y8S&utpZJy;s^!w`}G2jEBeYd~c-7QH.SWRDqkfAhT?@5xX&[N{V>Ubj>q<~;{9mzW?Gvs-KyQpYnhtd(6`a*ZcrTVNf%74^P/J#5SH:pW'S@4937#=mt5N}.6P8jxRK>)ck,nZ%T;s/qGMz{<b~_A]QCfL8vQtJc?!P7(dkpG*@Na{2Heu;/E#qs3Y_6}Xfb.CxW5[mTw]="; 
            $encrypted_token = openssl_encrypt($replyBOT, $ciphering, $encryption_key_token, $options, $encryption_iv_code);

            $encryption_iv = '1234567891011121'; 
            $encryption_key = $dadoENC['token'];  
            $replyBOTenc = openssl_encrypt($encrypted_token, $ciphering, $encryption_key, $options, $encryption_iv);
            }

            $sql = $pdo->query("INSERT INTO `$id` (`tag`, `profileimg`, `mensagem`, `horario`, `data`, `Cor`) VALUES ('Helpy', 'bot-guest.jpg', '$replyBOTenc', '$horario', '$data', '4')");    
        }
    }
}

if (isset($_POST['delete'])) {
    echo ("<script> location.href='destruirsala.php?id=$id' </script>");
}

if (isset($_POST['cleanchat'])) {
    if($rowVERIFY != 0) {
    $querycl = "UPDATE `$id` SET `mensagem` = '' WHERE `mensagem` != ''";
    $concl = mysqli_query($conexao, $querycl);

    $querycl2 = "UPDATE `$id` SET `img` = '' WHERE `img` != ''";
    $concl2 = mysqli_query($conexao, $querycl2);

    $querycl3 = "UPDATE `$id` SET `video` = '' WHERE `video` != ''";
    $concl3 = mysqli_query($conexao, $querycl3);

    $querycl4 = "UPDATE `$id` SET `file` = '' WHERE `file` != ''";
    $concl4 = mysqli_query($conexao, $querycl4);

    $queryANI = "UPDATE `$id` SET `anunciado` = '1' where `anunciado` = '0'";
    $resultANI = mysqli_query($conexao, $queryANI);
    }
}

if (isset($_POST['leave'])) {
    $queryLV = "INSERT INTO `$id` (`tag`, `anunciado`, `saiu`) VALUES ('$tag', '0', 'Sim')";
    $resultLV = mysqli_query($conexao, $queryLV);
    echo ("<script> location.href='sair.php?id=$id' </script>");
}

if(isset($_POST['ban'])) {
    if($rowVERIFY != 0) { 
    $nickBAN = mysqli_real_escape_string($conexao, $_POST['ban']);
    $queryBANr = "SELECT * FROM `$id` where `user` = '$nickBAN'";
    $conBANr = $conexao->query($queryBANr) or die($mysqli->error);
    while ($dadoBAN = $conBANr->fetch_array()) {
        $idBAN = $dadoBAN['id'];
    }
    $queryBAN3 = "DELETE FROM `$id` where `user` = '$nickBAN'";
    $sqlBAN = mysqli_query($conexao, $queryBAN3);
    $queryBAN4 = "INSERT INTO `$id` (`id`, `user`, `Banido`, `anunciado`) VALUES ('$idBAN', '$nickBAN', 'Sim', '0')";
    $sqlBAN4 = mysqli_query($conexao, $queryBAN4);
    }
}

$querycreate = "SELECT * FROM `publicrooms` where `id` = '$id'";
$concreate = mysqli_query($conexao, $querycreate);
$rowcreate = mysqli_num_rows($concreate);

if($rowcreate == 0) {
    if($country == "Brazil") {
        $roomstatus = "Status da Sala: <span style='color: yellow'>Privada</span>";
        } else {
            $roomstatus = "Room Status: <span style='color: yellow'>Private</span>";
        }
} else {
        if($country == "Brazil") {
            if($rowVERIFY != 0 ) {
            $roomstatus = "Status da Sala: <span style='color: darkcyan'>Pública</span>  <br> <form method='POST' target='hiddenFrame'><li><button name='private-btn' class='priv-chat'>Privar Sala</button></li></form>";
            } else {
            $roomstatus = "Status da Sala: <span style='color: darkcyan'>Pública</span>";
            }    
        } else {
            if($rowVERIFY != 0) {
                $roomstatus = "Room Status: <span style='color: darkcyan'>Public</span>  <br> <form method='POST' target='hiddenFrame'><li><button name='private-btn' class='priv-chat'>Private Room</button></li></form>";
                } else {
                $roomstatus = "Room Status: <span style='color: darkcyan'>Public</span>";
                } 
    }
}

if(isset($_POST['publicroom'])) {
    $nome = mysqli_real_escape_string($conexao, $_POST['roomname']);
    $tema = mysqli_real_escape_string($conexao, $_POST['roomtheme']);

    if($rowVERIFY == 1) {
        if(!empty($nome) && strlen($nome) < 31 && strlen($tema) < 49) {

            if($rowcreate == 0) {
                $queryAdd = "SELECT * FROM `$id` where `id` != '' and `id` != 'BOT'";
                $resultAdd = mysqli_query($conexao, $queryAdd);
                $rowAdd = mysqli_num_rows($resultAdd);
    $queryPUBadm = "SELECT * FROM `$id` where `Admin` = 'Sim'";
    $conPUBadm = $conexao->query($queryPUBadm);
    while($dadoPUBadm = $conPUBadm->fetch_array()) {
        $host = $dadoPUBadm['user'];
    }

    $queryPUB = "INSERT INTO `publicrooms` (`id`, `nomesala`, `temasala`, `participantes`, `host`, `online`, `pais`) VALUES ('$id', '$nome', '$tema', '$rowAdd', '$host', '0', '$country')";
    $conPUB = mysqli_query($conexao, $queryPUB);
    $queryPChat =  "INSERT INTO `$id` (`salapublica`, `anunciado`) VALUES ('1', '0')";
    $conPChat = mysqli_query($conexao, $queryPChat);
    sleep(1);
    $verify = "SELECT * FROM `publicrooms` where `id` = '$id'";
    $conthis = mysqli_query($conexao, $verify);
    $rowthis = mysqli_num_rows($conthis);

    if($rowthis == 1) {
        echo ("<script> window.alert('Sala pública criada com sucesso!') </script>");
    } else {
        echo ("<script> window.alert('Ocorreu um erro durante a criação da sala, desculpe :(') </script>");
    }
            } else {
                echo ("<script> window.alert('Essa sala já é publica') </script>");
            }
    } else {
        echo ("<script> window.alert('Por favor, coloque um nome na sala que tenha de 1 à 30 caracteres') </script>");
    }
}
}

$queryST = "SELECT * FROM `$id` where `Admin` = 'Sim'";
$conST = $conexao->query($queryST);

while($dadost = $conST->fetch_array()) {
    $pwd = $dadost['pwd'];
    $chckData = $dadost['apenasadmins'];
    $chckData2 = $dadost['pwdrequired'];
    if($chckData == "Sim") {
        $checked = "checked";
    } else {
        $checked = "";
    }
    if($chckData2 == "1") {
        $checked2 = "checked";
    } else {
        $checked2 = "";
    }
}

$queryCallID = "SELECT * FROM `$id` where `Admin` = 'Sim'";
$conCallID = $conexao->query($queryCallID);

while($dadoCallID = $conCallID->fetch_array()) {
    $idAdm = $dadoCallID['id'];
}

if(isset($_POST['private-btn'])) {
    if($rowVERIFY == 1) {
    $queryPr = "DELETE FROM `publicrooms` where `id` = '$id'";
    $resultPr = mysqli_query($conexao, $queryPr);
    echo ("<script> alert('Sala Privada com sucesso') </script>");

    $queryPrChat = "INSERT INTO `$id` (`salapublica`, `anunciado`) VALUES ('0', '0')";
    $resultPrChat = mysqli_query($conexao, $queryPrChat);
    }
}