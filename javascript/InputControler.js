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