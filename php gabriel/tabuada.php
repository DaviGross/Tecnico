<?php
//nivel 2
$numero = 6;
$contador = 1;

echo "Tabuada do $numero:<br>";

while ($contador <= 10) {
    $resultado = $numero * $contador;
    echo "$numero x $contador = $resultado<br>";
    $contador++;
}