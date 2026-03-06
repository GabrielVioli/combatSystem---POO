<?php

namespace App\Core;

use PDO;

class Database
{
    public static function connect(): PDO
    {
        $caminho = __DIR__ . '/../../database.sqlite';
        $pdo = new PDO('sqlite:' . $caminho);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

        return $pdo;
    }
}
