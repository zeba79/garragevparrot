<?php

try {
    $pdo = new PDO('mysql:host=mysql-zeba.alwaysdata.net;dbname=zeba_garagevparrot;charset=utf8mb4', 'zeba_parrotv', 'Zebson79');
} catch (PDOException $e) {
    echo 'Erreur de connexion à la base de donnée' . $e->getMessage();
}
