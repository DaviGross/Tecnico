<?php
//nivel 4
function encontrarMaior($numeros) {
    return max($numeros);
}

$numeros = [126, 95, 7, 89, 63];

echo "O maior número é: " . encontrarMaior($numeros);