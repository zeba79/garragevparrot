<?php

// récupérer tous les véhicules de la base de données
// La limite ne fonctionne pas sur la page /admin/vehicules.php : à refaire plus tard pour limiter le nombre de véhicules à afficher
// La limite ne fonctionne pas sur la page indexs.php : à faire plus tard pour gérer la pagination
function getVehicules(PDO $pdo, int $limit = null, int $page = null): array
{
    $sql = 'SELECT * FROM vehicules ';

    if ($limit && !$page) {
        $sql .= "LIMIT :limit";
    }
    if ($page) {
        $sql .= "LIMIT :offset, :limit";
    }

    $query = $pdo->prepare($sql);

    if ($limit) {
        $query->bindValue(":limit", $limit, PDO::PARAM_INT);
    }
    if ($page) {
        $offset = ($page - 1) * $limit;
        $query->bindValue(":offset", $offset, PDO::PARAM_INT);
    }

    $query->execute();
    $vehicules = $query->fetchAll(PDO::FETCH_ASSOC);

    return $vehicules;
}

// récupérer un véhicule suivant son ID
function getVehiculeById(PDO $pdo, int $id): array | bool
{
    $sql = 'SELECT * FROM vehicules WHERE id = :id';
    $recupererId = $pdo->prepare($sql);
    $recupererId->bindParam(":id", $id, PDO::PARAM_INT);
    $recupererId->execute();
    $vehicules = $recupererId->fetch(PDO::FETCH_ASSOC);
    return $vehicules;
}

// récupérer un véhicule suivant son image
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

// Récupérer le nombre total de véhicules
function getTotalVehicules(PDO $pdo)
{
    $sql = "SELECT COUNT(*) as total FROM vehicules; ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result["total"];
}
