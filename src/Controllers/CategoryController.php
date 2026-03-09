<?php

namespace App\Controllers;

use App\Models\DatabaseModel;

class CategoryController
{
    private $_db;

    public function __construct()
    {
        $this->_db = new DatabaseModel()->getDB();
    }
}
