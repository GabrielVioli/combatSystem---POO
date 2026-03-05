<?php

namespace App\Models;

abstract class Personagem
{
    protected string $nome;
    protected int $vida;
    protected int $ataque;

    public function __construct(string $nome, int $vida, int $ataque)
    {
        $this->nome = $nome;
        $this->vida = $vida;
        $this->ataque = $ataque;
    }
}