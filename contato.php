<?php
error_reporting(0);
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
$country = $xml->geoplugin_countryName;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/contato.css">
    <link rel="stylesheet" href="css/responsivoCON.css">
    
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="menu.js"></script>
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
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script data-ad-client="ca-pub-9070040036130024" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
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
    <title>Fastalk</title>
</head>
<body>
    <header>
        <div class="navbar">
            <div class="logo"><a href="index.php"><img src="imagens/1613136895270.png" alt="fastalk-blackbar-logo"></a></div>
            <input class="checkbox" id="menu-hamburguer" type="checkbox" style="display: none;"/>
    </div>
    </header>
    
    <div class="oque"> 
        <?php
        if($country == "Brazil") {
            echo ("
        <h1>O que é o Fastalk?</h1>
        <h2>O Fastalk é um sistema de chat rápido com call, 100% anônimo e sem sistema de criação de contas. Apenas crie sua sala (ou entre em uma sala existente) e você já pode conversar com quem você quiser.</h2>
            ");
    } else {
        echo ("
        <h1>What is Fastalk?</h1>
        <h2>Fastalk is a fast chat with call system, 100% anonymous and without an account creation system. Just create your room (or enter an existing room) and you can chat with anyone you want.</h2>
        ");
        }
        ?>

    </div>

    <div class="contato">
        <?php
        if($country == "Brazil") {
            echo('
        <h1>Contato</h1>
        <h2>Para realização de parcerias ou relações comerciais, <a target="_blank" href="mailto:comercial@fastalk.tk"> Clique Aqui</a></h2>
        <h3>Para report de falhas, sugestões ou qualquer outro assunto, <a target="_blank" href="mailto:contato@fastalk.tk">Clique Aqui</a></h3>
            ');
    } else {
        echo ('
        <h1>Contact</h1>
        <h2>For partnerships or commercial relations, <a target="_blank" href="mailto:comercial@fastalk.tk"> <br> Click Here</a></h2>
        <h3>For bug reports, suggestions or any other matter, <a target="_blank" href="mailto:contato@fastalk.tk">Click Here</a></h3>
        ');
        }
        ?>
        
        
            
            <div class="contatoi"> <i class="far fa-envelope"></i></div>
        

    </div>

    <div class="donate"> 
        <?php
        if($country == "Brazil") {
            echo ('
        <h1>Doações</h1>
        <h2>
            A sua doação ajuda o site a se manter online e a realizar melhorias em nossa interface. Sua doação nunca é utilizada para fins próprios da equipe do Fastalk, e é investida 100% no site.
            <div class="botoes-doar">
                <a class="paypal" target="_blank" href="https://www.paypal.com/donate?business=J2QZ87H2FH6YE&item_name=Doa%C3%A7%C3%A3o+pra+melhoria+do+Fasatalk&currency_code=BRL"><i class="fab fa-paypal"></i></a>
                <a class="mpay" target="_blank" href="https://mpago.la/1ethZ4D"><i class="far fa-handshake"></i></a>
            </div>
        </h2>
        ');
        } else {
            echo ('
            <h1>Donations</h1>
            <h2>
            Your donation helps the site to stay online and make improvements to our interface. Your donation is never used for the purposes of the Fastalk team, and is invested 100% on the website.
                <div class="botoes-doar">
                    <a class="paypal" target="_blank" href="https://www.paypal.com/donate?business=J2QZ87H2FH6YE&item_name=Doa%C3%A7%C3%A3o+pra+melhoria+do+Fasatalk&currency_code=BRL"><i class="fab fa-paypal"></i></a>
                    <a class="mpay" target="_blank" href="https://mpago.la/1ethZ4D"><i class="far fa-handshake"></i></a>
                </div>
            </h2>
            ');
        }
        ?>

        
        
            
            <div class="donatei"> <i class="fas fa-hand-holding-usd"></i></div>
        

    </div>


    <div class="redes"> 
        <?php
        if($country == "Brazil") {
            echo('
        <h1>Redes Sociais</h1>
        <h2> Seguindo nossas redes sociais, você pode nos ajudar com seu feedback, ou conferir novas atualizações no site.
            <div class="botoes-seguir">
                <a class="twitter" href="https://twitter.com/FastalkT" target="_blank"><i class="fab fa-twitter"></i></a>
                <a class="instagram" href="https://www.instagram.com/fastalktk/" target="_blank"><i class="fab fa-instagram"></i></a>
                <a class="discord" href="https://discord.gg/jy9mddc8wh" target="_blank"><i class="fab fa-discord"></i></a>
                <a class="youtube" href="https://www.youtube.com/channel/UCSZXw-L576AoMp8AKhbKZaA" target="_blank"><i class="fab fa-youtube"></i></a>
            </div>
        </h2>
        ');
        } else {
            echo('
            <h1>Social networks</h1>
            <h2> Following our social networks, you can help us with your feedback, or check for new updates on the website.
                <div class="botoes-seguir">
                    <a class="twitter" href="https://twitter.com/FastalkT" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a class="instagram" href="https://www.instagram.com/fastalktk/" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a class="discord" href="https://discord.gg/jy9mddc8wh" target="_blank"><i class="fab fa-discord"></i></a>
                    <a class="youtube" href="https://www.youtube.com/channel/UCSZXw-L576AoMp8AKhbKZaA" target="_blank"><i class="fab fa-youtube"></i></a>
                </div>
            </h2>
            ');
        }
        ?>             
            <div class="redei"><i class="fas fa-globe"></i></div>
        

    </div>

    <div class="att"> 
        <?php
        if($country == "Brazil") {
        echo('
        <h1>Atualizações</h1>
        <h2> Caso você queira ver as atualizações do site, voce pode dar uma olhada em nosso Blog de Atualizações <a target="_blank" href="updateblog.php">Clicando Aqui!</a>
            
        </h2>
        ');
        } else {
            echo('
            <h1>Updates</h1>
            <h2> If you want to see updates from the site, you can take a look at our Updates Blog <a target="_blank" href="updateblog.php">Clicking Here!</a>
                
            </h2>
            ');   
        }
        ?>
        
        <div class="atti"> <i class="fas fa-level-up-alt"></i></div>
        
        
    </div>


    <div class="ads"> 
        <?php
        if($country == "Brazil") {
            echo('
        <h1>Porque ADS?</h1>
        <h2>Os ADS são nossa principal fonte de renda, já que não gostamos desse sistema de "Quem paga tem acesso a mais coisas", e utilizamos os ADS para monetizar o site. Pedimos que não use ad-blocker, mas a opção é sua.

            
        </h2>
        ');
        } else {
            echo ('
            <h1>Why ADS?</h1>
            <h2>ADS is our main source of income, as we dont like this "Who pays system has access to more" system, and we use ADS to monetize the site. We ask that you do not use ad-blocker, but the option is yours.
    
                
            </h2>
            ');
        }

        ?>
        
        <div class="adsi"> <i class="fas fa-ad"></i></div>
        
        
    </div>


</body>
</html>