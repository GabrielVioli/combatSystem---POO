<?php

namespace App\Controllers;

use App\Models\Mago;
use App\Models\Guerreiro;
use App\utils\Utils;

class SetupController
{
    public function addAttributes() {
        $mago = new Mago();
        $guerreiro = new Guerreiro();

        $dados = Utils::all();

        foreach ($dados as $dado) {
            if ($dado->tipo === 'Mago') {
                $mago->setName($dado->name);
                $mago->setTipo($dado->tipo);
                $mago->setAtkBase($dado->atk_base);
                $mago->setDefBase($dado->def_base);
                $mago->setDescricao($dado->descricao);
                $mago->setMpBase($dado->mp_base);
                $mago->setHpBase($dado->hp_base);
            }

            if ($dado->tipo === 'Guerreiro') {
                $guerreiro->setName($dado->name);
                $guerreiro->setTipo($dado->tipo);
                $guerreiro->setAtkBase($dado->atk_base);
                $guerreiro->setDefBase($dado->def_base);
                $guerreiro->setDescricao($dado->descricao);
                $guerreiro->setMpBase($dado->mp_base);
                $guerreiro->setHpBase($dado->hp_base);
            }
        }
    }
}
