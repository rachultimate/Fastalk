function ajaxOptions(){
    var req = new XMLHttpRequest();
    req.onreadystatechange = function(){
        if (req.readyState == XMLHttpRequest.DONE && req.status == 200) {
                document.getElementById('mensagem').style = req.responseText;
        }
    }
    req.open('GET', 'MsgOptions1.php', true);
    req.send();

}

setInterval(function(){ajaxOptions();}, 1000);

function ajaxOptions2(){
var req = new XMLHttpRequest();
req.onreadystatechange = function(){
    if (req.readyState == XMLHttpRequest.DONE && req.status == 200) {
            document.getElementById('mensagem').placeholder = req.responseText;
    }
}
req.open('GET', 'MsgOptions2.php', true);
req.send();

}   

setInterval(function(){ajaxOptions2();}, 1000);
