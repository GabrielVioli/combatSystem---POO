<?php

namespace App\Controllers;

use App\Core\Database;

class BattleController
{
    public function show(): void
    {
        $pdo = Database::connect();
        $stmt = $pdo->query("SELECT nome FROM personagens WHERE LOWER(tipo) = 'mago' LIMIT 1");
        $mago = $stmt->fetch()->nome ?? 'Mago nao encontrado';

        require __DIR__ . '/../../views/arena.php';
    }
}
