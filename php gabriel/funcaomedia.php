<?php
//nivel 3
function calcularMedia($n1, $n2, $n3) {
    $media = ($n1 + $n2 + $n3) / 3;
    return $media;
}

$mediaFinal = calcularMedia(9.5, 8.0, 9.0);

echo "A média é: " . number_format($mediaFinal, 2);