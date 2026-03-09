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
        <h1 class="title">Selecao Local - 2 Jogadores</h1>
        <span class="badge">Mesmo Computador</span>
    </div>

    <p class="intro">Cada jogador escolhe sua classe e depois confirma para iniciar a partida.</p>

    <form class="selection-form" method="post" action="#">
        <section class="players">
            <article class="player">
                <h2 class="player-title">Jogador 1</h2>
                <div class="options">
                    <input class="pick" type="radio" id="p1-mago" name="p1_classe" value="mago" checked>
                    <label class="fighter mago" for="p1-mago">
                        <span class="chip">Classe Magica</span>
                        <h3><?= $mago ?? '' ?></h3>
                        <ul class="stats">
                            <li><strong>HP</strong><?= $hpBase ?? '' ?></li>
                            <li><strong>MP</strong><?= $mpBase ?? '' ?></li>
                            <li><strong>ATK</strong><?= $atkBase ?? '' ?></li>
                            <li><strong>DEF</strong><?= $defBase ?? '' ?></li>
                        </ul>
                        <ul class="attacks">
                            <?php foreach (($ataques ?? []) as $ataque): ?>
                                <li><?= $ataque ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </label>

                    <input class="pick" type="radio" id="p1-guerreiro" name="p1_classe" value="guerreiro">
                    <label class="fighter guerreiro" for="p1-guerreiro">
                        <span class="chip">Classe Fisica</span>
                        <h3><?= $guerreiro ?? '' ?></h3>
                        <ul class="stats">
                            <li><strong>HP</strong><?= $hpBaseG ?? '' ?></li>
                            <li><strong>MP</strong><?= $mpBaseG ?? '' ?></li>
                            <li><strong>ATK</strong><?= $atkBaseG ?? '' ?></li>
                            <li><strong>DEF</strong><?= $defBaseG ?? '' ?></li>
                        </ul>
                        <ul class="attacks">
                            <?php foreach (($ataquesG ?? []) as $ataque): ?>
                                <li><?= $ataque ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </label>
                </div>
            </article>

            <article class="player">
                <h2 class="player-title">Jogador 2</h2>
                <div class="options">
                    <input class="pick" type="radio" id="p2-mago" name="p2_classe" value="mago">
                    <label class="fighter mago" for="p2-mago">
                        <span class="chip">Classe Magica</span>
                        <h3><?= $mago ?? '' ?></h3>
                        <ul class="stats">
                            <li><strong>HP</strong><?= $hpBase ?? '' ?></li>
                            <li><strong>MP</strong><?= $mpBase ?? '' ?></li>
                            <li><strong>ATK</strong><?= $atkBase ?? '' ?></li>
                            <li><strong>DEF</strong><?= $defBase ?? '' ?></li>
                        </ul>
                        <ul class="attacks">
                            <?php foreach (($ataques ?? []) as $ataque): ?>
                                <li><?= $ataque ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </label>

                    <input class="pick" type="radio" id="p2-guerreiro" name="p2_classe" value="guerreiro" checked>
                    <label class="fighter guerreiro" for="p2-guerreiro">
                        <span class="chip">Classe Fisica</span>
                        <h3><?= $guerreiro ?? '' ?></h3>
                        <ul class="stats">
                            <li><strong>HP</strong><?= $hpBaseG ?? '' ?></li>
                            <li><strong>MP</strong><?= $mpBaseG ?? '' ?></li>
                            <li><strong>ATK</strong><?= $atkBaseG ?? '' ?></li>
                            <li><strong>DEF</strong><?= $defBaseG ?? '' ?></li>
                        </ul>
                        <ul class="attacks">
                            <?php foreach (($ataquesG ?? []) as $ataque): ?>
                                <li><?= $ataque ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </label>
                </div>
            </article>
        </section>

        <footer class="footer">
            <span>Jogador 1 e Jogador 2 escolhem no mesmo teclado.</span>
            <div class="actions">
                <button class="btn primary" type="submit">Iniciar Duelo</button>
            </div>
        </footer>
    </form>
</main>
</body>
</html>