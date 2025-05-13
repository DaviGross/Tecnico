<?php

require_once "src/Classes/Carro.php";
require_once "src/Classes/Cliente.php";
require_once "src/Classes/Vendedor.php";

$ven = new Vendedor;
$ven -> nome = "Marcos";
$ven -> id = "1397d78";
$ven -> cpf = "123095083462";

$ven ->convencer();
echo "<br>";
var_dump($ven);

$ven ->vender();
echo "<br>";
var_dump($ven);

$car1 = new Carro;
$car1 -> marca = "Fiat";
$car1 -> nome = "Sheila";
$car1 -> cor = "Preto";
$car1 -> preco = 1230.00;

$car2 = new Carro;
$car2 -> marca = "Fiat";
$car2 -> nome = "Ingrid";
$car2 -> cor = "Azul";
$car2 -> preco = 1230.90;

var_dump($car1);
echo "<br>";
var_dump($car2);

$cli = new Cliente;
$cli -> nome = "João";
$cli -> idade = 40;
$cli -> endereco = "Rua A";
$cli -> telefone = "41- XXXX-XXXX";

$cli ->comprar();
echo "<br>";
var_dump($cli);

$cli ->solicitar();
echo "<br>";
var_dump($cli);