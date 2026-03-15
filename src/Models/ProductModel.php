<?php

namespace App\Models;

class ProductModel extends DatabaseModel
{
    public function getProducts(?int $categoryId = null, string $orderBy = 'price ASC'): array
    {
        $sql = "";

        if ($categoryId) $sql .= " WHERE categoryId = ?";
        $sql .= " ORDER BY {$orderBy}";

        $db = $this->getDB();
        $stmt = $db->prepare("SELECT name, price, date, photo FROM products {$sql}");
        $stmt->execute($categoryId ? [$categoryId] : []);

        return $stmt->fetchAll();
    }
}
