<?php
require_once __DIR__ . "/../lib/pdo.php";
require_once __DIR__ . "/../admin/templates/header.php";

$messages = [];
$errors = [];

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $getId = $_GET['id'];

    $sql = "SELECT * FROM vehicules WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":id", $getId);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $recupVehicule = $stmt->fetch(PDO::FETCH_ASSOC);

        $marque = $recupVehicule['marque'];
        $prix = $recupVehicule['prix'];
        $kilometrage = $recupVehicule['kilometrage'];

        if (isset($_POST["supprimerVehicule"])) {
            $sql = "DELETE FROM vehicules WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(":id", $getId);
            $stmt->execute();
            $messages[] = 'Véhicule bien supprimé';
        }
    } else {
        $errors[] = 'aucun véhicule trouvé';
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

<h1>Formulaire de suppression véhicule</h1>
<?=RETOUR_PAGE_VEHICULE;?>

<form action="" method="post">
        <div class="mb-3">
            <label for="marque">Marque :</label>
            <input type="text" name="marque" id="marque" value= "<?=$marque;?>" class="form-control" required >
        </div>
        <div class="mb-3">
            <label for="prix">Prix :</label>
            <input type="number" name="prix" id="prix" value= "<?=$prix;?>" class="form-control"required >
        </div>
        <div class="mb-3">
            <label for="prix">Kilometrage :</label>
            <!-- Stocker les valeurs récupérées ici dans l'attribut value= "<?=$nom;?>" -->
            <input type="number" name="kilometrage" id="kilometrage" value= "<?=$kilometrage;?>" class="form-control"required >
        </div>

        <div class="mb-3">
            <input type="submit" name="supprimerVehicule" value="Supprimer véhicule" onclick=" return confirm('Êtes-vous sûr de vouloir supprimer ce véhicule ?')" class="parrotbtn" >
        </div>

</form>

<?php
require_once __DIR__ . '/../admin/templates/footer.php';
?>
