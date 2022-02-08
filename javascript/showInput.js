//Variáveis
const user = document.querySelector("#user");
const change_ph = document.querySelector(".change-ph");
const profile_img = document.querySelector("#profile-img");
const input_file = document.querySelector("#changeph-file");

//Função simples, pequena e primitiva, apenas para extender o tamanho da main.user
function showinput() {
    user.style.height = '100%'
    document.querySelector("#publicbutton").style.marginTop = '1rem'
    document.querySelector("#form_join_mobile").style.display = ''
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

//Função sleep aprimorada para realizar funções com delay
function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

//Função que faz com que o "Alterar foto de perfil" apareça quando o usuário passar o mouse por cima da div
profile_img.addEventListener("click", function() {
    change_ph.style.display = 'initial'
    if(country == "Brazil" || country !== undefined) {
    change_ph.innerHTML = '<p>Alterar foto de perfil</p><i class="fas fa-plus"></i>';
    } else {
    change_ph.innerHTML = '<p>Change Profile Photo</p><i class="fas fa-plus"></i>';   
    }
})

profile_img.addEventListener("mousemove", function() {
    change_ph.style.display = 'initial'
        if(country == "Brazil" || country !== undefined) {
    change_ph.innerHTML = '<p>Alterar foto de perfil</p><i class="fas fa-plus"></i>';
    } else {
    change_ph.innerHTML = '<p>Change Profile Photo</p><i class="fas fa-plus"></i>';   
    }

})

profile_img.addEventListener("mouseleave", function() {
    change_ph.style.display = 'none'
        if(country == "Brazil" || country !== undefined) {
    change_ph.innerHTML = '<p>Alterar foto de perfil</p><i class="fas fa-plus"></i>';
    } else {
    change_ph.innerHTML = '<p>Change Profile Photo</p><i class="fas fa-plus"></i>';   
    }

})

change_ph.addEventListener("mousemove", function() {
    change_ph.style.display = 'initial'
        if(country == "Brazil" || country !== undefined) {
    change_ph.innerHTML = '<p>Alterar foto de perfil</p><i class="fas fa-plus"></i>';
    } else {
    change_ph.innerHTML = '<p>Change Profile Photo</p><i class="fas fa-plus"></i>';   
    }

})

change_ph.addEventListener("mouseleave", function() {
    change_ph.style.display = 'none'
        if(country == "Brazil" || country !== undefined) {
    change_ph.innerHTML = '<p>Alterar foto de perfil</p><i class="fas fa-plus"></i>';
    } else {
    change_ph.innerHTML = '<p>Change Profile Photo</p><i class="fas fa-plus"></i>';   
    }

})

//Função que ativa o "Arraste a foto até aqui" aparecer quando o usuário arrastar um arquivo

document.body.addEventListener("dragover", function(ev) {
    ev.preventDefault();
    change_ph.style.display = 'initial';
    change_ph.innerHTML = '<i style="margin-top: 90px;" class="fas fa-plus"></i>';
});

//Função principal que é ativada quando o usuário dropa o arquivo nos lugares permitidos
user.addEventListener("drop", function(ev) {
    ev.preventDefault();
    if (ev.dataTransfer.items) {
        for (var i = 0; i < ev.dataTransfer.items.length; i++) {
            if (ev.dataTransfer.items[i].kind === 'file') {
            var file = ev.dataTransfer.items[i].getAsFile();
            var type = file.type;
            var size = file.size;
            if(type == "image/png" || type == "image/jpg" || type == "image/jpeg" || type == "image/gif") {
                if(size < 31000000) {
                    input_file.files = ev.dataTransfer.files;
                    input_file.parentElement.submit();
                } else {
                    if(country == "Brazil" && country !== undefined) {
                    alert('Apenas arquivos com menos de 31 MB podem ser enviados.')
                    } else {
                    alert('Only files smaller than 31 MB can be uploaded.')
                    }
                }
            } else {
                if(country == "Brazil" && country !== undefined) {
                alert('O Tipo de arquivo que você enviou não é permitido.')
                } else {
                    alert('The type of file you uploaded is not allowed.')  
                }
            }
            }
        }
    }
})