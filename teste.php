<!-- <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <h1>Hello, world!</h1>
<div class="container">
    <div class="row text-center">
        <div class="col-md-4 my-2">
                <div class="card">
                        <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
        </div>
    </div>
</div>
 </body>
</html> -->



<?php

require_once './lib/menu.php';
require_once './config/config.php';
require_once './lib/vehicule.php';
require_once './lib/pdo.php';
require_once './templates/header.php';
require_once './templates/main.php';

$vehicules = getVehicules($pdo);

?>

<?php
foreach ($vehicules as $key => $vehicule) {?>

<div class="container">
    <div class="row text-center">
        <div class="col-md-4 my-2">
             <div class="card">
                <img src="<?=UPLOADS_IMAGES . htmlentities($vehicule['image']);?>" class="card-img-top" alt="Logo Audi">
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
