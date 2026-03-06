<?php

$db = new PDO('sqlite:' . __DIR__ . '/../database.sqlite');

$db->exec("
CREATE TABLE IF NOT EXISTS personagens (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nome TEXT NOT NULL,
    tipo TEXT NOT NULL COLLATE NOCASE UNIQUE,
    hp_base INTEGER NOT NULL,
    mp_base INTEGER NOT NULL,
    atk_base INTEGER NOT NULL,
    def_base INTEGER NOT NULL,
    descricao TEXT,
    ataques TEXT NOT NULL DEFAULT '[]'
)
");

echo 'OK';
