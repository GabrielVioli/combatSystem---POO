<?php

namespace App\Models;

use App\Core\Database;

class Guerreiro extends Personagem
{
    public static function findFirstName(): ?string
    {
        return Database::connect()
            ->query("SELECT nome FROM personagens WHERE LOWER(tipo) = 'guerreiro' LIMIT 1")
            ->fetch()->nome ?? null;
    }

    public static function findTipo()
    {
        return Database::connect()
            ->query("SELECT tipo FROM personagens WHERE LOWER(tipo) = 'guerreiro'")
            ->fetch()->tipo ?? 'tipo';
    }

    public static function findHpBase()
    {
        return Database::connect()
            ->query("SELECT hp_base FROM personagens WHERE LOWER(tipo) = 'guerreiro'")
            ->fetch()->hp_base ?? 'hp_base';
    }

    public static function findMpBase()
    {
        return Database::connect()
            ->query("SELECT mp_base FROM personagens WHERE LOWER(tipo) = 'guerreiro'")
            ->fetch()->mp_base ?? 'mp_base';
    }

    public static function findDefBase()
    {
        return Database::connect()
            ->query("SELECT def_base FROM personagens WHERE LOWER(tipo) = 'guerreiro'")
            ->fetch()->def_base ?? 'def_base';
    }

    public static function findDesc()
    {
        return Database::connect()
            ->query("SELECT descricao FROM personagens WHERE LOWER(tipo) = 'guerreiro'")
            ->fetch()->descricao ?? 'descricao';
    }

    public static function findAtkBase()
    {
        return Database::connect()
            ->query("SELECT atk_base FROM personagens WHERE LOWER(tipo) = 'guerreiro'")
            ->fetch()->atk_base ?? 'atk_base';
    }
}
