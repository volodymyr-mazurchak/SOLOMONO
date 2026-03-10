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
                <?php foreach ([1, 2, 3, 4] as $item): ?>
                    <a
                        href="#"
                        class="list-group-item list-group-item-action">
                        A <?= $item ?> link item
                    </a>
                <?php endforeach; ?>
            </div>
        </aside>
        <select class="form-select" id="sort">
            <option selected value="cheaper">Спочатку дешевші</option>
            <option value="alphabet">По алфавіту</option>
            <option value="new">Спочатку нові</option>
        </select>
        <div class="product">
            Product
        </div>
    </div>
</body>

</html>