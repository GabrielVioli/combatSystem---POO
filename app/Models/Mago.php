<?php

namespace App\Models;

use App\Core\Database;

class Mago extends Personagem
{
    public static function findFirstName(): ?string
    {
        return Database::connect()
            ->query("SELECT nome FROM personagens WHERE LOWER(tipo) = 'mago' LIMIT 1")
            ->fetch()->nome ?? null;
    }

    public static function findTipo() {
        return Database::connect()
            ->query("SELECT tipo FROM personagens WHERE LOWER(tipo) = 'mago'")
            ->fetch()->tipo ?? "tipo";
    }

    public static function findHpBase() {
        return Database::connect()
            ->query("SELECT Hp_base FROM personagens WHERE LOWER(tipo) = 'mago'")
            ->fetch()->hp_base ?? "hp_base";
    }

    public static function findMpBase() {
        return Database::connect()
            ->query("SELECT mp_base FROM personagens WHERE LOWER(tipo) = 'mago'")
            ->fetch()->mp_base ?? "mp_base";
    }

    public static function findDefBase() {
        return Database::connect()
            ->query("SELECT def_base FROM personagens WHERE LOWER(tipo) = 'mago'")
            ->fetch()->def_base ?? "def_base";
    }

    public static function findDesc() {
        return Database::connect()
            ->query("SELECT descricao FROM personagens WHERE LOWER(tipo) = 'mago'")
            ->fetch()->descricao ?? "descricao";
    }

    public static function findAtkBase() {
        return Database::connect()
            ->query("SELECT atk_base FROM personagens WHERE LOWER(tipo) = 'mago'")
            ->fetch()->atk_base ?? "atk_base";
    }
}
