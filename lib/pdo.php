<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=garagevparrot;charset=utf8mb4', 'root', '');
} catch (PDOException $e) {
    echo 'Erreur de connexion à la base de donnée' . $e->getMessage();
}
