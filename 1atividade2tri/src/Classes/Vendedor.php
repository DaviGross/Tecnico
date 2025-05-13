<?php

class Vendedor
{
    public $nome;
    public $id;
    public $cpf;

    public function convencer()
    {
        echo "O vendedor convenceu o cliente";
    }
    public function vender()
    {
        echo "O vendedor vendeu para o cliente";
    }
}