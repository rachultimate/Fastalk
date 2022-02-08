function ajaxCountUsers(){
    var req = new XMLHttpRequest();
    req.onreadystatechange = function(){
        if (req.readyState == XMLHttpRequest.DONE && req.status == 200) {
                document.getElementById('numbercount').innerHTML = req.responseText;
        }
    }
    req.open('GET', 'UsersCount.php', true);
    req.send();

}   

setInterval(function(){ajaxCountUsers();}, 5000);