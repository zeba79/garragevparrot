






<?php
require_once __DIR__ . "/../lib/pdo.php";
require_once __DIR__ . "/../admin/templates/header.php";
?>

<?php
$messages = [];
$errors = [];
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $getId = $_GET['id'];

    $sql1 = 'SELECT * FROM vehicules WHERE id = :id';
    $recupererVehicule = $pdo->prepare($sql1);
    $recupererVehicule->bindValue(':id', $getId);
    $recupererVehicule->execute();

    if ($recupererVehicule->rowCount() > 0) {
        $vehiculeRecupere = $recupererVehicule->fetch(PDO::FETCH_ASSOC);

        $marque = $vehiculeRecupere["marque"];
        $prix = $vehiculeRecupere["prix"];
        $kilometrage = $vehiculeRecupere["kilometrage"];
        $anneeImmatriculation = $vehiculeRecupere["anneeImmatriculation"];
        $carburant = $vehiculeRecupere["carburant"];
        $equipement = str_replace('<br />', '', $vehiculeRecupere["equipement"]);
        $options = str_replace('<br />', '', $vehiculeRecupere["options"]);

        // $messages[] = 'Véhicule bien récupéré';

        if (isset($_POST['modifierVehicule'])) {
            $marqueUpdate = htmlentities($_POST["marque"]);
            $prixUpdate = htmlentities($_POST["prix"]);
            $kilometrageUpdate = htmlentities($_POST["kilometrage"]);
            $anneeImmatriculationUpdate = htmlentities($_POST["anneeImmatriculation"]);
            $carburantUpdate = htmlentities($_POST["carburant"]);
            $equipementUpdate = nl2br(htmlentities($_POST["equipement"]));
            $optionsUpdate = nl2br(htmlentities($_POST["options"]));

            $modifierVehicule = 'UPDATE vehicules SET marque =:marque , prix =:prix, kilometrage = :kilometrage, anneeImmatriculation = :anneeImmatriculation , carburant = :carburant, equipement = :equipement, options = :options WHERE id = :id ';
            $updateVehicule = $pdo->prepare($modifierVehicule);
            $updateVehicule->bindValue(':marque', $marqueUpdate);
            $updateVehicule->bindValue(':prix', $prixUpdate);
            $updateVehicule->bindValue(':kilometrage', $kilometrageUpdate);
            $updateVehicule->bindValue(':anneeImmatriculation', $anneeImmatriculationUpdate);
            $updateVehicule->bindValue(':carburant', $carburantUpdate);
            $updateVehicule->bindValue(':equipement', $equipementUpdate);
            $updateVehicule->bindValue(':options', $optionsUpdate);
            $updateVehicule->bindValue(':id', $getId);
            $updateVehicule->execute();
            $messages[] = 'Le véhicule a bien été modifié !';

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
<div class="alert alert-danger"><?=$error;?></div>
<?php }?>


<h1>Formulaire de modification de véhicule</h1>
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
            <label for="anneeImmatriculation">Mise en circulation :</label>
            <input type="number" name="anneeImmatriculation" id="anneeImmatriculation" value= "<?=$anneeImmatriculation;?>" class="form-control"required >
        </div>
        <div class="mb-3">
            <label for="carburant">Carburant :</label>
            <input type="text" name="carburant" id="carburant" value= "<?=$carburant;?>" class="form-control"required >
        </div>
        <div class="mb-3">
            <label for="equipement">Equipement :</label>
            <textarea name="equipement" id="equipement" cols="30" rows="5" class="form-control"required ><?=$equipement;?> </textarea>
        </div>
        <div class="mb-3">
            <label for="options">Options :</label>
            <textarea name="options" id="options"  cols="30" rows="5"  class="form-control" required> <?=$options;?></textarea>
        </div>
        <!-- <div class="mb-3">
            <label for="image">Image :</label>
            <input type="file" name="image" id="image" value="Télécharger image" class="form-control">
        </div> -->

        <div class="mb-3">
            <input type="submit" name="modifierVehicule" value="Modifier véhicule" onclick=" return confirm('Êtes-vous sûr de vouloir modifier ce véhicule ?')" class="parrotbtn" >
        </div>

</form>


<?php
require_once __DIR__ . "/../admin/templates/footer.php";
?>

