<?php
include("conexao.php");
include('specialphp/RoomProcessator.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/chat31.css">
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
    <link rel="icon" type="image/png" sizes="192x192" href="favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <script src="javascript/ajaxParticipantsDuo.js"></script>
    <script src="javascript/ajaxPtcpNumber.js"></script>
    <script src="javascript/ajaxStatus.js"></script>
    <script src="javascript/ajaxTyper.js"></script>
    <script src="javascript/ajaxInput.js"></script>
    <script src="javascript/ajaxLink.js"></script>
    <script src="javascript/ajaxMembersAllowCC.js"></script>
    <script src="javascript/ajaxProfile2.js"></script>
    <script src="javascript/ajaxNameUpdate2.js"></script>
    <title>Fastalk</title>
</head>

<header>
    <div class="cabecalho">
        <h1>Fastalk <span style="color: lightblue"></span></h1>
    </div>
</header>


<body style="background-color: #141414;">
    <div class="user">
        <div onmousemove="showthis()" onclick="showthis()" onmouseout="hidethis()">
        <script>
            document.cookie = "id=<?php echo $id ?>"
        </script>
        <form target="hiddenFrame3" method="POST" enctype="multipart/form-data">
<input id="changeprofile" type="file" onchange="this.form.submit()" name="imgchanger" hidden/>
</form>
        <label for="changeprofile">
        <div id="changeph" onclick="normal()" class="changeimg">
            <br><br><br><i class="fa fa-plus"></i><br><p style="margin-left: 15px;">Alterar foto de perfil</p>
        </div>
        </label>
        <div>
            <form method="POST" target="filepost">
        <img id="profilephoto" style="height: 200px;" onclick="" draggable="false">        <div id="changeph" class="changeimg">
        <br><br><br><i type="submit" class="fa fa-plus"></i><br><p style="margin-left: 15px;">Alterar foto de perfil</p>
    </div></div></form>
        <script>
            var changeph = window.document.getElementById('changeph')
            function showthis() {
                changeph.style.display = 'initial'
            }
            function hidethis() {
                changeph.style.display = 'none'
            }

        </script>
        <?php include('specialphp/NameChangeColorProcessator.php'); while ($dado = $con->fetch_array()) { ?>
        <form method="POST" target="hiddenFrame3">
            <button style="background-color: rgba(11, 12, 11, 0.603); margin-left: -1px; width: 300px; height: 40px; border: none" name="changepm"> <h1 id="username" style="cursor: pointer;">
            </button></a></form>
            <div class="titulo" style="height: 40px;">
                <h1>Participantes <span id="ptcpnumber" style="color: white;"></span></h1>
            </div>
            <iframe name="hiddenFrame3" width="0" height="0" style="display: none;"></iframe>
            <form method="POST" target="hiddenFrame3">
                <div style="width: 298px;" class="participantes" id="ptcp" onload="ajax2();"> <?php echo " <p> <br> <p style='display: inline-block'> <img src='https://www.history.ox.ac.uk/sites/default/files/history/images/person/unknown-person-icon-4.jpg'>";
                     echo "<p>Carregando...</p>" ?> <br>
            </form>
    </div>
<?php } ?>
<?php
if ($row7 == 1) {
    echo ('<form method="POST"> <button style="margin-top: 215px"; name="delete" type="submit" class="red">Deletar Sala</button></form>');
} else {
    echo ('<form method="POST"> <button style="margin-top: 215px;" name="leave" type="submit" class="red">Sair da Sala</button></form>');
}
?>
    </div>
<div style="position: static" onload="ajax();" class="chat">

    <iframe name="hiddenFrame2" width="0" height="0" style="display: none;"></iframe>
    <form method="POST" target="hiddenFrame2">
        <div class="label"> <br>
            <div class="idsala"><br><p style="position: static; margin-top: -10px;">ID da sala: <span style="color: forestgreen"><?php echo ($id);
            if ($id == "1337") {
             echo (" 👨‍💻");
              }
              if ($id == "6666") {
               echo ("😈");
               }
               if ($id == "2020") {
               echo ("🤧");
                }
                if ($id == "1500") {
                echo (" 🇧🇷");
                 } ?></span></p></div>
                 <input id="link" hidden="true" value="https://fastalk.tk/sala.php?id=<?php echo ($id) ?>">
                </form>
                 <div>
                 <?php 
                if($adminROW == 1) {
                    echo ('<button onclick="appearconfig()" style="margin-left: 175px;" class="pubappear">Configurações</button>');
                }
                 ?>
                 <script>
                 var iac = 1;
                 function appearconfig() {
                    if (iac == 1) {
                        window.document.getElementById('configs').style.display = 'initial'
                        window.document.getElementById('createroom').style.display = 'none'
                        return iac = 0;
                    } else {
                        window.document.getElementById('configs').style.display = 'none'
                        return iac = 1;
                    }
                 }
                 </script>
                 </div>
                 <iframe name="hiddenFrame3" width="0" height="0" style="display: none;"></iframe>
                 <form method="POST" target="hiddenFrame3">
                 <script src="javascript/ajaxRoomStatus.js"></script>
                 <div style="display: none;" id="configs" class="configs">
                     <h1>Configurações da Sala</h1>
                     <h2 style="font-size: 20px; color: white;">Silenciar todos os membros</h2>
                     <span style='margin-left: 70px;' id="onlyadms"></span>
                     <h2 style="font-size: 20px; color: white">Permitir entradas na sala apenas via link de convite</h2>
                     <span style="margin-left: 70px;" id="linkpwd"></span>
                     <h2 style="font-size: 20px; color: white">Permitir que membros troquem a cor do nick</h2>
                     <span style="margin-left: 70px;" id="allowcolorchange"></span>
                     <h2 id="roomstatus"></h2>
                 </div>
                 <div id="createroom" style="display: none;" class="public">
                 <button class="pubopen" onclick="statuschanger()" title="Clique para alterar">Sala pública

                 <input name="roomname" autocomplete="off" placeholder="Nome da sua sala" class="check" type="text" style="width: 200px; margin-top: 20px">
                 <br>
                 <input name="roomtema" autocomplete="off" placeholder="Tema da sua sala (opcional)" class="check" type="text" style="width: 200px; margin-top: 20px">
                 <br>
                 <button class="createpub" onclick="disappearthis()" name="publicroom">Criar Sala Pública</button>
                </form>
                </div>
                <form method="POST" target="hiddenFrame2">

                <div style="margin-left: 380px; <?php if($adminROW == 1) { echo ("margin-top: 10px;"); } ?>position: absolute" class='invite'><button id="copiar" name="linkdeconvite" class="invite">Link de convite</button></div>
                 <?php
                $queryST = "SELECT * FROM `$id` where `Admin` = 'Sim'";
                $conST = $conexao->query($queryST);
                
                while($dadost = $conST->fetch_array()) {
                    $valorurl = $dadost['pwd'];
                }

                ?>
                 <script>
                     var btnchanger = window.document.getElementById('btnchanger')
                 var buttonlink = window.document.getElementById('copiar')
                 var createroom = window.document.getElementById('createroom')
                 var ch = 1;
                 var ai = 1;

                 function disappearthis() {
                     createroom.style.display = 'none'
                 }

                 function appearthis() {
                     if(ai == 1) {
                    createroom.style.display = 'initial'
                    sleep(1000)
                    window.document.getElementById('configs').style.display = 'none'
                    return ai = 0;
                     } else {
                         createroom.style.display = 'none'
                         return ai = 1;
                     }
                 }

                 function statuschanger() {
                     if(ch == 1) {
                    btnchanger.innerText = 'Pública'
                    btnchanger.style.color = 'green'
                    return ch = 0;
                        } else {
                            btnchanger.innerText = 'Privada'
                            btnchanger.style.color = 'orange'
                            return ch = 1;
                        }
                 }
                    var $temp = $("<input>");

                        $('#copiar').on('click', function() {
                            buttonlink.innerText = 'Link copiado!'
                            var $url = "https://fastalk.tk/sala.php?id=<?php echo($id); ?>&pwd=<?php echo ($valorurl); ?>"

                        $("body").append($temp);
                        $temp.val($url).select();
                        document.execCommand("copy");
                        $temp.remove();
                        })
                 </script>
            <?php if ($rowVERIFY == 1) {
                echo "<div class='cleanchat'><button style='margin-left: 350px;' name='cleanchat'>Limpar chat</button></div>";
            }
            ?>
        </div>
    </form>
    <div id="uploadhere" class="uploadhere" style="display: none">
        <h1><span style="font-size: 50px;">+</span><br>Arraste até aqui para upar seu arquivo</h1> <br>
        <h1 id="hangout" style="display: none; margin-left: 100px; color: red">Agora solte o botão do mouse!</h1>
    </div>
    <div id="chat" onclick="selecting()" class="live" ondrop="drop(event)" ondragover="appear(event)" ondragleave="disappear()" ondragend="disappear()">
        <p style="color: white">Carregando...</p>
        <script src="javascript/drop1.js"></script>
        <?php
        if (isset($_POST['cleanchat'])) {
            if($rowVrfy != 0) {
            $querycl = "UPDATE `$id` SET `mensagem` = '' WHERE `mensagem` != ''";
            $concl = mysqli_query($conexao, $querycl);

            $querycl2 = "UPDATE `$id` SET `img` = '' WHERE `img` != ''";
            $concl2 = mysqli_query($conexao, $querycl2);

            $queryANI = "UPDATE `$id` SET `anunciado` = '1' where `anunciado` = '0'";
			$resultANI = mysqli_query($conexao, $queryANI);
            }
        }
        ?>
    </div>
    <iframe name="hiddenFrame" width="0" height="0" style="display: none;"></iframe>
    <form method="POST" target="hiddenFrame">
        <div style="display: none" class="emojis" id="emoji">
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
        <script src="javascript/emoji.js"></script>
        <input id="mensagem" autocomplete="off" name="mensagem" placeholder="Escreva algo aqui...">
        <p class="typing" id="typing_on"><script src="javascript/ajaxTyping.js"></script></p>
        <i onclick="mostrar()" id='emojiclick' class="fa fa-laugh"></i>
        <i onclick="redirectcall()" style="margin-left: 50px; color: lightgreen;" class="fa fa-phone-alt"></i>
        <label for='imgupload'>
            <i id="sendfile" style="margin-left: 90px;" class="fa fa-plus"></i>
    </form>
    <form name="file" method="POST" enctype="multipart/form-data" target="hiddenFrame">
        <div class="popup" draggable="true" ondragover="fileextender()" ondrop="normal()" id="popup" style="display: none;">
            <h1>Enviar arquivos</h1>
            <h1 style="font-size: 20px; margin-top: -20px">[Aperte ESC para sair]</h1>
            <input type="file" style="margin-top: 50px; margin-left: 3050px; position: absolute; height: 25px;" name="filesendhere" id="imgupload" />
            <input type="submit" name="filesend" id="filesend" style="margin-left: 3050px; margin-top: 100px; background-color: green"></i>
            <script>
                var fileid = window.document.getElementById('imgupload')
                var popup = window.document.getElementById('popup')

                function redirectcall() {
                    window.open('call.php?id=<?php echo($id) ?>', '_blank')
                }

                function normal() {
                    fileid.style.marginTop = '50px'
                    fileid.style.marginLeft = '3050px'
                    fileid.style.height = '25px'
                    fileid.style.width = '550px'
                    fileid.style.backgroundColor = 'rgba(149, 155, 149, 0.281)'
                }

                function fileextender() {
 
                    fileid.style.marginTop = '-512px';
                    fileid.style.width = '5800px';
                    fileid.style.marginLeft = '1px';
                    fileid.style.height = '2830px';
                    fileid.style.backgroundColor = 'none'
                    window.addEventListener("keydown", checkKeyPress, false);

                    function checkKeyPress(key) {
                        if (key.keyCode == "27") {
                            popup.style.display = 'none'
                            fileid.style.marginTop = '50px'
                    fileid.style.marginLeft = '3050px'
                    fileid.style.height = '25px'
                    fileid.style.width = '550px'
                    fileid.style.backgroundColor = 'rgba(149, 155, 149, 0.281)'
                        }
                    }
                }
            </script>
    </div>
    <p class="typing" id="typing_on"></p>
        <?php
        include('specialphp/FileProcessator.php');
        ?>
        </label>
        <script src="javascript/autoscroll.js"></script>
        <script>
        var fileid = window.document.getElementById('imgupload')
        var buttonsend = window.document.getElementById('filesend')
            var popup = window.document.getElementById('popup')
            var sendicon = window.document.getElementById('sendfile')

            buttonsend.onclick = function() {
                popup.style.display = 'none'
            }

            sendicon.onclick = function() {
                fileid.style.display = 'initial'
                popup.style.display = 'initial'
                window.addEventListener("keydown", checkKeyPress, false);

                function checkKeyPress(key) {
                    if (key.keyCode == "27") {
                        popup.style.display = 'none'
                    }
                }
            }
        </script>
    </form>
    <script src="javascript/inputcleaner.js"></script>
</div>
<script>
    var show = window.document.getElementById('emoji')
    var click = window.document.getElementById('emojiclick')
    var a = 1;
    var x = event.which || event.keyCode;

    function mostrar() {
        if (a == 1) {
            show.style.display = 'initial'
            return a = 0;
        } else {
            show.style.display = 'none'
            return a = 1;
        }
    }
</script>
<div style="margin-top: 1px" class="rodape">
    <p style="font-family: Poppins; margin-left: 20px; text-align: center">O Fastalk é um sistema de chat rápido, 100% anônimo e sem criação de contas. Caso queira saber mais ou entrar em contato, <span onclick="redirect()" id="redirect">Clique aqui</span></p>
    <script>
        var here = window.document.getElementById('redirect')

        function redirect() {
            location.href = "contato.php"
        }
    </script>
</div>
</body>

</html>