<?php
require_once './lib/pdo.php';

function getVehicules(PDO $pdo, int $limit = null): array
{
    $sql = 'SELECT * From vehicules ORDER BY id DESC';

    if ($limit) {
        $sql .= "LIMIT :limit";
    }
    $query = $pdo->prepare($sql);

    if ($limit) {$query->bindParam(":limit", $limit, PDO::PARAM_INT);
    }
    $query->execute();

    $vehicules = $query->fetchAll(PDO::FETCH_ASSOC);

    return $vehicules;
}
