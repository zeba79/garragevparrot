<?php

function getCommentairesById(PDO $pdo): array
{
    $sql = 'SELECT * FROM comments ORDER BY id DESC limit 3';
    $recupererCommentaires = $pdo->prepare($sql);
    $recupererCommentaires->execute();
    $commentaires = $recupererCommentaires->fetchAll(PDO::FETCH_ASSOC);
    return $commentaires;
}

function getAllCommentaires(PDO $pdo): array
{
    $sql = 'SELECT * FROM comments ORDER BY id';
    $recupTousCommentaires = $pdo->prepare($sql);
    $recupTousCommentaires->execute();
    $commentaires = $recupTousCommentaires->fetchAll(PDO::FETCH_ASSOC);
    return $commentaires;
}
