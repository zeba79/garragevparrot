<?php

require_once __DIR__ . "/../config/config.php";
require_once __DIR__ . "/../lib/pdo.php";
require_once __DIR__ . "/../lib/vehicule.php";
require_once __DIR__ . "/../admin/templates/header.php";

// if (isset($_GET["page"])) {
//     echo $_GET["page"];
//     $page = (int) $_GET["page"];
// } else {
//     $page = 1;
// }

$vehicules = getVehicules($pdo);

$totalPages = ceil(getTotalVehicules($pdo) / ADMIN_VEHICULES_LIMIT);
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
<tr>
    <?php
foreach ($vehicules as $vehicule) {?>
          <td scope="row"><?=$vehicule["id"];?></td>
          <td scope="row"><?=$vehicule["marque"];?></td>
          <td scope="row"><?=$vehicule["anneeImmatriculation"];?></td>
          <td scope="row"><?=$vehicule["kilometrage"];?></td>
          <td scope="row"><?=$vehicule["prix"];?></td>
          <td>
              <a href="#" class="btn btn-success">Ajouter</a>
              <a href="#" class="btn btn-primary">Modifier</a>
              <a href="#" class="btn btn-danger ">Supprimer</a>
          </td>

 </tr>
    <?php }?>
  </tbody>
</table>

<?php
if ($totalPages > 1) {?>
<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
<?php
for ($i = 1; $i <= $totalPages; $i++) {?>
    <li class="page-item"><a class="page-link" href="?page=<?=$i?>"><?=$i?></a></li>
    <?php }?>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul>
</nav>
<?php }
?>


<?php
require_once __DIR__ . "/../admin/templates/footer.php";
?>
