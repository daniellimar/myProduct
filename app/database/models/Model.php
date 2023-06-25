<?php

namespace app\database\models;

use app\database\Connection;
use PDO;

abstract class Model
{
    private string $fields = '*';

    public function setFields($fields)
    {
        $this->$fields = $fields;
    }
    public function fetchAll()
    {
        try {
            $sql = "SELECT {$this->fields} FROM {$this->table}";
            $connection = Connection::connect();

            $result = $connection->query($sql);
            return $result->fetchAll();

        } catch (\PDOException $e) {
            dd($e->getMessage());
        }
    }
    public function findBy($field, $value)
    {
        try {
            $sql = "SELECT {$this->fields} FROM {$this->table} where {$field} = :{$field}";
            $connection = Connection::connect();

            $prepare = $connection->prepare($sql);
            $prepare->execute([$field => $value]);

            return $prepare->fetchObject(get_called_class());
        } catch (\PDOException $e) {
            dd($e->getMessage());
        }
    }

    public function delete($field, $value)
    {
        try {
            $sql = "DELETE FROM {$this->table} where {$field} = :{$field}";
            $connection = Connection::connect();

            $prepare = $connection->prepare($sql);
            $prepare->execute([$field => $value]);

            return $prepare->fetchObject(get_called_class());
        } catch (\PDOException $e) {
            dd($e->getMessage());
        }
    }

    public function create(array $data)
    {
        try {
            $sql = "INSERT INTO  {$this->table} (";
            $sql .= implode(', ', array_keys($data)).") values (";
            $sql .= ':'.implode(', :', array_keys($data)).")";

            $connection = Connection::connect();
            $prepare = $connection->prepare($sql);
            return $prepare->execute($data);
        } catch (\PDOException $e) {
            dd($e->getMessage());
        }
    }

    public function update(string $field, string $fieldValue, array $data)
    {
        try {
            $sql = "UPDATE {$this->table} SET ";
            foreach ($data as $key => $value) {
                $sql .= "{$key} = :{$key}, ";
            }
            $sql = rtrim($sql, ', ');
            $sql .= " WHERE {$field} = :{$field} ";

            $data[$field] = $fieldValue;

            $connection = Connection::connect();
            $prepare = $connection->prepare($sql);
            return $prepare->execute($data);
        } catch (\PDOException $e) {
            dd($e->getMessage());
        }
    }
}