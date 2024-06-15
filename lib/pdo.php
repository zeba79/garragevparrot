<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=garagevparrot;', 'root', '');
} catch (PDOException $e) {
    echo 'Erreur de connexion à la base de donnée' . $e->getMessage();
}
