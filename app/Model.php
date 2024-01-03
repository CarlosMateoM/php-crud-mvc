<?php

namespace app;

use PDO;
use util\DBConnection;

class Model
{

    private PDO $pdo;
    protected string $table;

    public function __construct()
    {
        $this->pdo = DBConnection::getInstance()->getPdo();
    }


    public function all(string $query = '')
    {
        $sql = "SELECT * FROM $this->table WHERE $this->table.name LIKE ?";
        $prepare = $this->pdo->prepare($sql);
        $prepare->bindValue(1, "%$query%");
        $prepare->execute();
        $objects = $prepare->fetchAll(PDO::FETCH_OBJ);
        return $objects;
    }

    public function find(int $id)
    {
        $sql = "SELECT * FROM $this->table WHERE id = :id";
        $prepare = $this->pdo->prepare($sql);
        $prepare->bindParam(':id', $id);
        $prepare->execute();
        return $prepare->fetch(PDO::FETCH_OBJ);
    }

    public function create($data)
    {
        $i = 1;
        $sql = "INSERT INTO $this->table (" . implode(",", array_keys($data)) . ") VALUES(" . implode(",", array_fill(0, count($data), "?")) . ")";
        $prepare = $this->pdo->prepare($sql);
        foreach ($data as $key => $value) {
            $prepare->bindValue($i, $value);
            $i++;
        }
        $prepare->execute();

        return true;
    }


    public function delete(int $id)
    {
        $sql = "DELETE FROM $this->table WHERE id = :id";
        $prepare = $this->pdo->prepare($sql);
        $prepare->bindParam(':id', $id);
        $prepare->execute();
    }

    public function update(array $data, int $id)
    {

        $i = 1;
        $keys = array_keys($data);
        
        $updateSql = array_map(function ($key) {
            return "SET $key = ?";
        }, $keys);

        $sql = "UPDATE $this->table " . implode(', ', $updateSql) . " WHERE id = ?";
        $prepare = $this->pdo->prepare($sql);

        foreach ($data as $key => $value) {
            $prepare->bindValue($i, $value);
            $i++;
        }

        $prepare->bindValue($i, $id);
        $prepare->execute();
    }
}
