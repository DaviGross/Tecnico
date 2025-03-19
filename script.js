function calcular () {
    let num1 = parseFloat (document.getElementById("num1").value);
    let num2 = parseFloat (document.getElementById("num2").value);
    let operacao = getElementById ("operacao").value;
    let resultado;

    if(isNaN(num1) || isNaN(num2)){
        resultado = "Erro! insira numeros validos. ";
    }else {
        switch(operacao){
            case "+":
                resultado = num1 + num2;
                break;
            case "-":
                resultado = num1 - num2;
                break;
            case "*":
                resultado = num1 * num2;
                break;
            case "/":
                resultado = num1 !== 0 ? num1 / num2 : "erro! divisão por 0."
                break;

        }
        
    }
    document.getElementById("resultado").textContent = resultado;
}