<?php

namespace App\Controllers;

use App\Models\Guerreiro;
use App\Models\Mago;

class BattleController
{
    public function show()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $classeJ1 = $_POST['p1_classe'];
            $classeJ2 = $_POST['p2_classe'];

            $_SESSION['duelo'] = [
                'jogador1' => $this->montarFicha($classeJ1, 'Jogador 1'),
                'jogador2' => $this->montarFicha($classeJ2, 'Jogador 2'),
                'turno' => 1,
                'historico' => ["A batalha comecou!"]
            ];

            header('Location: /');
            exit;
        }

        if (isset($_SESSION['duelo'])) {
            $duelo = $_SESSION['duelo'];
            require __DIR__ . '/../../views/arena.php';
            return;
        }

        try {
            $mago = Mago::findFirstName();
            $hpBase = Mago::findHpBase();
            $mpBase = Mago::findMpBase();
            $atkBase = Mago::findAtkBase();
            $defBase = Mago::findDefBase();
            $ataques = json_decode(Mago::findAtaques(), true);

            $guerreiro = Guerreiro::findFirstName();
            $hpBaseG = Guerreiro::findHpBase();
            $mpBaseG = Guerreiro::findMpBase();
            $atkBaseG = Guerreiro::findAtkBase();
            $defBaseG = Guerreiro::findDefBase();
            $ataquesG = json_decode(Guerreiro::findAtaques(), true);
        } catch (\Throwable $e) {
            echo $e->getMessage();
        }

        require __DIR__ . '/../../views/selecao.php';
    }

    private function montarFicha(string $classe, string $nomeJogador)
    {
        if ($classe === 'mago') {
            return [
                'jogador' => $nomeJogador,
                'classe' => 'Mago',
                'nome_personagem' => Mago::findFirstName(),
                'hp_atual' => Mago::findHpBase(),
                'hp_max' => Mago::findHpBase(),
                'mana_atual' => Mago::findMpBase(),
                'atk' => Mago::findAtkBase(),
                'def' => Mago::findDefBase(),
                'defesa_ativa' => false
            ];
        }

        return [
            'jogador' => $nomeJogador,
            'classe' => 'Guerreiro',
            'nome_personagem' => Guerreiro::findFirstName(),
            'hp_atual' => Guerreiro::findHpBase(),
            'hp_max' => Guerreiro::findHpBase(),
            'mana_atual' => Guerreiro::findMpBase(),
            'atk' => Guerreiro::findAtkBase(),
            'def' => Guerreiro::findDefBase(),
            'defesa_ativa' => false
        ];
    }
}