

<?php

require_once './lib/menu.php';
require_once './config/config.php';
require_once './lib/pdo.php';
require_once './templates/header.php';

$sql = ('SELECT * From vehicules');
$getvehicule = $pdo->prepare($sql);
$getvehicule->execute();

$vehicules = $getvehicule->fetchAll(PDO::FETCH_ASSOC);

?>
<?php
require_once './templates/main.php';

?>

<?php
foreach ($vehicules as $key => $vehicule) {?>
<div class="container">
    <div class="col-md-3 my-2 py-3">
        <div class="card">
            <img src="/uploads/vehicules/<?=htmlentities($vehicule['image']);?>" class="card-img-top" alt="Logo Audi">
            <div class="card-body">
                <h5 class="card-title"><?=htmlentities($vehicule['marque']);?></h5>
                <p class="card-text">Prix : <?=htmlentities($vehicule['prix']);?></p>
                <p class="card-text">Mise en circulation : <?=htmlentities($vehicule['anneeImmatriculation']);?></p>
                <p class="card-text">Carburant : <?=htmlentities($vehicule['carburant']);?></p>
                <p class="card-text">Kilométrage : <?=htmlentities($vehicule['kilometrage']);?></p>
                <a href="#" class="btn parrotbtn">Voir nos véhicules d'occasion</a>
            </div>
        </div>
    </div>
</div>

<?php }?>

<?php
require_once './partials/avisClients.php';

?>
<?php
require_once './templates/footer.php';

?>