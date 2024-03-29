<?php
function getEmployesByRole(PDO $pdo): array
{
    $sql = 'SELECT * FROM users WHERE role = "employe"';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $employes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $employes;
}
