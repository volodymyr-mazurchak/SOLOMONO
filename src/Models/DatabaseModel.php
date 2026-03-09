<?php

namespace App\Models;

class DatabaseModel
{
    /**
     * @return PDO
     */
    public function getDB(): mixed
    {
        return require __DIR__ . '/../Config/ConfigDB.php';
    }
}
