<?php

namespace App\Models;

class CategoryModel extends DatabaseModel
{
    public function getCategories(): array
    {
        $db = $this->getDB();
        $stmt = $db->prepare("SELECT categories.name, COUNT(products.id) AS totalProducts FROM categories JOIN products ON categories.id = products.categoryId GROUP BY categories.id");
        $stmt->execute();

        return $stmt->fetchAll();
    }
}
