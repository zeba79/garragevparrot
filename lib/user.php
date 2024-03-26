<?php

function verifyLoginUserAndPassword(PDO $pdo, string $emailForm, string $passwordForm): array | bool
{
    //  Création requette de récupération de l'utilisateur par son email
    $sql = 'SELECT * FROM users WHERE email = :email';
    $query = $pdo->prepare($sql);
    $query->bindValue(':email', $emailForm, PDO::PARAM_STR);
    $query->execute();
    $user = $query->fetch(PDO::FETCH_ASSOC);

    // Condition si utilisateur et mot de passe vérifié
    if ($user && password_verify($passwordForm, $user["password"])) {
        return $user;
    } else {
        return false;

    }
}
