<?php

$options = [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

$db = new PDO('sqlite:' . __DIR__ . '/../DB/solomono.db', null, null, $options);

return $db;
