<?php
//nivel 4
$numeros = [2, 5, 8, 14, 20, 7, 4, 10, 9, 16];
$numerosPares = 0;

foreach ($numeros as $numero) {
    if ($numero % 2 == 0) {
        $numerosPares++;
    }
}

echo "Quantidade de números pares: $numerosPares";