<?php

namespace App\Models;


use App\Core\Database;

abstract class Personagem
{

    protected string $name;
    protected int $hp_base;

    protected int $atk_base;
    protected int $mp_base;
    protected int $def_base;
    protected string $descricao;

    protected string $tipo;



    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getHpBase(): int
    {
        return $this->hp_base;
    }

    public function setHpBase(int $hp_base): void
    {
        $this->hp_base = $hp_base;
    }

    public function getAtkBase(): int
    {
        return $this->atk_base;
    }

    public function setAtkBase(int $atk_base): void
    {
        $this->atk_base = $atk_base;
    }

    public function getDefBase(): int
    {
        return $this->def_base;
    }

    public function setDefBase(int $def_base): void
    {
        $this->def_base = $def_base;
    }

    public function getMpBase(): int
    {
        return $this->mp_base;
    }

    public function setMpBase(int $mp_base): void
    {
        $this->mp_base = $mp_base;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
    }

    public function getTipo(): string
    {
        return $this->tipo;
    }

    public function setTipo(string $tipo): void
    {
        $this->tipo = $tipo;
    }
}