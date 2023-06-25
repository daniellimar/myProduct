<?php

namespace app\database\models;

use app\database\Connection;

class Product extends Model
{
    protected string $table = 'Product';

    public function Join($field)
    {
        try {
            $sql = "SELECT c.id, c.name
                FROM Category c
                JOIN Product_Category pc ON c.id = pc.category_id
                WHERE pc.product_id = :product_id";
            $connection = Connection::connect();

            $prepare = $connection->prepare($sql);
            $prepare->execute(['product_id' => $field]);

            return $prepare->fetchAll();
        } catch (\PDOException $e) {
            dd($e->getMessage());
        }
    }
}