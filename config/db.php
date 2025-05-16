<?php
// config/db.php

$databaseUrl = getenv('DATABASE_URL');

if (!$databaseUrl) {
    die('DATABASE_URL no está definido en las variables de entorno.');
}

$parts = parse_url($databaseUrl);
$host = $parts['host'];
$port = $parts['port'] ?? 5432;
$user = $parts['user'];
$pass = $parts['pass'];
$dbname = ltrim($parts['path'], '/');

$dsn = "pgsql:host=$host;port=$port;dbname=$dbname";

try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
} catch (PDOException $e) {
    die('Error conectando a la base de datos: ' . $e->getMessage());
}
