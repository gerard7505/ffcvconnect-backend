<?php
// config/db.php

$dsn = getenv('DATABASE_URL');

try {
    $pdo = new PDO($dsn);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Error conectando a la base de datos: ' . $e->getMessage());
}

