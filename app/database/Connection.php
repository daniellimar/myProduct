<?php

namespace app\database;

use PDO;
use PDOException;

class Connection
{
    private static $connection = null;

    public static function connect()
    {
        $dsn = "mysql:host=db;dbname=arqmedes_alpha_test;";
        $user = 'root';
        $password = '12345678';

        try {
            if (!self::$connection) {
                self::$connection = new PDO($dsn, $user, $password, [
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
                ]);
            }
        } catch (PDOException $e) {
            echo "Erro de conexão: " . $e->getMessage();
        }
        return self::$connection;
    }
}