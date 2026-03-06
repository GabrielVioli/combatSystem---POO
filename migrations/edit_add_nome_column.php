<?php

try {
    $db = new PDO('sqlite:' . __DIR__ . '/../database.sqlite');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $columns = $db->query("PRAGMA table_info(personagens)")->fetchAll(PDO::FETCH_ASSOC);
    $columnNames = array_map(static fn(array $column): string => strtolower((string) $column['name']), $columns);


    $db->exec("ALTER TABLE personagens ADD COLUMN nome TEXT");
    echo "Coluna 'nome' adicionada com sucesso.";

} catch (Throwable $e) {
    echo "Erro ao editar o banco: " . $e->getMessage();
}
