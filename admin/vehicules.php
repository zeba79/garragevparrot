<?php

require_once __DIR__ . "/../lib/pdo.php";
require_once __DIR__ . "/../lib/vehicule.php";
require_once __DIR__ . "/../admin/templates/header.php";
$vehicules = getVehicules($pdo);
?>
<h1>Liste des véhicules</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Marque</th>
      <th scope="col">Année</th>
      <th scope="col">Kilométrage</th>
      <th scope="col">Prix</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

  <?php
foreach ($vehicules as $vehicule) {?>
    <td scope="row"><?=$vehicule["id"];?></td>
    <td scope="row"><?=$vehicule["marque"];?></td>
    <td scope="row"><?=$vehicule["anneeImmatriculation"];?></td>
    <td scope="row"><?=$vehicule["kilometrage"];?></td>
    <td scope="row"><?=$vehicule["prix"];?></td>
    <td>
        <button class="parrotbtn" type="button">Modifier</button>
    </td>
    <td>
        <button class="parrotbtn" type="button">Supprimer</button>
    </td>

    </tr>
<?php }?>

  </tbody>
</table>


<?php
require_once __DIR__ . "/../admin/templates/footer.php";
?>