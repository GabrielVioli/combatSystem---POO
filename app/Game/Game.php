<?php

namespace App\Game;

use App\Contracts\CombatenteInterface;
use App\Exceptions\AcaoInvalidaException;
use App\Exceptions\EnergiaInsuficienteException;
use App\Models\Guerreiro;
use App\Models\Mago;
use App\Models\Personagem;

class Game
{
    private const ACAO_ATACAR = 1;
    private const ACAO_DEFENDER = 2;
    private const ACAO_HABILIDADE = 3;


    private array $jogadores = [];

    private array $logs = [];

    public function executar(): void
    {
        $this->exibirTitulo();
        $this->exibirInformacoesDasClasses();
        $this->configurarJogadores();
        $this->loopPrincipal();
    }

    private function exibirTitulo(): void
    {
        echo "==========================" . PHP_EOL;
        echo "   RPG - Batalha 1 x 1   " . PHP_EOL;
        echo "==========================" . PHP_EOL . PHP_EOL;
    }

    private function exibirInformacoesDasClasses(): void
    {
        echo "Informacoes das classes:" . PHP_EOL;

        foreach ([Guerreiro::info(), Mago::info()] as $info) {
            echo "--------------------------------" . PHP_EOL;
            echo "Classe: {$info['classe']}" . PHP_EOL;
            echo "HP: {$info['hp']} | MP: {$info['mp']}" . PHP_EOL;
            echo "ATK: {$info['atk']} | DEF: {$info['def']}" . PHP_EOL;
            echo "Descricao: {$info['descricao']}" . PHP_EOL;
        }

        echo "--------------------------------" . PHP_EOL . PHP_EOL;
    }

    private function configurarJogadores(): void
    {
        $this->jogadores[0] = $this->escolherPersonagem(1);
        $this->jogadores[1] = $this->escolherPersonagem(2);
    }

    private function escolherPersonagem(int $numeroJogador): CombatenteInterface
    {
        while (true) {
            echo "Jogador {$numeroJogador}, informe seu nome: ";
            $nome = trim(fgets(\STDIN) ?: '');
            if ($nome === '') {
                $nome = "Jogador {$numeroJogador}";
            }

            echo PHP_EOL;
            echo "Escolha sua classe:" . PHP_EOL;
            echo "1 - Guerreiro (mais HP e DEF, menos MP)" . PHP_EOL;
            echo "2 - Mago      (menos HP, mais MP)" . PHP_EOL;
            echo "Digite 1 ou 2: ";

            $opcao = trim(fgets(\STDIN) ?: '');

            if ($opcao === '1') {
                echo "Jogador {$numeroJogador} escolheu Guerreiro." . PHP_EOL . PHP_EOL;
                $this->logs[] = "Jogador {$numeroJogador} escolheu Guerreiro.";
                return new Guerreiro($nome);
            }

            if ($opcao === '2') {
                echo "Jogador {$numeroJogador} escolheu Mago." . PHP_EOL . PHP_EOL;
                $this->logs[] = "Jogador {$numeroJogador} escolheu Mago.";
                return new Mago($nome);
            }

            echo "Opcao invalida. Tente novamente." . PHP_EOL . PHP_EOL;
        }
    }

