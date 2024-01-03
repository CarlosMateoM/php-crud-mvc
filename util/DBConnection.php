<?php

namespace util;

use PDO;
use PDOException;

class DBConnection
{

    private PDO $pdo;
    private static ?DBConnection $dbConnection = null;

    private function __construct()
    {
        try {
            $this->pdo = new PDO("mysql:host=localhost;dbname=to_do_db_test", 'root', '');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("database connection failed: " . $e->getMessage());
        }
    }

    public static function getInstance()
    {
        if (!self::$dbConnection) {
            self::$dbConnection = new DBConnection();
        }

        return self::$dbConnection;
    }

    public function getPdo()
    {
        return $this->pdo;
    }

}
