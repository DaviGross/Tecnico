//Função para adicionar uma nova tarefa
function addTask(){
    let input = document.getElementById("taskInput"); //captura o campo de entrada de texto
    let taskText = input.value.trim(); //Obtém o valor digitado e remove espaços extras

    if (taskText === "") return; //Se o campo estiver vazio, a função para aqui.

    let li = document.createElement("li");//cria um elemento <li> para lista
    li.innerHTML = `${taskText} <button onclick = "removeTask(this)">X</button>`; //Adiciona o texto da tarefa a um botão de remoção

    li.addEventListener("click", function(){
        this.classList.toggle("done");//alterna a classe "done" para riscar ou não a tarefa
    });
    document.getElementById("taskList").appendChild(li);//Adiciona o item li à lista de tarefas
    input.value = "";//limpa o campo de entrada após adivionar a tarefa
}
//função para remover uma tarefa
function removeTask(button){
    button.parentElement.remove();//remove o elemneto pai do botão(o <li> da tarefa)
    
}
