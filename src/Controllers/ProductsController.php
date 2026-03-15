<?php

require __DIR__ . '/../../vendor/autoload.php';

use App\Models\ProductModel;
use App\Constants\SelectEnum;

$categoryId = $_GET['categoryId'] ?? "";
$sort = $_GET['sort'] ?? SelectEnum::CHEAPER->value;

$orderBy = match ($sort) {
    SelectEnum::CHEAPER->value => 'price ASC',
    SelectEnum::ALPHABET->value => 'name ASC',
    SelectEnum::NEW->value => 'date DESC',
    default => 'price ASC'
};

$sql = "";

if ($categoryId) $sql .= " WHERE categoryId = {$categoryId}";
$sql .= " ORDER BY $orderBy";

$products = new ProductModel()->getProducts($sql);

echo json_encode($products);
