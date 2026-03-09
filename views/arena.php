<form method="post" action="/" class="arena-container">
    <?php if (isset($duelo['finalizado']) && $duelo['finalizado']): ?>
        <p class="intro" style="color: #ffd166; font-size: 20px;">A Batalha Terminou!</p>
        <div class="actions">
            <button type="submit" name="reiniciar" value="1" class="btn primary">Jogar Novamente</button>
        </div>
    <?php else: ?>
        <p class="intro">Escolha a acao para este turno:</p>
        <div class="actions">
            <button type="submit" name="acao" value="atacar" class="btn primary">Atacar</button>
            <button type="submit" name="acao" value="defender" class="btn">Defender</button>
            <button type="submit" name="acao" value="especial" class="btn">Habilidade Especial</button>
        </div>
    <?php endif; ?>
</form>