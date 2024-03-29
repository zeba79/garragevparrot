






<?php
require_once __DIR__ . "/../lib/pdo.php";
require_once __DIR__ . "/../lib/employe.php";
require_once __DIR__ . "/../admin/templates/header.php";
?>

<?php
$messages = [];
$errors = [];
if (isset($_POST["ajoutVehicules"])) {
    if (!empty($_POST["marque"]) && !empty(["prix"]) && !empty(["kilometrage"]) && !empty(["anneeImmatriculation"])
        && !empty(["carburant"]) && !empty(["equipement"]) && !empty(["options"])) {
        $marque = htmlentities($_POST["marque"]);
        $prix = htmlentities($_POST["prix"]);
        $kilometrage = htmlentities($_POST["kilometrage"]);
        $anneeImmatriculation = htmlentities($_POST["anneeImmatriculation"]);
        $carburant = htmlentities($_POST["carburant"]);
        $equipement = nl2br(htmlentities($_POST["equipement"]));
        $options = nl2br(htmlentities($_POST["options"]));

        $inserrerVehicules = " INSERT INTO
        vehicules (marque, prix, kilometrage, anneeImmatriculation , carburant, equipement, options)
        VALUES (:marque, :prix, :kilometrage, :anneeImmatriculation , :carburant, :equipement, :options)";
        $messages[] = "Le véhicule a bien été ajouté dans la base de données";
        $stmt = $pdo->prepare($inserrerVehicules);
        $stmt->bindValue(":marque", (string) $marque);
        $stmt->bindValue(":prix", (int) $prix);
        $stmt->bindValue(":kilometrage", (int) $kilometrage);
        $stmt->bindValue(":anneeImmatriculation", (int) $anneeImmatriculation);
        $stmt->bindValue(":carburant", (string) $carburant);
        $stmt->bindValue(":equipement", (string) $equipement);
        $stmt->bindValue(":options", (string) $options);
        $stmt->execute();
    } else {
        $errors[] = "Veuillez remplir les champs ....";

    }

}
?>
<?php
foreach ($messages as $message) {?>
<div class="alert alert-success"><?=$message;?></div>
<?php }?>
<?php
foreach ($errors as $error) {?>
<div class="alert alert-danger"><?=$error;?></div>
<?php }?>


<h1>Formulaire d'ajout véhicule</h1>
<form action="" method="post">
        <div class="mb-3">
            <label for="marque">Marque :</label>
            <input type="text" name="marque" id="marque" class="form-control" required >
        </div>
        <div class="mb-3">
            <label for="prix">Prix :</label>
            <input type="number" name="prix" id="prix" class="form-control"required >
        </div>
        <div class="mb-3">
            <label for="prix">Kilometrage :</label>
            <input type="number" name="kilometrage" id="kilometrage" class="form-control"required >
        </div>
        <div class="mb-3">
            <label for="anneeImmatriculation">Mise en circulation :</label>
            <input type="number" name="anneeImmatriculation" id="anneeImmatriculation" class="form-control"required >
        </div>
        <div class="mb-3">
            <label for="carburant">Carburant :</label>
            <input type="text" name="carburant" id="carburant" class="form-control"required >
        </div>
        <div class="mb-3">
            <label for="equipement">Equipement :</label>
            <textarea name="equipement" id="equipement" cols="30" rows="5" class="form-control"required ></textarea>
        </div>
        <div class="mb-3">
            <label for="options">Options :</label>
            <textarea name="options" id="options" cols="30" rows="5" class="form-control" required></textarea>
        </div>
        <!-- <div class="mb-3">
            <label for="image">Image :</label>
            <input type="file" name="image" id="image" value="Télécharger image" class="form-control">
        </div> -->

        <div class="mb-3">
            <input type="submit" name="ajoutVehicules" value="Envoyer" class="parrotbtn" >
        </div>

</form>


<?php
require_once __DIR__ . "/../admin/templates/footer.php";
?>

