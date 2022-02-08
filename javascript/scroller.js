// Variáveis
const chat = document.querySelector("#chat");

//Função Sleep para adicionar um delay à uma função
function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

//Função para detectar o dispositivo do usuário para controlar o scroll automático
if( /Android|webOS|iPhone|iPad|Mac|Macintosh|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
    var scrollSize = 878;
} else {
    var scrollSize = 1278;
}

//Scrollar pra baixo automaticamente quando o usuário apertar a tecla Enter
window.addEventListener("keydown", checkKeyPress, false);

function checkKeyPress(key){
    if (key.keyCode == "13") {
        $('#chat')[0].scrollTop = $('#chat')[0].scrollHeight; 
        sleep(300).then(() => {
            $('#chat')[0].scrollTop = $('#chat')[0].scrollHeight;   
        });
        sleep(1000).then(() => {
            $('#chat')[0].scrollTop = $('#chat')[0].scrollHeight;   
        });
    }
}

//Função principal do código, que scrolla automaticamente para baixo quando uma nova mensagem chega dependendo da posição do scroll do usuário
var oldHtml = chat.innerHTML;

function htmlChangeAutoScroll() {
    var newHtml = chat.innerHTML;
    if(oldHtml !== newHtml) {
        sleep(500).then(() => {
            const scrollPosition = chat.scrollTop;
            const scrollHeight = chat.scrollHeight;
            const scrollOperation = scrollHeight - scrollSize;
            if(scrollPosition >= scrollOperation) {
            $('#chat')[0].scrollTop = $('#chat')[0].scrollHeight;
            }
            return oldHtml = newHtml;
        })
    }
    setTimeout(htmlChangeAutoScroll, 100);
}
htmlChangeAutoScroll();

//Função pra scrollar automaticamente para baixo quando o usuário entrar na página
function autoStartScroll() {
    sleep(1000).then(() => {
        $('#chat')[0].scrollTop = $('#chat')[0].scrollHeight;
    })
    sleep(2000).then(() => {
        $('#chat')[0].scrollTop = $('#chat')[0].scrollHeight;
    })
    sleep(3000).then(() => {
        $('#chat')[0].scrollTop = $('#chat')[0].scrollHeight;
    })
}
autoStartScroll();