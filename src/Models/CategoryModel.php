<?php

namespace App\Models;

class CategoryModel extends DatabaseModel
{
    public function getCategories(): array
    {
        $db = $this->getDB();
        $stmt = $db->prepare("SELECT name FROM categories");
        $stmt->execute();

        return $stmt->fetchAll();
    }
}
