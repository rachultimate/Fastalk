function ajaxType(){
    var req = new XMLHttpRequest();
    req.onreadystatechange = function(){
        if (req.readyState == XMLHttpRequest.DONE && req.status == 200) {
                document.getElementById('typing_on').innerHTML = req.responseText;
        }
    }
    req.open('GET', 'typer.php', true);
    req.send();

}   

setInterval(function(){ajaxType();}, 500);