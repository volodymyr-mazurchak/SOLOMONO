<?php

namespace App\Models;

class ProductModel extends DatabaseModel
{
    public function getProducts(): array
    {
        $db = $this->getDB();
        $stmt = $db->prepare("SELECT name, price, date, photo FROM products");
        $stmt->execute();

        return $stmt->fetchAll();
    }
}
