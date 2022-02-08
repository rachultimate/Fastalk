<?php
include('specialphp/IndexProcessator.php');
include('specialphp/PublicRoomProcessator.php');
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
    <link rel="stylesheet" href="css/salaspublicas5.css">
    <link rel="stylesheet" href="css/responsivoSL.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="javascript/menu.js"></script>
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
    <title><?php 
    if($country == "Brazil") {
        echo ("Fastalk | Salas Públicas");
    } else {
        echo ("Fastalk | Public Rooms");
    }
    ?></title>
</head>

<header>
    <div class="navbar">
        <div class="logo"><a href="index.php"><img src="imagens/1613136895270.png" alt="fastalk-blackbar-logo"></a></div>
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

<body style="overflow-x: hidden;">
<main id="user" class="user">
<form hidden method="POST" enctype="multipart/form-data">
        <input hidden onchange="this.form.submit()" id="changeph-file" type="file" name="profile-file">
    </form>
    <label for="changeph-file">
    <div class="change-ph"><p><?php 
    if($country == "Brazil") {
        echo ("Alterar foto de perfil");
    } else {
        echo ("Change Profile Photo");
    }
    ?></p><i class="fas fa-plus"></i>
    </div>
    </label>
        <img height="200" width="200" id="profile-img" alt="fastalk-profile-pic" src="midia/<?php echo($source); ?>">
    <form method="POST">
        <br>
        <h1 style="margin-top: -10px;"><?php 
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
    </main>
    <main class="chat">
        <form method="POST">
                    <div class="input-join">
                    <h1><?php 
    if($country == "Brazil") {
        echo ("Salas Públicas");
    } else {
        echo ("Public Rooms");
    }
    ?></h1>
                        <input id="Name" class="input-field" autocomplete="off" name="nome" type="text" placeholder="<?php 
                        if($country == "Brazil") {
                            echo ("Nome Da Sala");
                        } else {
                            echo ("Room Name");
                        }
                        ?>">
                        <div class="underline"></div>
                    </div>
                    <div class="input-join2">
                        <input id="Theme" class="input-field" autocomplete="off" name="tema" type="text" placeholder="<?php 
                        if($country == "Brazil") {
                            echo ("Tema Da Sala");
                        } else {
                            echo ("Room Theme");
                        }
                        ?>">
                        <div class="underline"></div>
                        <div style="max-height: 150px; overflow-y: scroll;" class="autocomplete-box">
                        </div>
                    </div>
                <button name="pesquisar" class="create" ><?php 
                if($country == "Brazil") {
                    echo ("Pesquisar");
                } else {
                    echo ("Search");
                }
                ?></button>
                <script src="javascript/autocomplete.js"></script>
                <script src="javascript/inputSuggestions.js"></script>
                <script src="javascript/showInput.js"></script>
            </form>
                <?php include('specialphp/PublicRoomShow.php'); ?>
    </main>
    </div>
</body>
</html>