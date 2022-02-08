//Variáveis
const inputBox = document.querySelector("#Theme");
const suggBox = document.querySelector(".autocomplete-box");
let linkTag = inputBox.querySelector("a");
let webLink;

//Função principal que irá pegar o valor e filtrar o conteúdo de acordo com o que o usuário digitou
inputBox.onkeyup = (e)=>{
    let userData = e.target.value; //Valor da Input do tema da sala
    let emptyArray = [];
    if(userData != ""){
        emptyArray = suggestions.filter((data)=>{
            //Busca sugestões de temas a partir do que o usuário digitou
            return data.toLocaleLowerCase().match(userData.toLocaleLowerCase()); 
        });
        emptyArray = emptyArray.map((data)=>{
            //Coleta os dados retornados e os coloca dentro de uma <li>
            return data = '<li>'+ data +'</li>';
        });
        showSuggestions(emptyArray);
        let allList = suggBox.querySelectorAll("li");
        for (let i = 0; i < allList.length; i++) {
            //Adiciona a função select() à <li>
            allList[i].setAttribute("onclick", "select(this)");
        }
    }
}

//Função que irá substituir a input atual pelo valor que o usuário clicou
function select(element){
    let selectData = element.textContent;
    inputBox.value = selectData;
}

//Função que irá mostrar as sugestões de acordo com o que o usuário digitou
function showSuggestions(list){
    let listData;
    if(!list.length){
        userValue = inputBox.value;
        listData = '<li>'+ userValue +'</li>';
    }else{
        listData = list.join('');
    }
    suggBox.innerHTML = listData;
}