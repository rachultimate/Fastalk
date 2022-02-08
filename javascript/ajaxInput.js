function ajaxInput(){
    var req = new XMLHttpRequest();
    req.onreadystatechange = function(){
        if (req.readyState == XMLHttpRequest.DONE && req.status == 200) {
                document.getElementById('mensagem').placeholder = req.responseText;
        }
    }
    req.open('GET', 'inputchanger.php', true);
    req.send();

}   

setInterval(function(){ajaxInput();}, 1000);