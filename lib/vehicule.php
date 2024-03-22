<?php
require_once './lib/pdo.php';

function getVehicules(PDO $pdo, int $limit = null): array
{
    $sql = 'SELECT * From vehicules ORDER BY id DESC';

    if ($limit) {
        $sql .= "LIMIT :limit";
    }
    $query = $pdo->prepare($sql);

    if ($limit) {$query->bindValue(":limit", $limit, PDO::PARAM_INT);
    }
    $query->execute();
    $vehicules = $query->fetchAll(PDO::FETCH_ASSOC);

    return $vehicules;
}

function getVehiculeById(PDO $pdo, int $id): array
{
    $sql = 'SELECT * FROM vehicules WHERE id = :id';
    $recupererId = $pdo->prepare($sql);
    $recupererId->bindParam(":id", $id, PDO::PARAM_INT);
    $recupererId->execute();
    $vehicules = $recupererId->fetch(PDO::FETCH_ASSOC);
    return $vehicules;
}
