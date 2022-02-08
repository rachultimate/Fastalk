<?php
include('specialphp/IndexProcessator.php');

        // Create the function, so you can use it
function isMobileAlert() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}
// If the user is on a mobile device, redirect them
if(isMobileAlert()){
    if($country == "Brazil") {
    echo ("<script> alert('Erro 404: Página não encontrada') </script>");
    } else {
    echo ("<script> alert('Error 404: Page not found') </script>");    
    }
}
?>
<!DOCTYPE html>
<html lang="<?php 
if($country == "Brazil") {
    echo ("pt-br");
} else {
    echo ("en");
}
?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name='description' content='
    <?php
    if($country == "Brazil") {
    echo("O Fastalk é um sistema de chat rápido 100% anônimo onde não é utilizado sistema de criação de contas. Apenas coloque um nick e converse com quem você quiser.");
    } else {
        echo ("Fastalk is a fast chat system 100% anonymous where no account creation system is used. Just put a nickname and chat with whoever you want.");
    }
    ?>
    '>
    <link rel="stylesheet" href="css/index2.css">
    <link rel="stylesheet" href="css/responsivo2.css">
    <script src="https://kit.fontawesome.com/61f1f807e8.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-VBY5D65N92"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-VBY5D65N92');
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://www.google.com/recaptcha/api.js?hl=<?php if($country == "Brazil") { echo("pt"); } else { echo ("en"); } ?>"></script>
    <link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    
    <script src="javascript/menu.js"></script>
    <title><?php
    if($country == "Brazil") {
    echo("Fastalk | Chat rápido com videochamadas e 100% anônimo");
    } else {
        echo ("Fastalk | Fast chat 100% anonymous with video calls");
    }
    ?>
    </title>
</head>

<header>
    <div class="navbar">
        <div class="logo"><img src="imagens/1613136895270.png" alt="fastalk-blackbar-logo"></div>
        <input class="checkbox" id="menu-hamburguer" type="checkbox" style="display: none;"/>

            <label for="menu-hamburguer">
            <div class="menu2">
                <span class="hamburguer active"></span>
            </div>
            </label>
        <ul class="menu">
            <li><a href="contato.php" target="_blank"><?php 
            if($country == "Brazil") {
                echo ("Contato");
            } else {
                echo ("Contact");
            }
            ?></a></li>
            <li><a href="contato.php" target="_blank">Report</a></li>
            <li><a href="contato.php" target="_blank">Info</a></li>
        </ul>
    </div>
</header>

<body>

    <main id="user" class="user">
    <form hidden method="POST" enctype="multipart/form-data">
        <input hidden onchange="this.form.submit()" id="changeph-file" type="file" name="profile-file">
    </form>
    <label for="changeph-file">
    <div class="change-ph"><p><?php 
    if($country == "Brazil") {
        echo ("Alterar foto de perfil");
    } else {
        echo ("Alterar foto de perfil");
    }
    ?></p><i class="fas fa-plus"></i>
    </div>
    </label>
        <img id="profile-img" alt="fastalk-profile-pic" src="midia/<?php echo($source); ?>">
        <iframe name="hiddenFrame" hidden></iframe>
    <form method="POST">
        <br>
        <h1><?php 
        if($country == "Brazil") {
            echo ("Crie sua sala:");
        } else {
            echo ("Create your room:");
        }
        ?></h1>
        <div class="input-field">
            <input id="nick" class="input-field" minlength="2" maxlength="16" autocomplete="off" required name="nick" type="text" placeholder="<?php 
            if($country == "Brazil") {
                echo ("Seu nome ou nick");
            } else {
                echo ("Your name or nick");
            }
            ?>">
            <div class="underline"></div>
        </div>
        <div style= "margin-top: 20px; margin-left: 2px;" name="g-recaptcha-response" data-theme="dark" name="captchags" class="g-recaptcha" data-sitekey="6LcM3RwaAAAAAF0A-d89N7LwbECaqFVbNp_p7iA_"></div>
        <button type="submit" name="createroom<?php 
        // Create the function, so you can use it
