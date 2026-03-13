<?php

namespace App\Models;

class ProductModel extends DatabaseModel
{
    public function getProducts(string $whereStmt = ''): array
    {
        $db = $this->getDB();
        $stmt = $db->prepare("SELECT name, price, date, photo FROM products {$whereStmt}");
        $stmt->execute();

        return $stmt->fetchAll();
    }
}