    private function loopPrincipal(): void
    {
        $turno = 1;
        $jogadorAtual = 0;

        while ($this->jogadores[0]->estaVivo() && $this->jogadores[1]->estaVivo()) {
            $atacante = $this->jogadores[$jogadorAtual];
            $defensorIndex = $jogadorAtual === 0 ? 1 : 0;
            $defensor = $this->jogadores[$defensorIndex];

            echo "--------------------------" . PHP_EOL;
            echo "Turno {$turno}" . PHP_EOL;
            echo "--------------------------" . PHP_EOL;
            $this->exibirStatus();

            try {
                $acao = $this->escolherAcao($atacante);
                $mensagem = $this->processarAcao($acao, $atacante, $defensor);
                echo $mensagem . PHP_EOL;
                $this->logs[] = "Turno {$turno}: " . $mensagem;
            } catch (EnergiaInsuficienteException $e) {
                echo $e->getMessage() . PHP_EOL;
                echo "Acao foi perdida por falta de energia." . PHP_EOL;
                $this->logs[] = "Turno {$turno}: " . $e->getMessage();
            } catch (AcaoInvalidaException $e) {
                echo $e->getMessage() . PHP_EOL;
                echo "Tente novamente no proximo turno." . PHP_EOL;
                $this->logs[] = "Turno {$turno}: " . $e->getMessage();
            }

            if (!$defensor->estaVivo()) {
                break;
            }

            $jogadorAtual = $defensorIndex;
            $turno++;
        }

        $this->exibirResultadoFinal();
    }

    private function exibirStatus(): void
    {
        foreach ($this->jogadores as $indice => $jogador) {
            $num = $indice + 1;
            echo "Jogador {$num} - {$jogador->getNome()} ({$jogador->getClasse()})" . PHP_EOL;
            echo "HP: {$jogador->getHp()} | MP: {$jogador->getMp()}" . PHP_EOL;
            echo PHP_EOL;
        }
    }

    /**
     * @throws AcaoInvalidaException
     */
    private function escolherAcao(CombatenteInterface $jogador): int
    {
        echo "Vez de {$jogador->getNome()} ({$jogador->getClasse()})" . PHP_EOL;
        echo self::ACAO_ATACAR . " - Atacar" . PHP_EOL;
        echo self::ACAO_DEFENDER . " - Defender" . PHP_EOL;
        echo self::ACAO_HABILIDADE . " - Habilidade Especial" . PHP_EOL;
        echo "Escolha a acao: ";

        $entrada = trim(fgets(\STDIN) ?: '');

        if (!in_array($entrada, ['1', '2', '3'], true)) {
            throw new AcaoInvalidaException('Acao invalida escolhida.');
        }

        return (int)$entrada;
    }

    /**
     * @throws EnergiaInsuficienteException
     * @throws AcaoInvalidaException
     */
    private function processarAcao(int $acao, CombatenteInterface $atacante, Personagem $defensor): string
    {
        return match ($acao) {
            self::ACAO_ATACAR => $atacante->atacar($defensor),
            self::ACAO_DEFENDER => $atacante->defender(),
            self::ACAO_HABILIDADE => $atacante->habilidadeEspecial($defensor),
            default => throw new AcaoInvalidaException('Acao invalida.'),
        };
    }

    private function exibirResultadoFinal(): void
    {
        echo PHP_EOL . "==========================" . PHP_EOL;
        echo "      Fim da Batalha      " . PHP_EOL;
        echo "==========================" . PHP_EOL;

        if (!$this->jogadores[0]->estaVivo() && !$this->jogadores[1]->estaVivo()) {
            echo "Resultado: Empate! Ambos cairam ao mesmo tempo." . PHP_EOL;
            return;
        }

        $vencedorIndex = $this->jogadores[0]->estaVivo() ? 0 : 1;
        $perdedorIndex = $vencedorIndex === 0 ? 1 : 0;

        $vencedor = $this->jogadores[$vencedorIndex];
        $perdedor = $this->jogadores[$perdedorIndex];

        echo "Vencedor: {$vencedor->getNome()} ({$vencedor->getClasse()})" . PHP_EOL;
        echo "Perdedor: {$perdedor->getNome()} ({$perdedor->getClasse()})" . PHP_EOL;
        echo "HP final do vencedor: {$vencedor->getHp()}" . PHP_EOL;

        echo PHP_EOL . "Historico de acoes:" . PHP_EOL;
        foreach ($this->logs as $linha) {
            echo "- {$linha}" . PHP_EOL;
        }
    }
}
