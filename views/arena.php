<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arena</title>
    <link rel="stylesheet" href="/css/arena.css">
</head>
<body>

<h1>Arena de Batalha</h1>

<div class="arena-container">
    <div class="fighter-box">
        <img src="Characters/guerreiro.png" alt="Guerreiro" class="img-guerreiro">
        <div class="stats-panel">
            <h3 class="guerreiro-title"><?= htmlspecialchars((string) ($guerreiro ?? '')) ?></h3>

            <div class="bar-container">
                <div class="hp-fill"></div>
                <span class="bar-text">HP: <?= htmlspecialchars((string) ($hpBaseG ?? '0')) ?></span>
            </div>

            <div class="bar-container">
                <div class="mp-fill"></div>
                <span class="bar-text">MP: <?= htmlspecialchars((string) ($mpBaseG ?? '0')) ?></span>
            </div>

            <div class="actions">
                <?php foreach (($ataquesG ?? []) as $ataque): ?>
                    <button class="btn"><?= htmlspecialchars((string) $ataque) ?></button>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="fighter-box">
        <img src="Characters/mago.png" alt="Mago" class="img-mago">
        <div class="stats-panel">
            <h3 class="mago-title"><?= htmlspecialchars((string) ($mago ?? '')) ?></h3>

            <div class="bar-container">
                <div class="hp-fill"></div>
                <span class="bar-text">HP: <?= htmlspecialchars((string) ($hpBase ?? '0')) ?></span>
            </div>

            <div class="bar-container">
                <div class="mp-fill"></div>
                <span class="bar-text">MP: <?= htmlspecialchars((string) ($mpBase ?? '0')) ?></span>
            </div>

            <div class="actions">
                <?php foreach (($ataques ?? []) as $ataque): ?>
                    <button class="btn"><?= htmlspecialchars((string) $ataque) ?></button>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

</body>
</html>