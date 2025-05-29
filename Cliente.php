<?php

class Cliente
{
    public $nome;
    public $idade;
    public $endereco;
    public $telefone;

    public function comprar()
    {
        echo "O cliente {$this->nome} realizou uma compra";
    }
    public function definirNome($nome)
    {
        $this->nome = $nome;
    }
    public function negociar()
    {
        echo "o cliente {$this->nome} negociou uma compra";
    }
    public function serEnganado()

    {
        echo "O cliente {$this->nome} foi enganado";
    }
    public function pagarFiado()
    {
        echo "O cliente {$this->nome} esta pagando fiado";
    }
}