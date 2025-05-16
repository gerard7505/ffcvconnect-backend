<?php
// db.php

// Obtener DATABASE_URL de las variables de entorno
$databaseUrl = getenv('DATABASE_URL');

if (!$databaseUrl) {
    die('No se encontró la variable de entorno DATABASE_URL');
}

// Parsear la URL en sus componentes
$dbopts = parse_url($databaseUrl);

$host = $dbopts['host'];
$port = $dbopts['port'] ?? 5432;
$user = $dbopts['user'];
$password = $dbopts['pass'];
$dbname = ltrim($dbopts['path'], '/');

try {
    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";
    $pdo = new PDO($dsn, $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    die('Error conectando a la base de datos: ' . $e->getMessage());
}
