<?php

namespace App\Models;

use App\Contracts\CombatenteInterface;
use App\Exceptions\EnergiaInsuficienteException;

class Mago extends Personagem implements CombatenteInterface
{
    private const HP_BASE = 90;
    private const MP_BASE = 80;
    private const ATK_BASE = 20;
    private const DEF_BASE = 6;
    private const DESCRICAO = 'Menos HP, mais MP e dano magico';

    private const CUSTO_HABILIDADE = 20;
    private const MULTIPLICADOR_HABILIDADE = 2.5;
    private const MP_RECUPERADO_DEFESA = 10;

    public function __construct(string $nome)
    {
        parent::__construct(
            $nome,
            self::HP_BASE,
            self::MP_BASE,
            self::ATK_BASE,
            self::DEF_BASE,
            'Mago'
        );
    }

    public function atacar(Personagem $alvo): string
    {
        $danoBruto = $this->getAtaque();
        $danoFinal = max(0, $danoBruto - $alvo->getDefesa());
        $alvo->receberDano($danoFinal);

        return "{$this->getNome()} lancou um projetil magico em {$alvo->getNome()} e causou {$danoFinal} de dano.";
    }

    public function defender(): string
    {
        $this->setMp($this->getMp() + self::MP_RECUPERADO_DEFESA);

        return "{$this->getNome()} concentrou energia e recuperou " . self::MP_RECUPERADO_DEFESA . " de MP.";
    }

    /**
     * @throws EnergiaInsuficienteException
     */
    public function habilidadeEspecial(Personagem $alvo): string
    {
        if ($this->getMp() < self::CUSTO_HABILIDADE) {
            throw new EnergiaInsuficienteException("{$this->getNome()} nao tem energia suficiente para a Bola de Fogo.");
        }

        $this->setMp($this->getMp() - self::CUSTO_HABILIDADE);

        $danoBruto = (int)($this->getAtaque() * self::MULTIPLICADOR_HABILIDADE);
        $danoFinal = max(0, $danoBruto - (int)floor($alvo->getDefesa() / 2));
        $alvo->receberDano($danoFinal);

        return "{$this->getNome()} lancou Bola de Fogo em {$alvo->getNome()} e causou {$danoFinal} de dano devastador!";
    }

    public static function info(): array
    {
        return [
            'classe' => 'Mago',
            'hp' => self::HP_BASE,
            'mp' => self::MP_BASE,
            'atk' => self::ATK_BASE,
            'def' => self::DEF_BASE,
            'descricao' => self::DESCRICAO,
        ];
    }
}
