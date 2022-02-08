<?php
error_reporting(0);
include('conexao.php');
require('recaptchalib.php');

session_start();

$user = mysqli_real_escape_string($conexao, $_POST['user']);
$password = mysqli_real_escape_string($conexao, $_POST['password']);
$s = $_COOKIE['us_uuid'];

if ($_POST["g-recaptcha-response"]) {
    $response = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
}

if($_COOKIE['stoken1'] != "" && $_COOKIE['stoken2'] != "") {
    $stoken1 = $_COOKIE['stoken1'];
    $stoken2 = $_COOKIE['stoken2'];
    $queryCookie = "SELECT * FROM `adminlogs` where `sid` = '$s' and `securitytoken1` = '$stoken1' and `securitytoken2` = '$stoken2'";
    $resultCookie = mysqli_query($conexao, $queryCookie);
    $rowCookie = mysqli_num_rows($resultCookie);

    if($rowCookie != 0) {
        echo ("<script> location.href='mainpanel.php' </script>");
    }
}

if(isset($_POST['join'])) {
    if ($response != null && $response->success) {
        $queryVerify = "SELECT * FROM `adminlogs` WHERE `user` = '$user'";
        $conVerify = $conexao->query($queryVerify);

        while($dadoVrf = $conVerify->fetch_array()) {
            $passwordado = $dadoVrf['senha'];
            $token1 = $dadoVrf['securitytoken1'];
            $token2 = $dadoVrf['securitytoken2'];
        }

        if(password_verify($password, $passwordado)) {
            $newstoken1 = md5(uniqid());
            $newstoken2 = md5(uniqid());
            $queryTk1 = "UPDATE `adminlogs` SET `sid` = '$s', `securitytoken1` = '$newstoken1', `securitytoken2` = '$newstoken2' WHERE `adminlogs`.`user` = '$user';";
            $resultTk1 = mysqli_query($conexao, $queryTk1);
            echo ("<script> location.href='panel-setcookie.php?stoken1=$newstoken1&stoken2=$newstoken2' </script>");
        } else {
            echo("<div class='erro'>Credenciais incorretas.</div>");
        }
    } else {
        echo("<div class='erro'>Por favor, preencha o captcha.</div>");
    }
}
?>