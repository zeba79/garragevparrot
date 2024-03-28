<?php

require_once __DIR__ . "/../lib/pdo.php";
require_once __DIR__ . "/../lib/vehicule.php";
require_once __DIR__ . "/../admin/templates/header.php";
$vehicules = getVehicules($pdo);
?>

<h1>Hello</h1>



<?php
require_once __DIR__ . "/../admin/templates/footer.php";
?>