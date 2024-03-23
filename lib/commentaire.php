<?php

function getCommentaires(PDO $pdo): array
{
    $sql = 'SELECT * FROM comments';
    $recupererCommentaires = $pdo->prepare($sql);
    $recupererCommentaires->execute();
    $commentaires = $recupererCommentaires->fetchAll(PDO::FETCH_ASSOC);
    return $commentaires;
}
