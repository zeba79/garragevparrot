<?php
require_once './config/config.php';
require_once './lib/pdo.php';
require_once './lib/vehicule.php';
require_once './lib/commentaire.php';
require_once './templates/header.php';
require_once './templates/main.php';

$vehicules = getVehicules($pdo);
$commentaires = getCommentaires($pdo);
?>


    <?php foreach ($vehicules as $key => $vehicule) {
    require_once './templates/vehicule_part.php';
}?>


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