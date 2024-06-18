<?php
require_once __DIR__ . "/../lib/pdo.php";
require_once __DIR__ . "/../lib/commentaire.php";
require_once __DIR__ . "/../employe/templates/header.php";

$totalComments = ceil(getTotalComments($pdo) / ADMIN_COMMENTS_LIMIT);

//  récupération du numéro de page
if (isset($_GET["page"]) && $_GET["page"] > 0 && $_GET["page"] <= $totalComments) {
    (int) $page = (int) $_GET["page"];
} else {
    (int) $page = 1;
}

$currentPage = (int) $page;
$commentaires = getCommentairesById($pdo, ADMIN_COMMENTS_LIMIT, $page);

?>

<h1>Commentaires</h1>
<table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Nom</th>
        <th scope="col">Commentaire</th>
        <th scope="col">Note</th>
        <th scope="col">statut</th>
        <th scope="col">Actions</th>
        </tr>
    </thead>

    <tbody>
        <tr>
                <?php
foreach ($commentaires as $commentaire) {?>
                        <td scope="row"><?=$commentaire["id"];?></td>
                        <td scope="row"><?=$commentaire["nom"];?></td>
                        <td scope="row"><?=$commentaire["commentaire"];?></td>
                        <td scope="row"><?=$commentaire["note"];?></td>
                        <td scope="row"><?=$commentaire["statut"];?></td>
                        <td>
                            <a href="./modifierCommentaire.php?id=<?=$commentaire["id"];?>" class="btn btn-primary" onclick=" return confirm('Êtes-vous sûr de vouloir modifier ce commentaire ?')" >Modifier</a>
                            <a href="./supprimerCommentaire.php?id=<?=$commentaire["id"];?>" class="btn btn-danger"  onclick=" return confirm('Êtes-vous sûr de vouloir supprimer ce commentaire ?') ">Supprimer</a>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
                <a href="./ajouterCommentaire.php" class="btn btn-success"
                    onclick=" return confirm('Êtes-vous sûr de vouloir ajouter ce commentaire ?')" >
                    Ajouter un commentaire
                </a>
</table>

<?php
if ($totalComments > 1) {?>
    <nav aria-label="Page navigation example">
  <ul class="pagination">
          <li class="page-item">
            <a class="page-link"
              href="?page=<?=$currentPage - 1;?>">
              <img src="/assets/img/suivant.png" alt="page précédente" width="20px" class="imgRotate" width="20px">
            </a>
          </li>

      <?php
for ($i = 1; $i <= $totalComments; $i++) {?>
          <li class="page-item parrotPagination ">
            <a class="page-link <?php if ($i === $page) {echo "parrotbtn";}?>" href="?page=<?=$i?>">
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
<?php }?>


<?php
require_once __DIR__ . "/../admin/templates/footer.php";
?>

