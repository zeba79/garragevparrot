<?php
require_once __DIR__ . "/../config/config.php";
require_once __DIR__ . "/../lib/pdo.php";
require_once __DIR__ . "/../lib/vehicule.php";
require_once __DIR__ . "/../admin/templates/header.php";

$totalPages = ceil(getTotalVehicules($pdo) / ADMIN_VEHICULES_LIMIT);

//  récupération du numéro de page
if (isset($_GET["page"]) && $_GET["page"] > 0 && $_GET["page"] <= $totalPages) {
    (int) $page = (int) $_GET["page"];
} else {
    (int) $page = 1;
}

(int) $currentPage = $page;
$vehicules = getVehicules($pdo, ADMIN_VEHICULES_LIMIT, $page);

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
              <td scope="row">
                <?=$vehicule["id"];?>
              </td>
              <td scope="row">
                <?=$vehicule["marque"];?>
              </td>
              <td scope="row">
                <?=$vehicule["anneeImmatriculation"];?>
              </td>
              <td scope="row">
                <?=$vehicule["kilometrage"];?>
              </td>
              <td scope="row">
                <?=$vehicule["prix"];?>
              </td>
            <td>
                  <a href="/admin/modifierVehicule.php?id=<?=$vehicule['id']?>"
                      class="btn btn-primary"
                      onclick=" return confirm('Êtes-vous sûr de vouloir modifier ce véhicule ?')">
                      Modifier
                  </a>
                  <a href="supprimerVehicule.php?id=<?=$vehicule['id']?>" class="btn btn-danger "
                      onclick=" return confirm('Êtes-vous sûr de vouloir supprimer ce véhicule ?')">
                      Supprimer
                  </a>
             </td>
    </tr>
        <?php }?>
</tbody>
      <a href="./ajouterVehicules.php" class="btn btn-success"
          onclick=" return confirm('Êtes-vous sûr de vouloir ajouter un véhicule ?')" >
          Ajouter un vehicule
      </a>
</table>

<?php
if ($totalPages > 1) {?>
<nav aria-label="Page navigation example">
  <ul class="pagination">
          <li class="page-item">
            <a class="page-link"
              href="?page=<?=$currentPage - 1;?>">
              <img src="/assets/img/suivant.png" alt="page précédente" width="20px" class="imgRotate" width="20px">
            </a>
          </li>
      <?php
for ($i = 1; $i <= $totalPages; $i++) {?>
          <li class="page-item <?php if ($i === $page) {echo "active";}?>" >
            <a class="page-link " href="?page=<?=$i?>">
              <?=$i;?>
            </a>
          </li>
          <?php }?>

          <li class="page-item">
            <a class="page-link" href="?page=<?=$currentPage + 1;?>">
              <img src="/assets/img/suivant.png" alt="page suivante" width="20px">
            </a>
          </li>
  </ul>
</nav>
<?php }
?>


<?php
require_once __DIR__ . "/../admin/templates/footer.php";
?>
