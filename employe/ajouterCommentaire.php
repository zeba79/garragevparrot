






<?php
require_once __DIR__ . "/../lib/pdo.php";
require_once __DIR__ . "/../employe/templates/header.php";
?>

<?php
$messages = [];
$errors = [];
if (isset($_POST["ajouterCommentaire"])) {
    if (!empty($_POST["nom"]) && !empty(["commentaire"]) && !empty(["note"]) && !empty(["statut"])) {
        // création des variables de connexion formulaire
        $nomForm = htmlentities($_POST['nom']);
        $commentaireForm = nl2br(htmlentities($_POST['commentaire']));
        $noteForm = htmlentities($_POST['note']);
        $statutForm = htmlentities($_POST['statut']);

        // Inserer l'utilisateur en BDD
        $insertquery = "INSERT INTO comments(nom, commentaire, note, statut )
        VALUES (:nom, :commentaire, :note, :statut)";
        $stmt = $pdo->prepare($insertquery);
        $stmt->bindParam(":nom", $nomForm);
        $stmt->bindParam(":commentaire", $commentaireForm);
        $stmt->bindParam(":note", $noteForm);
        $stmt->bindParam(":statut", $statutForm);
        $stmt->execute();
        $messages[] = "Le commentaire a bien été inserré ....";

    } else {
        $errors[] = "Veuillez remplir les champs ....";

    }

}
?>
<?php
foreach ($messages as $message) {?>
<div class="alert alert-success mt-3 "><?=$message;?></div>
<?php }?>
<?php
foreach ($errors as $error) {?>
<div class="alert alert-danger mt-3 "><?=$error;?></div>
<?php }?>


<h1>Formulaire d'ajout commentaire</h1>
<?=RETOUR_PAGE_COMMENTAIRE;?>
<form action="" method="post">
    <div class="mb-3 mx-5">
        <label for="nom" class="form-label">Nom : </label>
        <input type="text" name="nom" id="nom" class="form-control" required >
    </div>
    <div class="mb-3 mx-5">
        <label for="commentaire" class="form-label">Commentaire : </label>
        <textarea name="commentaire" id="commentaire" cols="30" rows="10" class="form-control" required></textarea>
    </div>
    <div class="mb-3 mx-5">
        <label for="note" class="form-label">Note : </label>
        <input type="number" name="note" id="note" class="form-control" required >
    </div>
    <div class="mb-3 mx-5">
        <label for="statut" class="form-label">Statut : </label>
        <input type="text" name="statut" id="statut" class="form-control" required >
    </div>
    <input type="submit" value="Ajouter commentaire" name="ajouterCommentaire" class="btn parrotbtn mx-5">
</form>



<?php
require_once __DIR__ . "/../employe/templates/footer.php";
?>

