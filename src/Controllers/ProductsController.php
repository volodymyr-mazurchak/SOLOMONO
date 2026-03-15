<?php

require __DIR__ . '/../../vendor/autoload.php';

use App\Models\ProductModel;
use App\Constants\SelectEnum;

$categoryId = (int) $_GET['categoryId'] ?? null;
$sort = $_GET['sort'] ?? SelectEnum::CHEAPER->value;

$orderBy = match ($sort) {
    SelectEnum::CHEAPER->value => 'price ASC',
    SelectEnum::ALPHABET->value => 'name ASC',
    SelectEnum::NEW->value => 'date DESC',
    default => 'price ASC'
};

$products = new ProductModel()->getProducts($categoryId, $orderBy);

echo json_encode($products);
