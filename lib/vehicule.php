<?php

function getVehicules(PDO $pdo, int $limit = null): array
{
    $sql = 'SELECT * From vehicules ORDER BY id ASC';

    if ($limit) {
        $sql .= "LIMIT :limit";
    }
    $query = $pdo->prepare($sql);

    if ($limit) {$query->bindValue(":limit", $limit, PDO::PARAM_INT);}
    $query->execute();
    $vehicules = $query->fetchAll(PDO::FETCH_ASSOC);

    return $vehicules;
}

function getVehiculeById(PDO $pdo, int $id): array | bool
{
    $sql = 'SELECT * FROM vehicules WHERE id = :id';
    $recupererId = $pdo->prepare($sql);
    $recupererId->bindParam(":id", $id, PDO::PARAM_INT);
    $recupererId->execute();
    $vehicules = $recupererId->fetch(PDO::FETCH_ASSOC);
    return $vehicules;
}

function getVehiculesImage(string | null $image): string
{
// condition si image = null alors charge image par defaut sinon charge l'image depuis le dossier upload
    if ($image === null) {
        $imagePath = DEFAULT_IMAGES . "defaultcar.jpg";
    } else {
        $imagePath = UPLOADS_IMAGES . htmlentities($image);
    }
    return $imagePath;
}
