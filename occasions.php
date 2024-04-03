

<?php
require_once './config/config.php';
require_once './lib/pdo.php';
require_once './lib/vehicule.php';
require_once './templates/header.php';

$vehicules = getVehicules($pdo);
?>

<h1 class="text-center">Bienvenue sur notre page Mécanique</h1>

<div class="container">

    <div class="row">
        <?php foreach ($vehicules as $key => $vehicule) {
    require __DIR__ . '/templates/vehicule_part.php';
}?>
    </div>
</div>





<?php
require_once './templates/footer.php';

?>