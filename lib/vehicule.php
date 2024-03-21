<?php
require_once './lib/pdo.php';

function getVehicules(PDO $pdo)
{
    $sql = ('SELECT * From vehicules');
    $getvehicule = $pdo->prepare($sql);
    $getvehicule->execute();

    $vehicules = $getvehicule->fetchAll(PDO::FETCH_ASSOC);

    return $vehicules;

}
