<?php

require __DIR__ . '/vendor/autoload.php';

use App\Models\{CategoryModel, ProductModel};
use App\Constants\SelectEnum;

$categoryModel = new CategoryModel();
$productModel = new ProductModel();

$categories = $categoryModel->getCategories();
$products = $productModel->getProducts();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SOLOMONO TEST WORK</title>
    <link rel="stylesheet" href="/src/assets/styles/index.css">
    <link rel="stylesheet" href="/src/assets/styles/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <aside class="category">
            <div class="list-group">
                <?php foreach ($categories as $category): ?>
                    <a
                        href="#"
                        class="list-group-item list-group-item-action">
                        <?= $category['name'] ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </aside>
        <select class="form-select" id="sort">
            <?php foreach (SelectEnum::cases() as $case): ?>
                <option value="<?= $case->value ?>">
                    <?= match ($case) {
                        SelectEnum::CHEAPER => 'Спочатку дешевші',
                        SelectEnum::ALPHABET => 'По алфавіту',
                        SelectEnum::NEW => 'Спочатку нові',
                    } ?>
                </option>
            <?php endforeach; ?>
        </select>
        <div class="products">
            <?php foreach ($products as $product): ?>
                <div class="card">
                    <img src="/src/assets/img/<?= $product['photo'] ?>" class="card-img-top" alt="Product photo">
                    <div class="card-body">
                        <h5 class="card-title"><?= $product['name'] ?></h5>
                        <div class="info">
                            <span class="price">$<?= $product['price'] ?></span>
                            <a href="#" class="btn btn-primary">Купить</a>
                        </div>
                        <span class="date">Опубліковано: <?= $product['date'] ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>