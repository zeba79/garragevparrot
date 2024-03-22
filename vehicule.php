<?php
require_once './config/config.php';
require_once './lib/pdo.php';
require_once './lib/vehicule.php';

$errors = false;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $vehicule = getVehiculeById($pdo, $id);
    if (!$vehicule) {
        $errors = true;
    }
} else {
    $errors = true;
}

$imagePath = getVehiculesImage($vehicule['image']);

require_once './templates/header.php';

?>
<?PHP
if (!$errors) {?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Véhicule</title>
</head>
<body>

<div class="container ">
  <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
    <div class="col-10 col-sm-8 col-lg-6">
      <img src="<?=$imagePath?>" class="d-block mx-lg-auto img-fluid" alt="Garage vincent Parrot" width="700" height="500" loading="lazy">
    </div>
    <div class="col-lg-6">
    <div class="card-body">
                <h3 class="card-title"><?=htmlentities($vehicule['marque']);?></h3>
                <br>
                <p class="card-text">Prix : <?=htmlentities($vehicule['prix']);?></p>
                <p class="card-text">Mise en circulation : <?=htmlentities($vehicule['anneeImmatriculation']);?></p>
                <p class="card-text">Carburant : <?=htmlentities($vehicule['carburant']);?></p>
                <p class="card-text">Équipement : <?=htmlentities($vehicule['equipement']);?></p>
                <p class="card-text">Options : <?=htmlentities($vehicule['options']);?></p>
                <br>
            </div>
        <a href="occasions.php" class="btn  btn-lg px-4 me-md-2 parrot-color parrotbtn ">Voir nos véhicule d'Occasion</a>
    </div>
  </div>
</div>
<?PHP } else {?>
  <h1>Article introuvable</h1>

  <?PHP }?>


<div class="contacterAtelier">
    <h2>
        Contacter notre Atelier
    </h2>
</div>
</body>
</html>


<?php
require_once './templates/footer.php';

?>
