function ajaxRoomStatus(){
    var req = new XMLHttpRequest();
    req.onreadystatechange = function(){
        if (req.readyState == XMLHttpRequest.DONE && req.status == 200) {
                document.getElementById('roomstatus').innerHTML = req.responseText;
        }
    }
    req.open('GET', 'roomstatus.php', true);
    req.send();

}   

setInterval(function(){ajaxRoomStatus();}, 5000);