// Variáveis
const body = document.querySelector("#literally_body");
const drag_display = document.querySelector("#drag_display");
const drag_input = document.querySelector("#drag_input");
const drag_title = document.querySelector("#drag_title");
const drag_button = document.querySelector("#drag_button");
const drag_error = document.querySelector("#drag_error");
const drag_close = document.querySelector("#close-circle");
const drag_icon = document.querySelector("#drag_icon");

//Função sleep aprimorada para realizar funções com delay
function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

//Função para conseguir o valor do cookie "country" para definir o idioma que o script será escrito
function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }
var country = getCookie("country");

//Ativando funções "drag and drop" no body
body.addEventListener('dragover', dragappear);
body.addEventListener('drop', dragmain);
body.addEventListener('dragend', dragmain);

//Função que faz com que o drag_display apareça
function dragappear(e) {
    e.preventDefault();
    drag_display.style.display = 'initial';
    drag_display.addEventListener("dblclick", function() {
        drag_display.style.display = 'none'
    })
    drag_close.addEventListener("click", function() {
        drag_display.style.display = 'none';
    });
    window.addEventListener("keydown", checkKeyPress, false);
    function checkKeyPress(key) {
        if (key.keyCode == "27") {
            drag_display.style.display = 'none'
        }
    }
    drag_input.style.display = 'none';
    drag_button.style.display = 'none';
    drag_error.innerText = '';
    if(country == "Brazil" && country !== undefined) {
    drag_title.innerText = 'Arraste o arquivo até aqui'
    } else {
    drag_title.innerText = 'Drag the file here'   
    }
}

//Função principal do script, que gerencia o arquivo dropado
function dragmain(ev) {
    ev.preventDefault();
    if (ev.dataTransfer.items) {
        for (var i = 0; i < ev.dataTransfer.items.length; i++) {
            if (ev.dataTransfer.items[i].kind === 'file') {
            var file = ev.dataTransfer.items[i].getAsFile();
            var type = file.type;
            var size = file.size;
            if(type == "image/png" || type == "image/jpg" || type == "image/jpeg" || type == "image/gif" || type == "audio/mpeg" || type == "video/mp4" || type == "video/avi" || type == "application/zip" || type == "application/rar" || type == "application/apk" || type == "application/pdf" || type == "application/x-msdownload" || type == "text/plain" || type == "application/vnd.openxmlformats-officedocument.wordprocessingml.document" || type == "application/vnd.openxmlformats-officedocument.presentationml.presentation") {
                if(size < 31000000) {
                    if(country == "Brazil" && country !== undefined) {
                    drag_title.innerText = 'Gerenciador de Arquivos';
                    } else {
                    drag_title.innerText = 'Files Manager';    
                    }
                    drag_input.style.display = 'initial';
                    drag_input.files = ev.dataTransfer.files;
                    drag_button.style.display = 'initial';
                    drag_error.innerText = '';
                    drag_close.style.display = 'initial'
                    drag_button.addEventListener("click", function() {
                        drag_error.style.color = 'forestgreen';
                        drag_error.innerText = 'Enviando arquivo.'
                        sleep(300).then(() => { drag_error.innerText = 'Enviando arquivo..' });
                        sleep(600).then(() => { drag_error.innerText = 'Enviando arquivo...' });
                        sleep(900).then(() => { drag_error.innerText = 'Enviando arquivo.' });
                        sleep(1200).then(() => { drag_error.innerText = 'Enviando arquivo..' });
                        sleep(1500).then(() => { drag_error.innerText = 'Enviando arquivo...' });
                        sleep(1800).then(() => { 
                            drag_error.innerText = '';
                            drag_error.style.color = 'red';
                            drag_display.style.display = 'none';
                     });
                    })
                } else {
                    if(country == "Brazil" && country !== undefined) {
                    drag_error.innerText = 'Apenas arquivos com menos de 31 MB podem ser enviados.'
                    } else {
                    drag_error.innerText = 'Only files smaller than 31 MB can be uploaded.'    
                    }
                }
            } else {
                if(country == "Brazil" && country !== undefined) {
                drag_error.innerText = 'O Tipo de arquivo que você enviou não é permitido.'
                } else {
                    drag_error.innerText = 'The type of file you uploaded is not allowed.'    
                }
            }
            }
        }
    }
    drag_close.style.display = 'initial'
};

//Função que mostra o drag_display quando o usuário clica no ícone

function dragshow() {
    window.addEventListener("keydown", checkKeyPress, false);
    function checkKeyPress(key) {
        if (key.keyCode == "27") {
            drag_display.style.display = 'none'
        }
    }

    drag_display.style.display = 'initial';
    drag_input.style.display = 'initial';
    drag_button.style.display = 'initial';
    drag_close.style.display = 'initial';
    drag_error.style.display = 'initial';

    $("#close-circle").click(function() {
        drag_display.style.display = 'none'
    })

    $("#drag_button").click(function() {
        drag_error.style.color = 'forestgreen';
        drag_error.style.display = 'initial';
        drag_error.style.innerText = 'Enviando arquivo.'
        sleep(300).then(() => { drag_error.innerText = 'Enviando arquivo..' });
        sleep(600).then(() => { drag_error.innerText = 'Enviando arquivo...' });
        sleep(900).then(() => { drag_error.innerText = 'Enviando arquivo.' });
        sleep(1200).then(() => { drag_error.innerText = 'Enviando arquivo..' });
        sleep(1500).then(() => { drag_error.innerText = 'Enviando arquivo...' });
        sleep(1800).then(() => { 
            drag_error.innerText = '';
            drag_error.style.color = 'red';
            drag_display.style.display = 'none';
     });
});

    if(country == "Brazil" && country !== undefined) {
        drag_title.innerText = 'Gerenciador de Arquivos';
    } else {
        drag_title.innerText = 'Files Manager';    
    }
}
