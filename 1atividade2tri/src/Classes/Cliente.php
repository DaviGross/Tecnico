<?php

class Cliente
{
    public $nome;
    public $idade;
    public $endereco;
    public $telefone;

    public function comprar()
    {
        echo "O cliente realizou uma compra";
    }
    public function solicitar()
    {
        echo "O cliente realizou uma solicitação";
    }
}