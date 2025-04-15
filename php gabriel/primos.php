<?php
//nivel 4
function ePrimo($numero) {
    if ($numero <= 1) {
        return false;
    }

    for ($i = 2; $i <= sqrt($numero); $i++) {
        if ($numero % $i == 0) {
            return false;
        }
    }

    return true;
}

$testes = [1, 2, 3, 4, 5, 10, 13, 17, 20, 23];

foreach ($testes as $num) {
    if (ePrimo($num)) {
        echo "$num é primo<br>";
    } else {
        echo "$num não é primo<br>";
    }
}