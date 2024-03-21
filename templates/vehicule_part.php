<div class="col-md-4 my-2">
    <div class="card">
        <img src="<?=UPLOADS_IMAGES . htmlentities($vehicule['image']);?>" class="card-img-top" alt="Logo Audi">
            <div class="card-body">
                <h5 class="card-title"><?=htmlentities($vehicule['marque']);?></h5>
                <p class="card-text">Prix : <?=htmlentities($vehicule['prix']);?></p>
                <p class="card-text">Mise en circulation : <?=htmlentities($vehicule['anneeImmatriculation']);?></p>
                <p class="card-text">Carburant : <?=htmlentities($vehicule['carburant']);?></p>
                <p class="card-text">Kilométrage : <?=htmlentities($vehicule['kilometrage']);?></p>
                <a href="vehicule.php,id=<?=$vehicule['id']?>" class="btn parrotbtn">Voir Détails</a>
            </div>
    </div>
</div>