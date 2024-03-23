

<?php

require_once './config/config.php';
require_once './lib/pdo.php';
require_once './lib/vehicule.php';
require_once './templates/header.php';
require_once './templates/main.php';

$vehicules = getVehicules($pdo);
?>

<div class="row">
    <?php foreach ($vehicules as $key => $vehicule) {
    require_once './templates/vehicule_part.php';

}?>
</div>

<?php
require_once './partials/avisClients.php';
require_once './templates/commentaireClients.php';

?>
<?php
require_once './templates/footer.php';

?>