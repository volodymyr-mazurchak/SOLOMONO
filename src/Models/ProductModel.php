<?php

namespace App\Models;

class ProductModel extends DatabaseModel
{
    public function getProducts(string $sql = ''): array
    {
        $db = $this->getDB();
        $stmt = $db->prepare("SELECT name, price, date, photo FROM products {$sql}");
        $stmt->execute();

        return $stmt->fetchAll();
    }
}
