<?php
require_once __DIR__ . "/../lib/pdo.php";
require_once __DIR__ . "/../lib/employe.php";
require_once __DIR__ . "/../admin/templates/header.php";

$employes = getEmployesByRole($pdo);
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
                        <a href="#" class="btn btn-success">Ajouter</a>
                        <a href="#" class="btn btn-primary">Modifier</a>
                        <a href="#" class="btn btn-danger ">Supprimer</a>
                        </td>
        </tr>
                <?php }?>
    </tbody>
</table>


<?php
require_once __DIR__ . "/../admin/templates/footer.php";
?>

