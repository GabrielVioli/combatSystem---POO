<?php

namespace App\Models;

use App\Contracts\CombatenteInterface;
use App\Exceptions\EnergiaInsuficienteException;

class Guerreiro extends Personagem implements CombatenteInterface
{
    private const HP_BASE = 140;
    private const MP_BASE = 40;
    private const ATK_BASE = 18;
    private const DEF_BASE = 12;
    private const DESCRICAO = 'Mais HP e DEF, menos MP';

    private const BONUS_DEFESA = 10;
    private const CUSTO_HABILIDADE = 15;
    private const MULTIPLICADOR_HABILIDADE = 2;

    public function __construct(string $nome)
    {
        parent::__construct(
            $nome,
            self::HP_BASE,
            self::MP_BASE,
            self::ATK_BASE,
            self::DEF_BASE,
            'Guerreiro'
        );
    }

    public function atacar(Personagem $alvo): string
    {
        $danoBruto = $this->getAtaque();
        $danoFinal = max(0, $danoBruto - $alvo->getDefesa());
        $alvo->receberDano($danoFinal);

        return "{$this->getNome()} atacou {$alvo->getNome()} e causou {$danoFinal} de dano.";
    }

    public function defender(): string
    {
        $this->aplicarBonusDefesa(self::BONUS_DEFESA);

        return "{$this->getNome()} esta em posicao defensiva (+" . self::BONUS_DEFESA . " DEF no proximo ataque).";
    }


    public function habilidadeEspecial(Personagem $alvo): string
    {
        if ($this->getMp() < self::CUSTO_HABILIDADE) {
            throw new EnergiaInsuficienteException("{$this->getNome()} nao tem energia suficiente para o Golpe Giratorio.");
        }

        $this->setMp($this->getMp() - self::CUSTO_HABILIDADE);

        $danoBruto = (int)($this->getAtaque() * self::MULTIPLICADOR_HABILIDADE);
        $danoFinal = max(0, $danoBruto - $alvo->getDefesa());
        $alvo->receberDano($danoFinal);

        return "{$this->getNome()} usou Golpe Giratorio em {$alvo->getNome()} e causou {$danoFinal} de dano!";
    }

    public static function info(): array
    {
        return [
            'classe' => 'Guerreiro',
            'hp' => self::HP_BASE,
            'mp' => self::MP_BASE,
            'atk' => self::ATK_BASE,
            'def' => self::DEF_BASE,
            'descricao' => self::DESCRICAO,
        ];
    }
}
