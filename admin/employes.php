<?php
require_once __DIR__ . "/../config/config.php";
require_once __DIR__ . "/../lib/pdo.php";
require_once __DIR__ . "/../lib/employe.php";
require_once __DIR__ . "/../admin/templates/header.php";

(int) $totalEmployees = ceil(getTotalEmployees($pdo) / ADMIN_EMPLOYEES_LIMIT);

//  récupération du numéro de page
if (isset($_GET["page"]) && $_GET["page"] > 0 && $_GET["page"] <= $totalEmployees) {
    (int) $page = (int) $_GET["page"];
} else {
    (int) $page = 1;
}

(int) $currentPage = $page;
$employes = getEmployesByRole($pdo, ADMIN_EMPLOYEES_LIMIT, $page);
?>

<h1>Liste des employés</h1>
<table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Nom</th>
        <th scope="col">Prénom</th>
        <th scope="col">Rôle</th>
        <th scope="col">Actions</th>
        </tr>
    </thead>

    <tbody>
        <tr>
                <?php
foreach ($employes as $employe) {?>

                        <td scope="row"><?=$employe["id"];?></td>
                        <td scope="row"><?=$employe["nom"];?></td>
                        <td scope="row"><?=$employe["prenom"];?></td>
                        <td scope="row"><?=$employe["role"];?></td>
                        <td>
                        <a href="./modifierEmploye.php?id=<?=$employe["id"];?>"
                            class="btn btn-primary"
                            onclick=" return confirm('Êtes-vous sûr de vouloir modifier cet(te) employé(e) ?')" >
                            Modifier
                        </a>
                            <a href="./supprimerEmploye.php?id=<?=$employe["id"];?>" class="btn btn-danger"
                            onclick=" return confirm('Êtes-vous sûr de vouloir supprimer cet(te) employé(e) ?') ">
                            Supprimer
                        </a>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
                <a href="./ajouterEmploye.php" class="btn btn-success"
                    onclick=" return confirm('Êtes-vous sûr de vouloir ajouter un(e) employé(e) ?')" >
                    Ajouter un employé
                </a>
</table>

<?php
if ($totalEmployees > 1) {?>
<nav aria-label="Page navigation example">
  <ul class="pagination">
          <li class="page-item">
            <a class="page-link"
              href="?page=<?=$currentPage - 1;?>">
              <img src="/assets/img/suivant.png" alt="page précédente" width="20px" class="imgRotate" width="20px">
            </a>
          </li>
      <?php
for ($i = 1; $i <= $totalEmployees; $i++) {?>
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

