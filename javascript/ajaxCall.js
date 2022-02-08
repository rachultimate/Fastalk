function ajaxCall(){
    var req = new XMLHttpRequest();
    req.onreadystatechange = function(){
        if (req.readyState == XMLHttpRequest.DONE && req.status == 200) {
                document.getElementById('users_panel').innerHTML = req.responseText;
        }
    }
    req.open('GET', 'CallMain.php', true);
    req.send();

}   

setInterval(function(){ajaxCall();}, 1000);