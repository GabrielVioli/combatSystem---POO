<?php

namespace App\Contracts;

use App\Models\Personagem;

interface CombatenteInterface
{
    public function atacar(Personagem $alvo);

    public function defender();

    public function habilidadeEspecial(Personagem $alvo);
}

