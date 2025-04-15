<?php
//nivel 2
$nota1 = 9;
$nota2 = 7;
$nota3 = 8;

$media = ($nota1 + $nota2 + $nota3) / 3;

echo "Média: " . number_format($media, 2) . "<br>";

if ($media >= 7) {
    echo "Aluno Aprovado";
} elseif ($media >= 5 && $media < 7) {
    echo "Aluno Recuperação";
} else {
    echo "Aluno Reprovado";
}