<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Selecao</title>
    <link rel="stylesheet" href="/css/selecao.css">
</head>
<body>
<main class="screen">
    <div class="top">
        <h1 class="title">Selecione seu Personagem</h1>
        <span class="badge">Turno 0: Preparacao</span>
    </div>

    <p class="intro">Escolha uma classe para entrar na arena. Passe o cursor para inspecionar e clique para travar a selecao.</p>

    <form class="selection-form" method="post" action="#">
        <section class="arena">
            <input class="pick" type="radio" name="personagem" id="pick-mago" value="mago" checked>
            <label class="fighter mago" for="pick-mago">
                <span class="chip">Classe Magica</span>
                <div>
                    <h2><?= htmlspecialchars((string) ($mago ?? ''))?></h2>
                    <p class="sub">Tipo: <?= htmlspecialchars((string) ($tipo ?? '')) ?></p>
                </div>

                <ul class="stats">
                    <li><strong>HP</strong><?= htmlspecialchars((string) ($hpBase ?? '')) ?></li>
                    <li><strong>MP</strong><?= htmlspecialchars((string) ($mpBase ?? '')) ?></li>
                    <li><strong>Attack</strong><?= htmlspecialchars((string) ($atkBase ?? '')) ?></li>
                    <li><strong>Defesa</strong><?= htmlspecialchars((string) ($defBase ?? '')) ?></li>
                </ul>

                <p class="desc"><?= htmlspecialchars((string) ($descricao ?? '')) ?></p>
                <span class="pick-state">Selecionar</span>
            </label>

            <input class="pick" type="radio" name="personagem" id="pick-guerreiro" value="guerreiro">
            <label class="fighter guerreiro" for="pick-guerreiro">
                <span class="chip">Classe Fisica</span>
                <div>
                    <h2><?= htmlspecialchars((string) ($guerreiro ?? '')?></h2>
                    <p class="sub">Tipo: <?= htmlspecialchars((string) ($tipoG ?? '')) ?></p>
                </div>

                <ul class="stats">
                    <li><strong>HP</strong><?= htmlspecialchars((string) ($hpBaseG ?? '')) ?></li>
                    <li><strong>MP</strong><?= htmlspecialchars((string) ($mpBaseG ?? '')) ?></li>
                    <li><strong>Attack</strong><?= htmlspecialchars((string) ($atkBaseG ?? '')) ?></li>
                    <li><strong>Defesa</strong><?= htmlspecialchars((string) ($defBaseG ?? '')) ?></li>
                </ul>

                <p class="desc"><?= htmlspecialchars((string) ($descricaoG ?? '')) ?></p>
                <span class="pick-state">Selecionar</span>
            </label>
        </section>

        <footer class="footer">
            <div class="status">
                <span class="status-default">Nenhum lock confirmado.</span>
                <span class="status-mago">Classe ativa: Mago.</span>
                <span class="status-guerreiro">Classe ativa: Guerreiro.</span>
            </div>
            <div class="actions">
                <button class="btn primary" type="submit">Confirmar Selecao</button>
            </div>
        </footer>
    </form>
</main>
</body>
</html>
