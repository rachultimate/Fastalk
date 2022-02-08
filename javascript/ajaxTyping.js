//Variáveis
const textarea = $('#mensagem');
const typingStatus = $('#typing_on');
var lastTypedTime = new Date(0); // it's 01/01/1970, actually some time in the past
var typingDelayMillis = 5000; // how long user can "think about his spelling" before we show "No one is typing -blank space." message

//Função sleep aprimorada
function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

function refreshTypingStatus() {
    if (!textarea.is(':focus') || textarea.val() == '' || new Date().getTime() - lastTypedTime.getTime() > typingDelayMillis) {
    } else {    
        $.ajax({
            type: "GET",
            url: "typing.php" ,
        });
    }
}

function noTypingStatus() {
    if (!textarea.is(':focus') || textarea.val() == '' || new Date().getTime() - lastTypedTime.getTime() > typingDelayMillis) {
        $.ajax({
            type: "GET",
            url: "notyping.php" ,
        });
    }
}

function updateLastTypedTime() {
    lastTypedTime = new Date();
}

setInterval(refreshTypingStatus, 1000);
setInterval(noTypingStatus, 1000);
textarea.keypress(updateLastTypedTime);
textarea.blur(refreshTypingStatus);