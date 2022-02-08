<?php
include('specialphp/MainPanelProcessator.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name='description' content='O Fastalk é um sistema de chat rápido com vídeochamadas 100% anônimo onde não é utilizado sistema de criação de contas. Apenas coloque um nick e converse com quem você quiser.'>
    <link rel="stylesheet" href="css/paineldecontrole.css">
        <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-NXTH2M8');</script>
    <!-- End Google Tag Manager -->
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
    <!-- Global site tag (gtag.js) - Google Ads: 861092026 -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-861092026"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'AW-861092026');
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
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
    <script src="javascript/ajaxCountUsers2.js"></script>
    <script src="javascript/menu.js"></script>
    <title>Fastalk | Painel de Controle</title>
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
            <li><a>Painel de Controle</a></li>
        </ul>
    </div>
</header>

<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NXTH2M8"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    <main class="user">
        <h1 style="margin-top: 30px;">Seja bem-vindo, <?php echo($nome); ?></h1>
            <div class="guia-salas">
            <br>
            <p style="font-size: 25px; color: red;">Estatísticas das Salas</p>
            <br>
            <p style="color: orange; font-size: 20px;">Salas online: <span style="color: green;"> <?php echo($salasativas); ?></span></p>
            <br>
            <p style="color: cyan; font-size: 20px;">Salas públicas online: <span style="color: green;"> <?php echo($salaspublicas); ?></span></p>
            <p style="color: darkcyan; font-size: 20px;">Salas privadas online: <span style="color: green;"> <?php echo($salasprivadas); ?></span></p>
            <br>
            <p style="color: yellow; font-size: 20px;">Sala Pública em Destaque</p>
            <p style="font-size: 20px;">Nome da Sala: <span style="color: green;"><?php echo($salads_nome); ?></span></p>
            <p style="font-size: 20px;">Participantes: <span style="color: green;"><?php echo($salads_ptcp); ?></span></p>
            </div>

            <div class="guia-visitas">
            <br>
            <p style="font-size: 25px; color: darkcyan;">Estatísticas de Visitas</p>
            <br>
            <p style="color: orange; font-size: 20px;">Usuários online: <span style="color: green;"> <?php echo($usersonline); ?></span></p>
            <br>
            <p style="color: cyan; font-size: 20px;">Visitas Totais: <span style="color: green;"> <?php echo($acessos); ?></span></p>
            <p style="color: darkcyan; font-size: 20px;">Visitas Mensais (média): <span style="color: green;"> <?php echo($visitasmensais); ?></span></p>
            </div>

            <div class="guia-financeiro">
            <br>
            <p style="font-size: 25px; color: green;">Estatísticas Financeiras</p>
            <br>
            <p style="color: orange; font-size: 20px;">Todos os valores são aproximados</span></p>
            <br>
            <p style="color: cyan; font-size: 20px;">Retorno Mensal: <span style="color: green;"> <br> US$<?php echo($retornomensal); ?></span></p>
            <p style="color: darkcyan; font-size: 20px;">Retorno Total: <span style="color: green;"> <br> US$<?php echo($retornototal); ?></span></p>
            <br>
            <p style="color: yellow; font-size: 20px;">Lucro total: <?php echo($respostalucro); ?></p>
            </div>
    </main>
    </div>
</body>
</html>