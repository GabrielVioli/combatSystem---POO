<?php

$db = new PDO('sqlite:' . __DIR__ . '/../database.sqlite');
$ids = $db->query("SELECT id FROM personagens WHERE nome IS NULL OR nome = ''")->fetchAll(PDO::FETCH_COLUMN);
$names = ['Arthas', 'Lyra', 'Doran', 'Selene', 'Kael', 'Morgana'];
$stmt = $db->prepare("UPDATE personagens SET nome = ? WHERE id = ?");

foreach ($ids as $id) {
    $stmt->execute([$names[array_rand($names)], $id]);
}

echo "OK";
