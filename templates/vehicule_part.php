<?php
// condition si image = null alors charge image par defaut sinon charge l'image depuis le dossier upload

$imagePath = getVehiculesImage($vehicule['image']);

?>

<div class="col-md-3 my-2 py-3">
    <div class="card">
        <img src="<?=$imagePath?>" class="card-img-top" alt="Logo Audi">
            <div class="card-body">
                <h3 class="card-title"><?=htmlentities($vehicule['marque']);?></h3>
                <p class="card-text">Prix : <?=htmlentities($vehicule['prix']);?></p>
                <p class="card-text">Mise en circulation : <?=htmlentities($vehicule['anneeImmatriculation']);?></p>
                <p class="card-text">Carburant : <?=htmlentities($vehicule['carburant']);?></p>
                <p class="card-text">Kilométrage : <?=htmlentities($vehicule['kilometrage']);?></p>
                <br>
                <a href="vehicule.php?id=<?=$vehicule['id']?>" class="btn parrotbtn">Voir Détails</a>
            </div>
    </div>
</div>