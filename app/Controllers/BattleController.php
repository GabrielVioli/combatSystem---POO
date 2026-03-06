<?php

namespace App\Controllers;

use App\Models\Guerreiro;
use App\Models\Mago;

class BattleController
{
    public function show(): void
    {
        $mago = Mago::findFirstName() ?? 'Mago nao encontrado';
        $tipo = Mago::findTipo();
        $hpBase = Mago::findHpBase();
        $mpBase = Mago::findMpBase();
        $atkBase = Mago::findAtkBase();
        $defBase = Mago::findDefBase();
        $descricao = Mago::findDesc();
        $ataques = json_decode(Mago::findAtaques(), true) ?: [];

        $guerreiro = Guerreiro::findFirstName() ?? 'Guerreiro nao encontrado';
        $tipoG = Guerreiro::findTipo();
        $hpBaseG = Guerreiro::findHpBase();
        $mpBaseG = Guerreiro::findMpBase();
        $atkBaseG = Guerreiro::findAtkBase();
        $defBaseG = Guerreiro::findDefBase();
        $descricaoG = Guerreiro::findDesc();
        $ataquesG = json_decode(Guerreiro::findAtaques(), true) ?: [];

        require __DIR__ . '/../../views/arena.php';
    }
}
