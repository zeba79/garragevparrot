<?php
function getEmployesByRole(PDO $pdo, int $limit = null, int $page = null): array
{
    $sql = 'SELECT * FROM users WHERE role = "employe"';

    if ($limit && !$page) {
        $sql .= "LIMIT :limit";
    }
    if ($page) {
        $sql .= "LIMIT :offset, :limit";
    }

    $stmt = $pdo->prepare($sql);

    if ($limit) {
        $stmt->bindValue(":limit", $limit, PDO::PARAM_INT);
    }
    if ($page) {
        $offset = ($page - 1) * $limit;
        $stmt->bindValue(":offset", $offset, PDO::PARAM_INT);
    }

    $stmt->execute();
    $employes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $employes;
}

function getTotalEmployees(PDO $pdo)
{
    $sql = 'SELECT COUNT(*) as total FROM users WHERE role = "employe" ';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result["total"];
}
