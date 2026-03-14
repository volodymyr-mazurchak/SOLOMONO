<?php

require __DIR__ . '/../../vendor/autoload.php';

use App\Models\ProductModel;

$categoryId = $_GET['categoryId'];
$products = new ProductModel()->getProducts("WHERE categoryId = {$categoryId}");

echo json_encode($products);
