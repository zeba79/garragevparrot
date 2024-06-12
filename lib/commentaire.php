<?php

function getCommentairesById(PDO $pdo, int $limit = null): array
{
    $sql = 'SELECT * FROM comments WHERE statut = "oui"  ';
    if ($limit) {
        $sql .= "LIMIT :limit";
    }

    $recupererCommentaires = $pdo->prepare($sql);

    if ($limit) {
        $recupererCommentaires->bindValue(":limit", $limit, PDO::PARAM_INT);
    }

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
