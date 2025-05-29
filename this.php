<?php

require_once "src/Classes/Cliente.php";

$cli = new Cliente;
$cli -> nome = "Davi";
$cli -> idade = 17;
$cli -> nomendereço = "Rua Helena";
$cli -> telefone = "41 xxxx-xxxx";
$cli -> comprar();
$cli -> definirNome();
$cli -> negociar();
$cli -> serEnganado();
$cli -> pagarFiado();

echo "<br>";

$cli2 = new Cliente;
$cli2 -> nome = "Gabi";
$cli2 -> idade = 20;
$cli2 -> nomendereço = "Rua Helena";
$cli2 -> telefone = "41 xxxx-xxxx";
$cli2 -> comprar();
$cli2 -> definirNome();
$cli2 -> negociar();
$cli2 -> serEnganado();
$cli -> pagarFiado();