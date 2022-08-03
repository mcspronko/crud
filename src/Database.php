<?php

declare(strict_types=1);

namespace Pronko\Crud;

use PDO;

class Database
{
    private static PDO $pdo;

    private static function connect()
    {
        $config = require_once dirname(__DIR__) . '/config/database.php';
        $dsn = sprintf(
            'mysql:host=%s;dbname=%s;port=%s',
            $config['host'],
            $config['dbname'],
            $config['port']
        );
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];

        try {
            self::$pdo = new PDO($dsn, $config['user'], $config['password'], $options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public static function get(): PDO
    {
        if (empty(static::$pdo)) {
            self::connect();
        }
        return static::$pdo;
    }
}
