<?php
try {
    $conexao = new PDO("mysql:host=localhost;dbname=movie_catalog2;charset=utf8mb4",
    "root", "", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $erro) {
    echo "Connection error " . $erro->getMessage();
}
?>