<?php

$options = [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
];

try {
    $db = new PDO('sqlite:' . __DIR__ . '/../DB/solomono.db', null, null, $options);
} catch (PDOException $e) {
    error_log('DB connection failed: ' . $e->getMessage());
    throw new RuntimeException('DB connection failed.', 0, $e);
}

return $db;
