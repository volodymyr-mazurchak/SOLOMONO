<?php

require __DIR__ . '/vendor/autoload.php';

use App\Models\CategoryModel;
use App\Constants\SelectEnum;

$categoryModel = new CategoryModel();
$categories = $categoryModel->getCategories();
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
        <div class="product">
            Product
        </div>
    </div>
</body>

</html>