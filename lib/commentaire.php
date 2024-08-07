<?php

function getCommentairesById(PDO $pdo, int $limit = null, int $page = null): array

//  suppression de cette clause dans le $sql : WHERE statut = "oui" ORDER BY id DESC
{
    $sql = 'SELECT * FROM comments  ';
    if ($limit && !$page) {
        $sql .= "LIMIT :limit";
    }

    if ($page) {
        $sql .= "LIMIT :offset, :limit";
    }
    $recupererCommentaires = $pdo->prepare($sql);

    if ($limit) {
        $recupererCommentaires->bindValue(":limit", $limit, PDO::PARAM_INT);
    }
    if ($page) {
        $offset = ($page - 1) * $limit;
        $recupererCommentaires->bindValue(":offset", $offset, PDO::PARAM_INT);
    }

    $recupererCommentaires->execute();
    $commentaires = $recupererCommentaires->fetchAll(PDO::FETCH_ASSOC);
    return $commentaires;
}

function getTotalComments(PDO $pdo)
{
    $sql = 'SELECT COUNT(*) as total FROM comments';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result["total"];
}
// function getAllCommentaires(PDO $pdo): array
// {
//     $sql = 'SELECT * FROM comments ORDER BY id';
//     $recupTousCommentaires = $pdo->prepare($sql);
//     $recupTousCommentaires->execute();
//     $commentaires = $recupTousCommentaires->fetchAll(PDO::FETCH_ASSOC);
//     return $commentaires;
// }
