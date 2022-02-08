<?php
error_reporting(0);
$id = substr($_GET['roomid'], 0, 5);
include('conexao.php');
?>
<!DOCTYPE html>
<html lang="<?php if($country == "Brazil") { echo ("pt-br"); } else { echo("en"); } ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/chat5.css">
    <link rel="stylesheet" href="css/responsivoCH.css">
    <script src="javascript/MenuChat.js"></script>
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
    <title><?php if($country == "Brazil") { echo ("Sala ".$id." | Fastalk"); } else { echo("Room ".$id." | Fastalk"); } ?></title>
</head>

<header>
    <div class="navbar">
        <div class="logo"><a><img src="imagens/1613136895270.png" alt="fastalk-blackbar-logo"></a></div>
        <input class="checkbox" id="menu-hamburguer" type="checkbox" style="display: none;"/>
            <label for="menu-hamburguer">
            <div class="menu2">
                <div class="hamburguer2"></div>
                <span class="hamburguer active"></span>
            </div>
            </label>
        <ul class="menu">
        <li><a><?php if($country == "Brazil") { echo ("ID da Sala: "); } else { echo("Room ID: "); } ?><span style='color: green;'><?php echo($id); ?></span></a></li>
            <li><a style="color: darkcyan" id="settings-label">Chat Reconstructor Versão: <span style="color: yellow;">1.0</span></a>
                <ul id="settings-navbar">
                    <iframe name="fakeFrame" hidden></iframe>
                    <form method="POST" target="fakeFrame" enctype="multipart/form-data">
                        <button id="copytext" hidden> https://fastalk.tk/sala.php?id=<?php echo($id); ?>&pwd=<?php echo($pwd) ?>"</button>
                        <?php
                        if($rowVERIFY != 0) {
                           if($country == "Brazil") {
                                $limparchat = "Limpar Chat";
                                } else { 
                                    $limparchat = "Clean Chat"; 
                                }
                        echo('<li><button name="cleanchat" class="limpar-chat">'.$limparchat.'</button></li>');
                        }
                    ?>
                    <script>
                        $("#trigger_file").click(function() {
                            $('#input_img_changer').trigger('click');   
                        })
                        function sleep(ms) {
                        return new Promise(resolve => setTimeout(resolve, ms));
                        }

                        var $temp = $("<input>");
                        var buttonlink = document.getElementById('copylink');

                        $("#addbotbtn").on('click', function() {
                            document.querySelector("#addbotbtn").innerText = '<?php echo($botadded); ?>'
                        })

                        $('#copylink').on('click', function() {
                            buttonlink.innerText = '<?php if($country == "Brazil") { echo("Link copiado!"); } else { echo("Link copied!"); } ?>'
                            sleep(3000).then(() => buttonlink.innerText = '<?php if($country == "Brazil") { echo("Link de convite"); } else { echo("Invite Link"); } ?>')
                            var $url = "https://fastalk.tk/sala.php?id=<?php echo($id); ?>&pwd=<?php echo ($pwd); ?>"

                        $("body").append($temp);
                        $temp.val($url).select();
                        document.execCommand("copy");
                        $temp.remove();
                        })
                    </script>
                    </form>
                    <?php
                        if($rowVERIFY != 0) {
                                if($country == "Brazil") {
                                     $silenciarmembros = "Silenciar todos<br> os membros";
                                     } else { 
                                         $silenciarmembros = "Mute all members"; 
                                     }
                            echo ('
                    <form method="POST" target="fakeFrame">
                    <li class="configs">      <h1 style="margin-left: -15px;">'.$silenciarmembros.'</h1>
                        <section class="botao-power">
                            <input onchange="this.form.submit()" type="checkbox" style="transform: scale(3); position: absolute; display: initial; opacity: 0;" id="botaopower" '.$checked.' name="onlyadmsbtn">
                            <label for="botaopower" id="labelbtn1" class="ligado">
                            </li>
                    </form>
                    ');
                        }
                        ?>
                    <script>
                    const botaopower1 = $("#botaopower").prop("checked");
                        var iBP = 0;
                        $("#botaopower").click(function() {
                            if(iBP == 0) {
                            $("#botaopower").prop("checked", true);
                            $.ajax({
                            type: "GET",
                            url: "check1.php" ,
                        });
                            return iBP = 1;
                            } else {
                                $("#botaopower").prop("checked", false);
                                $.ajax({
                                type: "GET",
                                url: "uncheck1.php" ,
                                });
                                return iBP = 0;
                            }
                        });
                    </script>

                        <?php
                        if($rowVERIFY != 0) {
                            if($country == "Brazil") {
                                $permitirentradas = "Permitir Entradas na Sala<br> Somente via Link de Convite";
                                } else { 
                                    $permitirentradas = "Allow room entry via<br> invitation link only"; 
                                }
                        echo('
                    <form method="POST" target="fakeFrame">
                    <li class="configs">      <h1 style="margin-left: -15px;">'.$permitirentradas.'</h1>
                        <section class="botao-power2">
                            <input type="checkbox" id="botaopower2" onchange="this.form.submit()" style="transform: scale(3); position: absolute; display: initial; opacity: 0; margin-left: -10px;" '.$checked2.' name="linkpwd">
                            <label for="botaopower2" class="ligado2">
                        </form>
                        ');
                        }
                        ?>
                            <script>
                                var iBP2 = 0;
                                $("#botaopower2").click(function() {
                                    if(iBP2 == 0) {
                                    $("#botaopower2").prop("checked", true);
                                    $.ajax({
                                        type: "GET",
                                        url: "check2.php" ,
                                    });
                                    return iBP2 = 1;
                                    } else {
                                        $("#botaopower2").prop("checked", false);
                                        $.ajax({
                                        type: "GET",
                                        url: "uncheck2.php" ,
                                    });
                                        return iBP2 = 0;
                                    }
                                })
                    </script>

                            </label>
                        </section>
              </li>
             
                    </li>
                </ul>
            </li>           
            <li><a id="participants-label"><?php 
            if($country == "Brazil") {
                echo ("Participantes");
            } else {
                echo ("Participants");
            }
            ?></a>
                <ul id="participants-navbar">
                    <li>
                    <form method="POST" target="fakeFrame">
                        <main class="user" id="ptcp">
                        <?php include('specialphp/ParticipantsReconstructor.php') ?>                          
                        </main>
                        </form>
                    </li>
                </ul>
            </li>
            <?php 
            if($rowVERIFY != 0) {
                if($rowcreate == 0) {
                    if($country == "Brazil") {
                        $criarsala = "Criar Sala Pública";
                        $nomedasala = "Nome da Sala";
                        $temadasala = "Tema da Sala (Opcional)";
                    } else {
                        $criarsala = "Create Public Room";
                        $nomedasala = "Room Name";
                        $temadasala = "Room Theme (Optional)";
                    }
                    echo('
            <li><a id="publicroom-label">'.$criarsala.'</a>
                <ul id="publicroom-navbar">
                    <li>
                        <form method="POST" target="fakeFrame">
                        <div class="input-join">
                        <input style="font-size: 15px;" id="Name" class="input-field" autocomplete="off" required minlenght="1" maxlenght="30" name="roomname" type="text" placeholder="'.$nomedasala.'">
                        <div class="underline"></div>
                    </div>
                    <div class="input-join2">
                    <input style="font-size: 15px;" id="Theme" class="input-field" autocomplete="off" minlenght="1" maxlenght="30" name="roomtheme" type="text" placeholder="'.$temadasala.'">
                        <div class="underline"></div>
                        <div class="autocomplete-box">
                        </div>
                    </div>
                <button name="publicroom" class="create2">'.$criarsala.'</button>
                </form>
            </li>
            </ul>
            
            </li>
            ');
                }
            }
            ?>
            <li style="margin-bottom: 7px;"> <p onclick="openAbout()" id="contact-label"><?php 
            if($country == "Brazil") {
                echo ("Informações");
            } else {
                echo ("About");
            }
            ?></p>
                <ul id="contact-navbar">
                    <li><a style="margin-left: -10px;" href="contato.php" target="_blank"><?php 
            if($country == "Brazil") {
                echo ("Contato");
            } else {
                echo ("Contact");
            }
            ?></a></li>
                    <li><a style="margin-left: -10px;" href="contato.php" target="_blank">Info</a></li>
                </ul>
            </li>

            <form method="POST">
            <?php
                        if($country == "Brazil") {
                            $sairdasala = "Sair";
                            $deletarsala = "Deletar Sala";
                        } else {
                            $sairdasala = "Quit";
                            $deletarsala = "Delete Room";
                        }
            if($rowVERIFY == 0) {
                echo('
            <li><button name="leave" class="limpar-chat3">'.$sairdasala.'</button></li>
            ');
            } else {
                echo('
            <li><button name="delete" class="limpar-chat3">'.$deletarsala.'</button></li>
            ');
            }
            ?>
        </ul>
        <script src="javascript/menuProcessator.js"></script>
</form>
    </div>
</header>

<body id="literally_body">
    <input id="room_field" value="<?php echo($id.$idAdm); ?>" hidden>
<div id="drag_display" class="arraste">
        <iframe name="targetFrame" hidden></iframe>
        <form method="POST" target="targetFrame" enctype="multipart/form-data">
        <i id="close-circle" class="fas fa-times-circle"></i>
        <p style="color: red; font-size: 20px; position: absolute; margin-top: 30px;" id="drag_error"></p>
        <p id="drag_title"><?php 
            if($country == "Brazil") {
                echo ("Arraste o arquivo até aqui");
            } else {
                echo ("Drag the file here");
            }
            ?></p>
        <br>
        <input id="drag_input" name="filesendhere" type="file" accepted="image/*">
        <br>
        <button id="drag_button" name="filesend" type="submit"><?php 
            if($country == "Brazil") {
                echo ("Enviar");
            } else {
                echo ("Send");
            }
            ?></button>
        </form>
    </div>
    <main class="chat">
    <iframe name="hiddenFrame" hidden></iframe>
        <form method="POST" target="hiddenFrame">
            <main class="callbar" id="callbar">
                <main class="usercall">                            
                    <main class="usercall2" id="users_panel">
                        <img src="midia/guest.jpg" alt="guest">
                        
                            <div id="muted_icon" type="submit" name="emojis" class="mute"><i class="fas fa-microphone-slash"></i>
                            </div>
                    </main> 
                    <main class="usercall2" id="video_panel">
                    <main class="usercall3" id="video_container"></main>
                    </main>                                            
        </main>
                
                <main class="callbuttons">
                    
                    <input class="checkbox" id="recusecall" type="button" style="display: none;"/>

                    <label id="turnoff_call" for="recusecall" class="recusecall">
                        <i class="fas fa-phone-slash"></i>
                    </label>            

                    <input onclick="mutevid()" class="videobox" id="video" type="checkbox" style="display: none;"/>

                    <label class="video" id="icon_vid" for="video">
                        <div class="novideobar"></div>
                            <i class="fas fa-video"></i>
                    </label>

                    <input onclick="mutemic()" class="micbox" id="mic" type="checkbox" style="display: none;"/>

                    <label id="icon_mic" for="mic" class="mic">
                        
                        
                        <div class="nomicbar"></div>
                        
                        
                            <i class="fas fa-microphone"></i>

                        
                            
                        </label>

                        <input class="micbox" type="checkbox" style="display: none;"/>

                    <input class="configbox" id="config" type="checkbox" style="display: none;"/>
                   
                   <label for="config" class="config">
                        <div class="iconfig"><i class="fas fa-cog"></i></div>
                        <div id="menu-configs" class="menu-config">
                            <ul class="menu-cam"> <p><i class="fas fa-video"></i><?php if($country == "Brazil") { echo("Webcam selecionada:"); } else { echo("Selected webcam:"); } ?></p>
                                <input class="menu-configbox" id="menu-configbox" type="checkbox" style="display: none;"/>
                                
                                <label class="menuconfigbox" for="menu-configboxs">
                                    <i class="fas fa-chevron-left"></i>
                                </label>


                                <li >
                                    <main id="cam-configli" class="config-cam">
                                        <div class="dispositivo-cam">
                                            <p style="
                                            font-size: 13px;
                                            margin-top: 7px;
                                            " id="cam-options"></p>
                                            <section style="display: inline-block;" class="checkbox-wrapper">
                                                <label for="radio" class="radio-label"></label>
                                            </section>
                                        </div>
                                    
                            
                                    </main>
                            
                                </li>
                            </ul>
                            <ul> <p><i class="fas fa-microphone"></i><?php 
            if($country == "Brazil") {
                echo ("Microfone selecionado:");
            } else {
                echo ("Selected microphone:");
            }
            ?></p>

                                <input class="menu-configbox2" id="menu-configbox2" type="checkbox" style="display: none;"/>

                                
                                <label class="menuconfigbox2" for="menu-configbox2">
                                    <i class="fas fa-chevron-left"></i>
                                </label>
                                <li>
                                    <main class="config-mic">
                                        <div class="dispositivo-mic">
                                            <p style="
                                            font-size: 13px;
                                            margin-top: 7px;
                                            " id="mic-options"></p>
                                            <section style="display: inline-block;" class="checkbox-wrapper2">
                                                <label for="radio2" class="radio-label2"></label>
                                            </section>
                                        </div>
                                        
                                    </main>
                                </li>
                            </ul>
                        </div>
                        
                        
                            
                    </label>

                </main>


            </main>
            <main id="chat" class="chat2" style="word-wrap: break-word;">
                           <?php 
            include('specialphp/ChatReconstructorProcessator.php');
            ?>
            </main>
            <div style="width: 100%; display: block;" id="typing_on"></div>
        <main class="digitar">

            <input class="emojibox" type="checkbox" />

                    <script>
                        $(document).ready(function() {
                            window.addEventListener("keydown", checkKeyPress, false);
                            function checkKeyPress(key) {
                                if (key.keyCode == "27") {
                                    $("#menu-emojis").css("display", "none");
                                }
                            }
                            $("#chat").click(function() {
                                $("#menu-emojis").removeClass("emoji-active");
                                $("#menu-emojis").addClass("emoji");
                            });
                            $('#emoji').click(function () {
                                $(this).toggleClass("emoji-active");
                                $("#menu-emojis").toggleClass("emoji-active");
                            });
                            });
                    </script>
                   
                    <label for="emoji" class="emoji">
                        <div class="iemoji"><i id="emoji" title="Emojis" class="far fa-laugh-squint"></i></div>
                    </label>
                 <div id="menu-emojis" onmouseenter="returning3()" onmouseleave="returning2()" class="menu-emojis">
                    <span onclick="emoji1()">😀</span>
                    <span onclick="emoji2()">😃</span>
                    <span onclick="emoji3()">😄</span>
                        <span onclick="emoji4()">😁</span>
                    <span onclick="emoji5()">😆</span>
                    <span onclick="emoji6()">😅</span>
                    <span onclick="emoji7()">😂</span>
                    <span onclick="emoji8()">🤣</span>
                    <span onclick="emoji9()">😊</span>
                    <span onclick="emoji10()">😇</span>
                    <span onclick="emoji11()">🙂</span>
                    <span onclick="emoji12()">🙃</span>
                    <span onclick="emoji13()">😉</span>
                    <span onclick="emoji14()">😌</span>
                    <span onclick="emoji15()">😍</span>
                    <span onclick="emoji16()">🥰</span>
                    <span onclick="emoji17()">😘</span>
                    <span onclick="emoji18()">😗</span>
                    <span onclick="emoji19()">😙</span>
                    <span onclick="emoji20()">😚</span>
                    <span onclick="emoji21()">😋</span>
                    <span onclick="emoji22()">😛</span>
                    <span onclick="emoji23()">😝</span>
                    <span onclick="emoji24()">😜</span>
                    <span onclick="emoji25()">🤪</span>
                    <span onclick="emoji26()">🤨</span>
                    <span onclick="emoji27()">🧐</span>
                    <span onclick="emoji28()">🤓</span>
                    <span onclick="emoji29()">😎</span>
                    <span onclick="emoji30()">🤩</span>
                    <span onclick="emoji31()">🥳</span>
                    <span onclick="emoji32()">😏</span>
                    <span onclick="emoji33()">😒</span>
                    <span onclick="emoji34()">😞</span>
                    <span onclick="emoji35()">😔</span>
                    <span onclick="emoji36()">😟</span>
                    <span onclick="emoji37()">😕</span>
                    <span onclick="emoji38()">🙁</span>
                    <span onclick="emoji39()">☹️</span>
                    <span onclick="emoji40()">😣</span>
                    <span onclick="emoji41()">😖</span>
                    <span onclick="emoji42()">😫</span>
                    <span onclick="emoji43()">😩</span>
                    <span onclick="emoji44()">🥺</span>
                    <span onclick="emoji45()">😢</span>
                    <span onclick="emoji46()">😭</span>
                    <span onclick="emoji47()">😤</span>
                    <span onclick="emoji48()">😠</span>
                    <span onclick="emoji49()">😡</span>
                    <span onclick="emoji50()">🤬</span>
                    <span onclick="emoji51()">🤯</span>
                    <span onclick="emoji52()">😳</span>
                    <span onclick="emoji53()">🥵</span>
                    <span onclick="emoji54()">🥶</span>
                    <span onclick="emoji55()">😱</span>
                    <span onclick="emoji56()">😨</span>
                    <span onclick="emoji57()">😰</span>
                    <span onclick="emoji58()">😥</span>
                    <span onclick="emoji59()">😓</span>
                    <span onclick="emoji60()">🤗</span>
                    <span onclick="emoji61()">🤔</span>
                    <span onclick="emoji62()">🤭</span>
                    <span onclick="emoji63()">🤫</span>
                    <span onclick="emoji64()">🤥</span>
                    <span onclick="emoji65()">😶</span>
                    <span onclick="emoji66()">😐</span>
                    <span onclick="emoji67()">😑</span>
                    <span onclick="emoji68()">😬</span>
                    <span onclick="emoji69()">🙄</span>
                    <span onclick="emoji70()">😯</span>
                    <span onclick="emoji71()">😦</span>
                    <span onclick="emoji72()">😧</span>
                    <span onclick="emoji73()">😮</span>
                    <span onclick="emoji74()">😲</span>
                    <span onclick="emoji75()">🥱</span>
                    <span onclick="emoji76()">😴</span>
                    <span onclick="emoji77()">🤤</span>
                    <span onclick="emoji78()">😪</span>
                    <span onclick="emoji79()">😵</span>
                    <span onclick="emoji80()">🤐</span>
                    <span onclick="emoji81()">🥴</span>
                    <span onclick="emoji82()">🤢</span>
                    <span onclick="emoji83()">🤮</span>
                    <span onclick="emoji84()">🤧</span>
                    <span onclick="emoji85()">😷</span>
                    <span onclick="emoji86()">🤒</span>
                    <span onclick="emoji87()">🤕</span>
                    <span onclick="emoji88()">🤑</span>
                    <span onclick="emoji89()">🤠</span>
                    <span onclick="emoji90()">😈</span>
                    <span onclick="emoji91()">👿</span>
                    <span onclick="emoji92()">👹</span>
                    <span onclick="emoji93()">👺</span>
                    <span onclick="emoji94()">🤡</span>
                    <span onclick="emoji95()">💩</span>
                    <span onclick="emoji96()">👻</span>
                    <span onclick="emoji97()">💀</span>
                    <span onclick="emoji98()">☠️</span>
                    <span onclick="emoji99()">👽</span>
                    <span onclick="emoji100()">👾</span>
                    <span onclick="emoji101()">🤖</span>
                    <span onclick="emoji102()">🎃</span>
                    <span onclick="emoji103()">😺</span>
                    <span onclick="emoji104()">😸</span>
                    <span onclick="emoji105()">😹</span>
                    <span onclick="emojiE1()">😻</span>
                    <span onclick="emojiE2()">😼</span>
                    <span onclick="emojiE3()">😽</span>
                    <span onclick="emojiE4()">🙀</span>
                    <span onclick="emojiE5()">😿</span>
                    <span onclick="emojiE6()">😾</span>
                    <span onclick="emojiE7()">👋</span>
                    <span onclick="emojiE8()">🤚</span>
                    <span onclick="emojiE9()">🖐</span>
                    <span onclick="emoji106()">✋</span>
                    <span onclick="emojiE10()">🖖</span>
                    <span onclick="emojiE13()">👌</span>
                    <span onclick="emojiE14()">🤏</span>
                    <span onclick="emojiE15()">✌️</span>
                    <span onclick="emojiE16()">🤞</span>
                    <span onclick="emojiE17()">🤟</span>
                    <span onclick="emojiE18()">🤘</span>
                    <span onclick="emojiE19()">🤙</span>
                    <span onclick="emojiE20()">👈</span>
                    <span onclick="emojiE21()">👉</span>
                    <span onclick="emojiE22()">👆</span>
                    <span onclick="emojiE23()">🖕</span>
                    <span onclick="emojiE24()">👇</span>
                    <span onclick="emojiE25()">☝️</span>
                    <span onclick="emojiE26()">👍</span>
                    <span onclick="emojiE27()">👎</span>
                    <span onclick="emojiE28()">✊</span>
                    <span onclick="emojiE29()">👊</span>
                    <span onclick="emojiE30()">🤛</span>
                    <span onclick="emoji107()">🤜</span>
                    <span onclick="emoji108()">👏</span>
                    <span onclick="emoji109()">🙌</span>
                    <span onclick="emoji110()">👐</span>
                    <span onclick="emoji111()">🤲</span>
                    <span onclick="emoji112()">🤝</span>
                    <span onclick="emoji113()">🙏</span>
                    <span onclick="emoji114()">✍️</span>
                    <span onclick="emoji115()">💅</span>
                    <span onclick="emoji116()">🤳</span>
                    <span onclick="emoji117()">💪</span>
                    <span onclick="emoji118()">🦾</span>
                    <span onclick="emoji119()">🦵</span>
                    <span onclick="emoji120()">🦿</span>
                    <span onclick="emoji121()">🦶</span>
                    <span onclick="emoji122()">👣</span>
                    <span onclick="emoji123()">👂</span>
                    <span onclick="emoji124()">🦻</span>
                    <span onclick="emoji125()">👃</span>
                    <span onclick="emoji126()">🧠</span>
                    <span onclick="emoji127()">🦷</span>
                    <span onclick="emoji128()">🦴</span>
                    <span onclick="emoji129()">👀</span>
                    <span onclick="emoji130()">👁</span>
                    <span onclick="emoji131()">👅</span>
                    <span onclick="emoji132()">👄</span>
                    <span onclick="emoji133()">💋</span>
                    <span onclick="emoji134()">🩸</span>
                    <span onclick="emoji135()">👶</span>
                    <span onclick="emoji136()">👧</span>
                    <span onclick="emoji137()">🧒</span>
                    <span onclick="emoji138()">👦</span>
                    <span onclick="emoji139()">👩</span>
                    <span onclick="emoji140()">🧑</span>
                    <span onclick="emoji141()">👨</span>
                                <span onclick="emoji142()">👩‍🦱</span>
                    <span onclick="emoji143()">🧑‍🦱</span>
                    <span onclick="emoji144()">👨‍🦱</span>
                    <span onclick="emoji145()">👩‍🦰</span>
                    <span onclick="emoji146()">🧑‍🦰</span>
                    <span onclick="emoji147()">👨‍🦰</span>
                    <span onclick="emoji148()">👱‍♀️</span>
                    <span onclick="emoji149()">👱</span>
                    <span onclick="emoji150()">👩‍🦳</span>
                    <span onclick="emoji151()">🧑‍🦳</span>
                    <span onclick="emoji152()">👨‍🦳</span>
                    <span onclick="emoji153()">👩‍🦲</span>
                    <span onclick="emoji154()">🧑‍🦲</span>
                                <span onclick="emoji155()">👨‍🦲</span>
                    <span onclick="emoji156()">🧔</span>
                    <span onclick="emoji157()">👵</span>
                    <span onclick="emoji158()">🧓</span>
                    <span onclick="emoji159()">👴</span>
                    <span onclick="emoji160()">👲</span>
                    <span onclick="emoji161()">👳‍♀️</span>
                    <span onclick="emoji162()">👳</span>
                    <span onclick="emoji163()">👳‍♂️</span>
                    <span onclick="emoji164()">🧕</span>
                    <span onclick="emoji165()">👮‍♀️</span>
                    <span onclick="emoji166()">👮</span>
                    <span onclick="emoji167()">👮‍♂️</span>
                    <span onclick="emoji168()">👷‍♀️</span>
                                <span onclick="emoji169()">👷</span>
                    <span onclick="emoji170()">👷‍♂️</span>
                    <span onclick="emoji171()">💂‍♀️</span>
                    <span onclick="emoji172()">💂</span>
                    <span onclick="emoji173()">💂‍♂️</span>
                    <span onclick="emoji174()">🕵️‍♀️</span>
                    <span onclick="emoji175()">🕵️</span>
                    <span onclick="emoji176()">🕵️‍♂️</span>
                    <span onclick="emoji177()">👩‍⚕️</span>
                    <span onclick="emoji178()">🧑‍⚕️</span>
                    <span onclick="emoji179()">👨‍⚕️</span>
                    <span onclick="emoji180()">👩‍🌾</span>
                    <span onclick="emoji181()">🧑‍🌾</span>
                    <span onclick="emojiEE2()">👨‍🌾</span>
                                <span onclick="emoji183()">👩‍🍳</span>
                    <span onclick="emojiEE3()">👩‍🍳</span>
                    <span onclick="emojiEE4()">🧑‍🍳</span>
                    <span onclick="emojiEE5()">👨‍🍳</span>
                    <span onclick="emojiEE6()">👩‍🎓</span>
                    <span onclick="emojiEE7()">🧑‍🎓</span>
                    <span onclick="emojiEE8()">👨‍🎓</span>
                    <span onclick="emojiEE9()">👩‍🎤</span>
                    <span onclick="emojiEE10()">🧑‍🎤</span>
                    <span onclick="emojiEE1()">👨‍🎤</span>
                    <span onclick="emojiEE12()">👩‍🏫</span>
                    <span onclick="emojiEE13()">🧑‍🏫</span>
                    <span onclick="emojiEE14()">👨‍🏫</span>
                    <span onclick="emojiEE15()">👩‍🏭</span>
                                <span onclick="emoji197()">👨‍🏭</span>
                    <span onclick="emojiEE16()">🧑‍🏭</span>
                    <span onclick="emojiEE17()">👨‍🏭</span>
                    <span onclick="emojiEE18()">👩‍💻</span>
                    <span onclick="emojiEE19()">🧑‍💻</span>
                    <span onclick="emojiEE20()">👨‍💻</span>
                    <span onclick="emojiEE21()">👩‍💼</span>
                    <span onclick="emojiEE22()">🧑‍💼</span>
                    <span onclick="emojiEE23()">👨‍💼</span>
                    <span onclick="emojiEE24()">👩‍🔧</span>
                    <span onclick="emojiEE25()">🧑‍🔧</span>
                    <span onclick="emojiEE26()">👨‍🔧</span>
                    <span onclick="emojiEE27()">👩‍🔬</span>
                    <span onclick="emojiEE28()">🧑‍🔬</span>
                    <span onclick="emojiEE29()">👨‍🔬</span>
                    <span onclick="emojiEE30()">👩‍🎨</span>
                                <span onclick="emoji211()">🧑‍🎨</span>
                    <span onclick="emoji182()">👨‍🎨</span>
                    <span onclick="emoji183()">👩‍🚒</span>
                    <span onclick="emoji184()">🧑‍🚒</span>
                    <span onclick="emoji185()">👨‍🚒</span>
                    <span onclick="emoji186()">👩‍✈️</span>
                    <span onclick="emoji187()">🧑‍✈️</span>
                    <span onclick="emoji188()">👨‍✈️</span>
                    <span onclick="emoji189()">👩‍🚀</span>
                    <span onclick="emoji190()">🧑‍🚀</span>
                    <span onclick="emoji191()">👨‍🚀</span>
                    <span onclick="emoji192()">👩‍⚖️</span>
                    <span onclick="emoji193()">🧑‍⚖️</span>
                    <span onclick="emoji194()">👨‍⚖️</span>
                    <span onclick="emoji195()">👰‍♀️</span>
                    <span onclick="emoji196()">👰</span>
                    <span onclick="emoji197()">👰‍♂️</span>
                    <span onclick="emoji198()">🤵‍♀️</span>
                    <span onclick="emoji199()">🤵</span>
                    <span onclick="emoji200()">🤵‍♂️</span>
                    <span onclick="emoji201()">👸</span>
                    <span onclick="emoji202()">🤴</span>
                    <span onclick="emoji203()">🦸‍♀️</span>
                    <span onclick="emoji204()">🦸</span>
                    <span onclick="emoji205()">🦸‍♂️</span>
                    <span onclick="emoji206()">🦹‍♀️</span>
                    <span onclick="emoji207()">🦹</span>
                    <span onclick="emoji208()">🦹‍♂️</span>
                    <span onclick="emoji209()">🤶</span>
                    <span onclick="emoji210()">🧑‍🎄</span>
                    <span onclick="emoji21_1()">🎅</span>
                    <span onclick="emoji212()">🧙‍♀️</span>
                    <span onclick="emoji213()">🧙</span>
                    <span onclick="emoji214()">🧙‍♂️</span>
                    <span onclick="emoji215()">🧝‍♀️</span>
                    <span onclick="emoji216()">🧝</span>
                    <span onclick="emoji217()">🧝‍♂️</span>
                    <span onclick="emoji218()">🧛‍♀️</span>
                    <span onclick="emoji219()">🧛</span>
                    <span onclick="emoji220()">🧛‍♂️</span>
                    <span onclick="emoji221()">🧟‍♀️</span>
                    <span onclick="emoji222()">🧟</span>
                                <span onclick="emoji223()">🧟‍♂️</span>
                    <span onclick="emoji224()">🧞‍♀️</span>
                    <span onclick="emoji225()">🧞</span>
                    <span onclick="emoji226()">🧞‍♂️</span>
                    <span onclick="emoji227()">🧜‍♀️</span>
                    <span onclick="emoji228()">🧜</span>
                    <span onclick="emoji229()">🧜‍♂️</span>
                    <span onclick="emoji230()">🧚‍♀️</span>
                    <span onclick="emoji231()">🧚</span>
                    <span onclick="emoji232()">🧚‍♂️</span>
                    <span onclick="emoji233()">👼</span>
                    <span onclick="emoji234()">🤰</span>
                    <span onclick="emoji235()">🤱</span>
                    <span onclick="emoji236()">👩‍🍼</span>
                    <span onclick="emoji237()">🧑‍🍼</span>
                    <span onclick="emoji238()">👨‍🍼</span>
                    <span onclick="emoji239()">🙇‍♀️</span>
                    <span onclick="emoji240()">🙇</span>
                    <span onclick="emoji241()">🙇‍♂️</span>
                    <span onclick="emoji242()">💁‍♀️</span>
                    <span onclick="emoji243()">💁</span>
                    <span onclick="emoji244()">💁‍♂️</span>
                    <span onclick="emoji245()">🙅‍♀️</span>
                    <span onclick="emoji246()">🙅‍♀️</span>
                    <span onclick="emoji247()">🙅‍♂️</span>
                    <span onclick="emoji248()">🙆‍♀️</span>
                    <span onclick="emoji249()">🙆</span>
                    <span onclick="emoji250()">🙆‍♂️</span>
                                <span onclick="emoji251()">🙋‍♀️</span>
                    <span onclick="emoji252()">🙋</span>
                    <span onclick="emoji253()">🙋‍♂️</span>
                    <span onclick="emoji254()">🧏‍♀️</span>
                    <span onclick="emoji255()">🧏</span>
                    <span onclick="emoji256()">🧏‍♂️</span>
                    <span onclick="emoji257()">🤦‍♀️</span>
                    <span onclick="emoji258()">🤦</span>
                    <span onclick="emoji259()">🤦‍♂️</span>
                    <span onclick="emoji260()">🤷‍♀️</span>
                    <span onclick="emoji261()">🤷</span>
                    <span onclick="emoji262()">🤷‍♂️</span>
                    <span onclick="emoji263()">🙎‍♀️</span>
                    <span onclick="emoji264()">🙎</span>
                    <span onclick="emoji265()">🙎‍♂️</span>
                    <span onclick="emoji266()">🙍‍♀️</span>
                    <span onclick="emoji267()">🙍‍♀️</span>
                    <span onclick="emoji268()">🙍‍♂️</span>
                    <span onclick="emoji269()">💇‍♀️</span>
                    <span onclick="emoji270()">💇</span>
                    <span onclick="emoji271()">💇‍♂️</span>
                    <span onclick="emoji272()">💆‍♀️</span>
                    <span onclick="emoji273()">💆</span>
                    <span onclick="emoji274()">💆‍♂️</span>
                    <span onclick="emoji275()">🧖‍♀️</span>
                    <span onclick="emoji276()">🧖</span>
                    <span onclick="emoji277()">🧖‍♂️</span>
                    <span onclick="emoji278()">💅</span>
                                <span onclick="emoji279()">🤳</span>
                    <span onclick="emoji280()">💃</span>
                    <span onclick="emoji281()">🕺</span>
                    <span onclick="emoji282()">👯‍♀️</span>
                    <span onclick="emoji283()">👯</span>
                    <span onclick="emoji284()">👯‍♂️</span>
                    <span onclick="emoji285()">🕴</span>
                    <span onclick="emoji286()">👩‍🦽</span>
                    <span onclick="emoji287()">🧑‍🦽</span>
                    <span onclick="emoji288()">👨‍🦽</span>
                    <span onclick="emoji289()">👩‍🦼</span>
                    <span onclick="emoji290()">🧑‍🦼</span>
                    <span onclick="emoji291()">👨‍🦼</span>
                    <span onclick="emoji292()">🚶‍♀️</span>
                    <span onclick="emoji293()">🚶</span>
                    <span onclick="emoji294()">🚶‍♂️</span>
                    <span onclick="emoji295()">👩‍🦯</span>
                    <span onclick="emoji296()">🧑‍🦯</span>
                    <span onclick="emoji297()">👨‍🦯</span>
                    <span onclick="emoji298()">🧎‍♀️</span>
                    <span onclick="emoji299()">🧎</span>
                    <span onclick="emoji300()">🧎‍♂️</span>
                    <span onclick="emoji301()">🏃‍♀️</span>
                    <span onclick="emoji302()">🏃</span>
                    <span onclick="emoji303()">🏃‍♂️</span>
                    <span onclick="emoji304()">🧍‍♀️</span>
                    <span onclick="emoji305()">🧍</span>
                    <span onclick="emoji306()">🧍‍♂️</span>
                                <span onclick="emoji307()">👭</span>
                    <span onclick="emoji308()">🧑‍🤝‍🧑</span>
                    <span onclick="emoji309()">👬</span>
                    <span onclick="emoji310()">👫</span>
                    <span onclick="emoji311()">👩‍❤️‍👩</span>
                    <span onclick="emoji312()">💑</span>
                    <span onclick="emoji313()">👨‍❤️‍👨</span>
                    <span onclick="emoji314()">👩‍❤️‍👨</span>
                    <span onclick="emoji315()">👩‍❤️‍💋‍👩</span>
                    <span onclick="emoji316()">💏</span>
                    <span onclick="emoji317()">👨‍❤️‍💋‍👨</span>
                    <span onclick="emoji318()">👩‍❤️‍💋‍👨</span>
                    <span onclick="emoji319()">👪</span>
                    <span onclick="emoji320()">👨‍👩‍👦</span>
                    <span onclick="emoji321()">👨‍👩‍👧</span>
                    <span onclick="emoji322()">👨‍👩‍👧‍👦</span>
                    <span onclick="emoji323()">👨‍👩‍👦‍👦</span>
                    <span onclick="emoji324()">👨‍👩‍👧‍👧</span>
                    <span onclick="emoji325()">👨‍👨‍👦</span>
                    <span onclick="emoji326()">👨‍👨‍👧</span>
                    <span onclick="emoji327()">👨‍👨‍👧‍👦</span>
                    <span onclick="emoji328()">👨‍👨‍👧‍👧</span>
                    <span onclick="emoji329()">👨‍👨‍👧‍👧</span>
                    <span onclick="emoji330()">👩‍👩‍👦</span>
                    <span onclick="emoji331()">👩‍👩‍👧</span>
                    <span onclick="emoji33_2()">👩‍👩‍👧‍👦</span>
                    <span onclick="emoji332()">👩‍👩‍👦‍👦</span>
                    <span onclick="emoji333()">👩‍👩‍👧‍👧</span>
                                <span onclick="emoji334()">👩‍👩‍👧‍👧</span>
                    <span onclick="emoji335()">👨‍👦‍👦</span>
                    <span onclick="emoji336()">👨‍👧</span>
                    <span onclick="emoji337()">👨‍👧‍👦</span>
                    <span onclick="emoji338()">👨‍👧‍👧</span>
                    <span onclick="emoji339()">👩‍👦</span>
                    <span onclick="emoji340()">👩‍👦‍👦</span>
                    <span onclick="emoji341()">👩‍👧</span>
                    <span onclick="emoji342()">👩‍👧‍👦</span>
                    <span onclick="emoji343()">👩‍👧‍👧</span>
                    <span onclick="emoji344()">🗣</span>
                    <span onclick="emoji345()">👤</span>
                    <span onclick="emoji346()">👥</span>
                    <span onclick="emoji347()">🧔‍♀️</span>
                    <span onclick="emoji348()">🧔🏻‍♀️</span>
                    <span onclick="emoji349()">🧔🏼‍♀️</span>
                    <span onclick="emoji350()">🧔🏽‍♀️</span>
                    <span onclick="emoji351()">🧔🏾‍♀️</span>
                    <span onclick="emoji352()">🧔🏿‍♀️</span>
                    <span onclick="emoji353()">🧔🏿‍♀️</span>
                    <span onclick="emoji354()">🧔🏻‍♂️</span>
                    <span onclick="emoji355()">🧔🏼‍♂️</span>
                    <span onclick="emoji356()">🧔🏽‍♂️</span>
                    <span onclick="emoji357()">🧔🏾‍♂️</span>
                    <span onclick="emoji358()">🧔🏿‍♂️</span>
            </div>
            <form method="POST" target="hiddenFrame">
            <div style="margin-left: 50px;" class="input-digitar" id="input-type">
                <input id="mensagem" contenteditable="true" disabled name="mensagem" style="margin-left: 5px; font-size: 15px;" class="input-digitar" onclick="returning()" onmouseenter="returning2()" autocomplete="off" type="text" placeholder="<?php 
            if($country == "Brazil") {
                echo ("Isso é uma representação de uma sala que já foi excluída");
            } else {
                echo ("This is a representation of a deleted room");
            }
            ?>">
            <button id="hidden_btn" name="hidden_btn" hidden></button>
            </div>
                        </form>
            <!--BOTÃO CALL-->
            <input class="input-call" id="callbutton"  type="button" style="display: none;" name="iconcall"> 
            
            
            <label id="call_btn" class="callbutton" for="callbutton">
                <i title="<?php 
            if($country == "Brazil") {
                echo ("Ligar");
            } else {
                echo ("Call");
            }
            ?>" class="fas fa-phone-alt" id="call_trigger_function"></i>
            </label>

            <script>
            var mobChanger = 0;
                $(document).ready(function() {
                    $('#callbutton').click(function () {
                        $.ajax({
                            type: "GET",
                            url: "callBtn.php" ,
                        });
                        $("#callbar").css("display", "initial");
                            $("#chat").css("height", "342px");
                            return mobChanger = 1;
                    });
                    $('#callbutton2').click(function () {
                        $.ajax({
                            type: "GET",
                            url: "callBtn.php" ,
                        });
                        $("#callbar").css("display", "initial");
                        if(mobChanger == 4) {
                            $("#chat").css("height", "740px");
                        } else {
                            $("#chat").css("height", "342px");
                            return mobChanger = 2;
                        }
                    });
                    $('#callbutton3').click(function () {
                        $.ajax({
                            type: "GET",
                            url: "callBtn.php" ,
                        });
                        $("#callbar").css("display", "initial");
                        if(mobChanger == 4) {
                            $("#chat").css("height", "440px");
                        } else {
                            $("#chat").css("height", "340px");
                            return mobChanger = 3;
                        }
                    });
                    $('#turnoff_call').click(function () {
                        $.ajax({
                            type: "GET",
                            url: "callturnoff.php" ,
                        });
                        $("#callbar").css("display", "none");
                        if( /Android|webOS|iPhone|iPad|Mac|Macintosh|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
                            $("#chat").css("height", "518px");
                        } else {
                            $("#chat").css("height", "498px"); 
                        } 
                    });
                });
           </script>

                                <input class="input-call2" onclick="appearcall2()" id="callbutton2" name="iconcall"  type="button" style="display: none;" name="iconcall"> 
                                            
                                            
                                <label id="call_btn" class="callbutton2" for="callbutton2">
                                    <i title="<?php 
            if($country == "Brazil") {
                echo ("Ligar");
            } else {
                echo ("Call");
            }
            ?>" class="fas fa-phone-alt" id="call_trigger_function"></i>
                                </label>

<script>
    $(document).ready(function() {
        $('#callbutton2').click(function () {
            $(this).toggleClass("callactive");
            $("#callbar").toggleClass("callactive");
                $("#chat").css("height", "392px");
        });
        });
    
</script>



<input class="input-call3" onclick="appearcall3()" id="callbutton3" type="button" style="display: none;" name="iconcall"> 
            
            
<label id="call_btn" class="callbutton3" for="callbutton3">
    <i class="fas fa-phone-alt" id="call_btn"></i>
</label>

<script>
    var iCall3 = 1;
    $(document).ready(function() {
        $('#callbutton3').click(function () {
            $(this).toggleClass("callactive");
            $("#callbar").toggleClass("callactive");
            if(iCall3 == 1) {
            $("#chat").css("height", "322px");
            return iCall3 = 0;
            } else {
                if(mobChange == 4) {
            $("#chat").css("height", "480px");
                } else {
                    $("#chat").css("height", "380px");   
                }
            return iCall3 = 1;
            }            
        });
        });
</script>
            <input class="input-img" id="emojisfoto"  type="button" style="display: none;" name="iconcall"> 
            <label class="emojisfoto" for="emojisfoto">
                <label for="drag_input"><i title="<?php 
            if($country == "Brazil") {
                echo ("Enviar arquivo");
            } else {
                echo ("Send file");
            }
            ?>" id="drag_icon" onclick="dragshow()" class="far fa-file-image"></i></label>
            </label>

            <input class="input-user" id="userbutton"  type="button" style="display: none;" name="iconcall"> 
            
            <form method="POST" target="fakeFrame" enctype="multipart/form-data">
            <input type="file" id="input_img_changer" hidden name="imgchanger" onchange="this.form.submit()">
            </form>
            
            <label class="emojisfoto-perfil" for="input_img_changer">
                <i title="<?php 
            if($country == "Brazil") {
                echo ("Mudar foto de perfil");
            } else {
                echo ("Change profile photo");
            }
            ?>" class="far fa-user"></i>
            </label>
            <label for="drag_input" class="emojisfoto-perfil">
            <i id="send-file-mobile" style="display: none; margin-left: 280px;" class="fas fa-paperclip"></i>
            </label>
            <label for="hidden_btn" class="emojisfoto-perfil">
            <i id="send-msg-mobile" style="display: none;" class="far fa-paper-plane"></i>
            </label>
        </main>      
        </form>
    </main>
    <script src="javascript/MenuChat.js"></script>
    <script src="javascript/scroller.js"></script>
    <script src="javascript/FileProcessator.js"></script>
    <script src="javascript/CallRequirements.js"></script>
    <script src="javascript/ajaxTyping.js"></script>
    <script src="javascript/ajaxTyper.js"></script>
    <script src="javascript/inputSuggestions.js"></script>
    <script src="javascript/inputControler.js"></script>
    <script src="javascript/autocomplete.js"></script>
    <script type="text/javascript" src="https://api.bistri.com/bistri.conference.min.js"></script>
    <script>
    //Tive que botar o script aqui porque por algum motivo o site não conseguia ler o .js
//Variáveis
const msg = document.querySelector("#mensagem");
const call_icon = document.querySelector(".callbutton3")
const img_icon = document.querySelector("#drag_icon");
const file_icon = document.querySelector(".emojisfoto-perfil");
const msgmb_icon = document.querySelector("#send-msg-mobile");
const filemb_icon = document.querySelector("#send-file-mobile");
var iIC = 0;

//Função para aprimorar a função sleep()
function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

//Funções que bloqueiam a input de ser apagada quando a tecla enter é apertada caso o usuário não esteja digitando nela.
window.addEventListener("keydown", checkKeyPress, false);
function returning() {
    return iIC = 1;
}

function returning2() {
    return iIC = 1;
}

function returning3() {
    return iIC = 0;
}

//Função pra evitar Self-XSS
function escapeHtml(text) {
    return text
        .replace(/&/g, "&amp;")
        .replace(/</g, "&lt;")
        .replace(/>/g, "&gt;")
        .replace(/"/g, "&quot;")
        .replace(/'/g, "&#039;");
}

//Função responsável por limpar a input da mensagem e mostrar uma mensagem temporária quando o usuário apertar a tecla Enter
function checkKeyPress(key){
    if(iIC == 1) {
        if (key.keyCode == "13") {
            sleep(100).then(() => { msg.value = "" });
            var passedInput = escapeHtml(msg.value);
            var passedValue = document.getElementById('chat').innerHTML
            var hour = new Date().getHours();
            var minutes = new Date().getMinutes();
            if(passedInput != "") {
            sleep(50).then(() => { document.getElementById('chat').innerHTML = document.getElementById('chat').innerHTML + "<main style='margin-top: 40px;' class='menssagemfirst2'><main style='border-top-right-radius: 10px;' class='menssagem2'><p style='font-family: Arial; margin-top: -40px;'>"+ msg.value +"</p></main><h2>"+ hour +":"+ minutes +"</h2></main>" });
            sleep(100).then(() => { document.getElementById('chat').innerHTML = passedValue + "<main style='margin-top: 40px;' class='menssagemfirst2'><main style='border-top-right-radius: 10px;' class='menssagem2'><p style='font-family: Arial; margin-top: -40px;'>"+ passedInput +"</p></main><h2>"+ hour +":"+ minutes +"</h2></main>" });
            sleep(200).then(() => { document.getElementById('chat').innerHTML = passedValue + "<main style='margin-top: 40px;' class='menssagemfirst2'><main style='border-top-right-radius: 10px;' class='menssagem2'><p style='font-family: Arial; margin-top: -40px;'>"+ passedInput +"</p></main><h2>"+ hour +":"+ minutes +"</h2></main>" });
            sleep(300).then(() => { document.getElementById('chat').innerHTML = passedValue + "<main style='margin-top: 40px;' class='menssagemfirst2'><main style='border-top-right-radius: 10px;' class='menssagem2'><p style='font-family: Arial; margin-top: -40px;'>"+ passedInput +"</p></main><h2>"+ hour +":"+ minutes +"</h2></main>" });
            sleep(400).then(() => { document.getElementById('chat').innerHTML = passedValue + "<main style='margin-top: 40px;' class='menssagemfirst2'><main style='border-top-right-radius: 10px;' class='menssagem2'><p style='font-family: Arial; margin-top: -40px;'>"+ passedInput +"</p></main><h2>"+ hour +":"+ minutes +"</h2></main>" });       
            }
        }
    }
}

//Função para detectar se algo foi escrito na input para esconder os ícones ao lado no mobile
function hideIcons() {
    var input_value = document.querySelector("#mensagem").value;
    if(input_value != "") {
        call_icon.style.display = 'none';
        img_icon.style.display = 'none';
        file_icon.style.display = 'none';
        msgmb_icon.style.display = 'initial';
        filemb_icon.style.display = 'initial';
        msg.style.width = '220px'
    } else {
        call_icon.style.display = 'initial';
        img_icon.style.display = 'initial';
        file_icon.style.display = 'initial';
        msgmb_icon.style.display = 'none';
        filemb_icon.style.display = 'none';
        msg.style.width = 'initial'
    }
    setTimeout(hideIcons, 100);
}

//Função simples apenas pra limpar a input mensagem quando o usuário clicar no icone de envio
msgmb_icon.addEventListener("click", function() {
    sleep(100).then(() => {
        msg.value = "";
    });
    var passedInput = escapeHtml(msg.value);
    var passedValue = document.getElementById('chat').innerHTML
    var hour = new Date().getHours();
    var minutes = new Date().getMinutes();
    if(passedInput != "") {
    sleep(50).then(() => { document.getElementById('chat').innerHTML = document.getElementById('chat').innerHTML + "<main style='margin-top: 40px;' class='menssagemfirst2'><main style='border-top-right-radius: 10px;' class='menssagem2'><p style='font-family: Arial; margin-top: -40px;'>"+ msg.value +"</p></main><h2>"+ hour +":"+ minutes +"</h2></main>" });
    sleep(100).then(() => { document.getElementById('chat').innerHTML = passedValue + "<main style='margin-top: 40px;' class='menssagemfirst2'><main style='border-top-right-radius: 10px;' class='menssagem2'><p style='font-family: Arial; margin-top: -40px;'>"+ passedInput +"</p></main><h2>"+ hour +":"+ minutes +"</h2></main>" });
    sleep(200).then(() => { document.getElementById('chat').innerHTML = passedValue + "<main style='margin-top: 40px;' class='menssagemfirst2'><main style='border-top-right-radius: 10px;' class='menssagem2'><p style='font-family: Arial; margin-top: -40px;'>"+ passedInput +"</p></main><h2>"+ hour +":"+ minutes +"</h2></main>" });
    sleep(300).then(() => { document.getElementById('chat').innerHTML = passedValue + "<main style='margin-top: 40px;' class='menssagemfirst2'><main style='border-top-right-radius: 10px;' class='menssagem2'><p style='font-family: Arial; margin-top: -40px;'>"+ passedInput +"</p></main><h2>"+ hour +":"+ minutes +"</h2></main>" });
    sleep(400).then(() => { document.getElementById('chat').innerHTML = passedValue + "<main style='margin-top: 40px;' class='menssagemfirst2'><main style='border-top-right-radius: 10px;' class='menssagem2'><p style='font-family: Arial; margin-top: -40px;'>"+ passedInput +"</p></main><h2>"+ hour +":"+ minutes +"</h2></main>" });       
    }
});

if( /Android|webOS|iPhone|iPad|Mac|Macintosh|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
hideIcons();
}
    </script>
</body>
    </html>