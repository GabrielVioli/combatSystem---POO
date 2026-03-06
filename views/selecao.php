<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Selecao</title>
</head>
<body>
    <h2>Mago</h2>
    <p>Nome: <?= htmlspecialchars((string) ($mago ?? ''), ENT_QUOTES, 'UTF-8') ?></p>
    <p>Tipo: <?= htmlspecialchars((string) ($tipo ?? ''), ENT_QUOTES, 'UTF-8') ?></p>
    <p>HP: <?= htmlspecialchars((string) ($hpBase ?? ''), ENT_QUOTES, 'UTF-8') ?></p>
    <p>MP: <?= htmlspecialchars((string) ($mpBase ?? ''), ENT_QUOTES, 'UTF-8') ?></p>
    <p>ATTACK: <?= htmlspecialchars((string) ($atkBase ?? ''), ENT_QUOTES, 'UTF-8') ?></p>
    <p>DEFESA: <?= htmlspecialchars((string) ($defBase ?? ''), ENT_QUOTES, 'UTF-8') ?></p>
    <p>DESCRICAO: <?= htmlspecialchars((string) ($descricao ?? ''), ENT_QUOTES, 'UTF-8') ?></p>

    <h2>Guerreiro</h2>
    <p>Nome: <?= htmlspecialchars((string) ($guerreiro ?? ''), ENT_QUOTES, 'UTF-8') ?></p>
    <p>Tipo: <?= htmlspecialchars((string) ($tipoG ?? ''), ENT_QUOTES, 'UTF-8') ?></p>
    <p>HP: <?= htmlspecialchars((string) ($hpBaseG ?? ''), ENT_QUOTES, 'UTF-8') ?></p>
    <p>MP: <?= htmlspecialchars((string) ($mpBaseG ?? ''), ENT_QUOTES, 'UTF-8') ?></p>
    <p>ATTACK: <?= htmlspecialchars((string) ($atkBaseG ?? ''), ENT_QUOTES, 'UTF-8') ?></p>
    <p>DEFESA: <?= htmlspecialchars((string) ($defBaseG ?? ''), ENT_QUOTES, 'UTF-8') ?></p>
    <p>DESCRICAO: <?= htmlspecialchars((string) ($descricaoG ?? ''), ENT_QUOTES, 'UTF-8') ?></p>
</body>
</html>
