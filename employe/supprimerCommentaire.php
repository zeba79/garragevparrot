<?php
require_once __DIR__ . "/../lib/pdo.php";
require_once __DIR__ . "/../employe/templates/header.php";

$messages = [];
$errors = [];

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $getId = $_GET['id'];

    $sql = "SELECT * FROM users WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":id", $getId);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $recupEmploye = $stmt->fetch(PDO::FETCH_ASSOC);

        $nom = $recupEmploye["nom"];
        $prenom = $recupEmploye["prenom"];

        if (isset($_POST["supprimeremploye"])) {
            $sql = "DELETE FROM users WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(":id", $getId);
            $stmt->execute();
            $messages[] = 'l\'employé(e) a  bien été supprimé(e)';
        }
    } else {
        $errors[] = 'aucun employé(e) trouvé(e)';
    }

} else {
    $errors[] = 'Aucun identifiant trouvé';
}
?>

<?php
foreach ($messages as $message) {?>
<div class="alert alert-success mt-3"><?=$message;?></div>
<?php }?>
<?php
foreach ($errors as $error) {?>
<div class="alert alert-danger mt-3"><?=$error;?></div>
<?php }?>

<h1>Formulaire de suppression employé(e)</h1>
<?=RETOUR_PAGE_EMPLOYE;?>

<form action="" method="post">
    <div class="mb-3 mx-5">
        <label for="nom" class="form-label">Nom</label>
        <input type="text" name="nom" id="nom" value= "<?=$nom;?>" class="form-control" required >
    </div>
    <div class="mb-3 mx-5">
        <label for="prenom" class="form-label">Prénom</label>
        <input type="text" name="prenom" id="prenom" value= "<?=$prenom;?>" class="form-control" required >
    </div>

        <div class="mb-3">
            <input type="submit" name="supprimeremploye" value="Supprimer Employé(e)" onclick=" return confirm('Êtes-vous sûr de vouloir supprimer cet(te) employé(e) ?') " class="parrotbtn" >
        </div>

</form>

<?php
require_once __DIR__ . '/../employe/templates/footer.php';
?>
