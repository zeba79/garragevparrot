<?php

require_once './lib/pdo.php';
require_once './lib/vehicule.php';
require_once './config/config.php';
require_once './lib/commentaire.php';
require_once './templates/header.php';
require_once './templates/main.php';

$vehicules = getVehicules($pdo, HOME_VEHICULES_LIMIT);
$commentaires = getCommentaires($pdo);

?>
<div class="container">

    <div class=" row d-md-flex justify-content-md-center">
            <a href="occasions.php" class="btn px-4 me-md-2 text-center parrot-color parrotbtn ">Découvrez toute notre gamme de Véhicules d'occasions</a>
        </div>
</div>
<div class="row">
    <?php foreach ($vehicules as $key => $vehicule) {
    require __DIR__ . '/templates/vehicule_part.php';
}?>
</div>


<?php
require_once './templates/readComment.php';
?>

<div class="avisClients">
    <?php
foreach ($commentaires as $key => $commentaire) {
    require './templates/avisClients.php';
}
?>
</div>
<?php
require_once './templates/leaveComment.php';
require_once './commentaireClients.php';
require_once './templates/footer.php';
?>