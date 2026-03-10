<?php

namespace App\Models;

abstract class Personagem
{
    private string $nome;
    private int $hp;
    private int $mp;
    private int $ataque;
    private int $defesaBase;
    private int $defesaBonus = 0;
    private string $classe;

    public function __construct(string $nome, int $hp, int $mp, int $ataque, int $defesaBase, string $classe)
    {
        $this->nome = $nome;
        $this->hp = $hp;
        $this->mp = $mp;
        $this->ataque = $ataque;
        $this->defesaBase = $defesaBase;
        $this->classe = $classe;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getHp(): int
    {
        return $this->hp;
    }

    public function setHp(int $hp): void
    {
        $this->hp = max(0, $hp);
    }

    public function getMp(): int
    {
        return $this->mp;
    }

    public function setMp(int $mp): void
    {
        $this->mp = max(0, $mp);
    }

    public function getAtaque(): int
    {
        return $this->ataque;
    }

    public function getDefesa(): int
    {
        return $this->defesaBase + $this->defesaBonus;
    }

    public function aplicarBonusDefesa(int $bonus): void
    {
        $this->defesaBonus = max(0, $bonus);
    }

    public function limparBonusDefesa(): void
    {
        $this->defesaBonus = 0;
    }

    public function getClasse(): string
    {
        return $this->classe;
    }

    public function receberDano(int $dano): void
    {
        $this->hp = max(0, $this->hp - max(0, $dano));
        $this->limparBonusDefesa();
    }

    public function estaVivo(): bool
    {
        return $this->hp > 0;
    }

    abstract public function atacar(Personagem $alvo): string;

    abstract public function defender(): string;

    abstract public function habilidadeEspecial(Personagem $alvo): string;
}
