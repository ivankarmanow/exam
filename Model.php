<?php

class Model {
    private static PDO $pdo;

    public static function init() {
        self::$pdo = new PDO("mysql:host=127.127.126.50;dbname=eko", "root", "");
    }

    public static function select(string $query): array {
        $stmt = self::$pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function execute(string $query): void {
        $stmt = self::$pdo->exec($query);
    }
}