<?php

function getCommentaires(PDO $pdo): array
{
    $sql = 'SELECT * FROM comments ORDER BY id DESC';
    $recupererCommentaires = $pdo->prepare($sql);
    $recupererCommentaires->execute();
    $commentaires = $recupererCommentaires->fetchAll(PDO::FETCH_ASSOC);
    return $commentaires;
}
