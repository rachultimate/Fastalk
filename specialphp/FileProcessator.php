<?php

$queryPIMG = "SELECT * FROM `$id` where `id` = '$s'";
$conPIMG = $conexao->query($queryPIMG);

while($dadoPIMG = $conPIMG->fetch_array()) {
    $profileimg = $dadoPIMG['profileimg'];
}

if (isset($_POST['filesend'])) {
    $filename = $_FILES['filesendhere']['name'];
    $fileTmpName = $_FILES['filesendhere']['tmp_name'];
    $filetype = $_FILES['filesendhere']['type'];
    $filesize = $_FILES['filesendhere']['size'];

    $fileExt = explode('.', $filename);
    $fileActualExt = strtolower(end($fileExt));
    if ($filesize < 51000000) {
        if (!empty($_FILES['filesendhere'])) {
            if ($filetype == "image/png" || $filetype == "image/jpg" || $filetype == "image/jpeg" || $filetype == "image/gif" || $filetype == "audio/mpeg" || $filetype == "video/mp4" || $filetype == "video/avi" || $filetype == "application/rar" || $filetype == "application/zip" || $filetype == "application/pdf" || $filetype == "application/apk" || $filetype == "application/x-msdownload" || $filetype == "text/plain" || $filetype == "application/vnd.openxmlformats-officedocument.wordprocessingml.document" || $filetype == "application/vnd.openxmlformats-officedocument.presentationml.presentation") {
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $filedestination = 'midia/'.$fileNameNew;

                $horario = date("H:i");
                
                    if($filetype == "image/png" || $filetype == "image/jpg" || $filetype == "image/jpeg" || $filetype == "image/gif") {
                        if(move_uploaded_file($fileTmpName, $filedestination)) {
                            $sqlIMG = "INSERT INTO `$id` (`tag`, `profileimg`, `horario`, `img`, `Cor`) VALUES ('$tag', '$profileimg', '$horario', '$fileNameNew', '$cor')";
                            $conIMG = mysqli_query($conexao, $sqlIMG);
                        } else {
                            echo ("<script> window.alert('Desculpe, mas ocorreu um erro ao tentar enviar seu arquivo. Por favor, tente de novo.') </script>");
                        }
                } elseif($filetype == "video/mp4" || $filetype == "video/avi") {
                    if(move_uploaded_file($fileTmpName, $filedestination)) {
                        $sqlIMG = "INSERT INTO `$id` (`tag`, `profileimg`, `horario`, `video`, `Cor`) VALUES ('$tag', '$profileimg', '$horario', '$fileNameNew', '$cor')";
                        $conIMG = mysqli_query($conexao, $sqlIMG);
                    } else {
                        echo ("<script> window.alert('Desculpe, mas ocorreu um erro ao tentar enviar seu arquivo. Por favor, tente de novo.') </script>");
                    } 
                } elseif($filetype == "audio/mpeg" || $filetype == "application/rar" || $filetype == "application/zip" || $filetype == "application/pdf" || $filetype == "application/apk" || $filetype == "application/x-msdownload" || $filetype == "text/plain" || $filetype == "application/vnd.openxmlformats-officedocument.wordprocessingml.document" || $filetype == "application/vnd.openxmlformats-officedocument.presentationml.presentation") {
                    if(move_uploaded_file($fileTmpName, $filedestination)) {
                        $sqlIMG = "INSERT INTO `$id` (`tag`, `profileimg`, `horario`, `file`, `filename`, `Cor`) VALUES ('$tag', '$profileimg', '$horario', '$fileNameNew', '$filename', '$cor')";
                        $conIMG = mysqli_query($conexao, $sqlIMG);
                    } else {
                        echo ("<script> window.alert('Desculpe, mas ocorreu um erro ao tentar enviar seu arquivo. Por favor, tente de novo.') </script>");
                    }  
                }
            } else {
                echo ("<script> window.alert('O Tipo do arquivo que você enviou não é permitido.') </script>");
            }
        } else {
            echo ("<script> window.alert('Clique em  ESCOLHER ARQUIVO para selecionar o que você quer enviar') </script>");
        }
    } else {
        echo ("<script> window.alert('Seu arquivo é muito grande! O limite máximo aceitável é de 30MB') </script>");
    }
}
