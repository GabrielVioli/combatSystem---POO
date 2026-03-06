<?php
namespace App\utils;

use App\Core\Database;
//criado pra faciltar a obtenção dos dados do banco e utilizar em SetupController

class Utils {

    public function all() {
        $db = Database::connect();
        $stmt = $db->query("select * from personagens");
        $all = $stmt->fetchAll();

        return $all;
    }

    public function show($id) {
        $db = Database::connect();

        $stmt = $db->prepare("SELECT * FROM personagens WHERE id = :id");
        $stmt->execute(['id' => $id]);

        return $stmt->fetch();
    }
}