function isMobile() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}
// If the user is on a mobile device, redirect them
if(isMobile()){
    echo ("_mobile");
}
        ?>" style="border-radius: 6px;" class="create"><?php
        if($country == "Brazil") {
            echo ("+ Criar Sala");
        } else {
            echo ("+ Create room");
        }
        ?></button>
        </form>
        <iframe name="hiddenFrame" hidden></iframe>
        <form method="POST" target="hiddenFrame">
        <h2><?php 
        if($country == "Brazil") {
            echo ("Entrar em uma sala existente:");
        } else {
            echo ("Join on an existing room:");
        }
        ?></h2>
        <button onclick="showinput()" type="submit" name="search-room" style="border-radius: 6px;" class="search-room"><?php 
        if($country == "Brazil") {
            echo ("Entrar usando um ID");
        } else {
            echo ("Join by using a Room ID");
        }
        ?></button>
        <script src="javascript/showInput.js"></script>
        </form>
        <form method="POST" id="form_join_mobile" style="display: none;">
            <div class="form_mobile_join" target="hiddenFrame">
                <input class="input-mj" autocomplete="off" name="mobile_input_join" type="text" required placeholder="<?php 
            if($country == "Brazil") {
                echo ("ID da Sala");
            } else {
                echo ("Room ID");
            }
            ?>"> <br>
            <button name="mobile_btn_join" class="create" type="submit"><?php 
            if($country == "Brazil") {
                echo ("Entrar");
            } else {
                echo ("Join");
            }
            ?></button>
            </div>
        </form>
        <form method="POST" action="salaspublicas.php">
        <button id="publicbutton" type="submit" name="publicroom2" style="border-radius: 6px;" class="publicroom2"><?php 
        if($country == "Brazil") {
            echo ("Salas Públicas");
        } else {
            echo ("Public rooms");
        }
        ?></button></form>
    </form>
    </main>
    <main class="chat">
        <form method="POST">
        <h4 style="color: red; font-size: 25px;"><?php 
        if($country == "Brazil") {
            echo ("Erro 404: Página não encontrada.");
        } else {
            echo ("Erro 404: Página não encontrada.");
        }
        ?>
        </h4>
            <h1 style="margin-top: 50px;"><?php
            if($country == "Brazil") {
            echo ("Ou entre em uma sala existente:");
            } else {
                echo ("Or join on an existing room");
            }
            ?>
            </h1>
           
            <div class="input-join">
                <input onclick="borderfixduo()" required id="join" name="join" autocomplete="off" type="text" placeholder="<?php if($country == "Brazil") { echo("ID da sala. EX: BJ2D5"); } else { echo ("Room ID. EX: BJ2D5"); } ?>">
                <div class="underline"></div>
            </div>
            <button type="submit" name="send" class="create"><?php 
            if($country == "Brazil") {
                echo ("Entrar");
            } else {
                echo ("Join");
            }
            ?></button>
            
            
            <h3 style="text-align: center;  color: white"><?php 
            if($country == "Brazil") {
            echo("Você também pode optar por entrar em salas públicas:");
            } else {
                echo ("You can also choose to join on public rooms:");
            }
            ?>
            </h3> <br>
            </form>
            <form method="POST" action="salaspublicas.php">
            <button onclick="redirecto()" type="null" class="botao-publica"><?php 
            if($country == "Brazil") {
                echo ("Entrar em Salas Públicas");
            } else {
                echo ("Join on Public rooms");
            }
            ?></button>
            </form>
        
    </main>
    </div>
    <footer>
        <div class="rodape" <?php if(isMobile()) { echo("hidden"); } ?>>
            <p style="margin-top: 15px;"><?php
            if($country == "Brazil") {
            echo ("O Fastalk é um sistema de chat rápido 100% anônimo que funciona por meio de criação de salas");
            } else {
                echo ("Fastalk is a 100% anonymous fast chat system that works by room creations.");
            }
            ?></p>
        </div>
    </footer>
</body>
</html>