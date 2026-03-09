<?php

namespace App\Services;

class CombatService
{
    public function regenerarMana(array &$jogador, int $quantidade): void
    {
        $jogador['mana_atual'] = min($jogador['mana_atual'] + $quantidade, $jogador['mana_max']);
    }

    public function limparDefesaTemporaria(array &$jogador): bool
    {
        if ($jogador['defesa_ativa']) {
            $jogador['defesa_ativa'] = false;
            $jogador['defesa_bonus'] = 0;
            return true;
        }

        return false;
    }

    public function aplicarAtaque(array &$atacante, array &$defensor): int
    {
        $defesaTotal = $defensor['def'];

        if ($defensor['defesa_ativa']) {
            $defesaTotal += $defensor['defesa_bonus'];
        }

        $dano = $atacante['atk'] - $defesaTotal;

        if ($dano < 0) {
            $dano = 0;
        }

        $defensor['hp_atual'] -= $dano;

        return $dano;
    }

    public function aplicarDefesa(array &$jogador): void
    {
        $jogador['defesa_ativa'] = true;
        $jogador['defesa_bonus'] = 10;
    }

    public function batalhaTerminou(array $jogador1, array $jogador2): bool
    {
        return $jogador1['hp_atual'] <= 0 || $jogador2['hp_atual'] <= 0;
    }

    public function obterVencedor(array $jogador1, array $jogador2)
    {
        if ($jogador1['hp_atual'] <= 0 && $jogador2['hp_atual'] <= 0) {
            return 'Empate';
        }

        if ($jogador1['hp_atual'] <= 0) {
            return $jogador2;
        }

        return $jogador1;
    }
}