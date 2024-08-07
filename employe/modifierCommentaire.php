
<?php
require_once __DIR__ . "/../lib/pdo.php";
require_once __DIR__ . "/../employe/templates/header.php";
?>

<?php
$messages = [];
$errors = [];
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $getId = $_GET['id'];

    $sql1 = 'SELECT * FROM comments WHERE id = :id';
    $recupererCommentaire = $pdo->prepare($sql1);
    $recupererCommentaire->bindValue(':id', $getId);
    $recupererCommentaire->execute();

    if ($recupererCommentaire->rowCount() > 0) {
        $commentaireRecupere = $recupererCommentaire->fetch(PDO::FETCH_ASSOC);

        $nom = $commentaireRecupere['nom'];
        $commentaire = $commentaireRecupere['commentaire'];
        $note = $commentaireRecupere['note'];
        $statut = $commentaireRecupere['statut'];

        if (isset($_POST['mofifierCommentaire'])) {
            $nomUpdate = htmlentities($_POST['nom']);
            $commentaireUpdate = nl2br(htmlentities($_POST['commentaire']));
            $noteUpdate = htmlentities($_POST['note']);
            $statutUpdate = htmlentities($_POST['statut']);

            $modifierCommentaire = 'UPDATE comments SET nom =:nom , commentaire =:commentaire, note = :note, statut = :statut  WHERE id = :id ';
            $stmt = $pdo->prepare($modifierCommentaire);
            $stmt->bindParam(":nom", $nomUpdate);
            $stmt->bindParam(":commentaire", $commentaireUpdate);
            $stmt->bindParam(":note", $noteUpdate);
            $stmt->bindParam(":statut", $statutUpdate);
            $stmt->bindParam(":id", $getId);
            $stmt->execute();
            $messages[] = "Le commentaire a bien été modifié ....";

        }

    } else {
        $errors[] = 'aucun commentaire trouvé';
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


<h1>Formulaire de modification commentaire</h1>
<?=RETOUR_PAGE_COMMENTAIRE;?>
<form action="" method="post">
    <div class="mb-3 mx-5">
        <label for="nom" class="form-label">Nom : </label>
        <input type="text" name="nom" id="nom" value= "<?=$nom;?>" class="form-control" required >
    </div>
    <div class="mb-3 mx-5">
        <label for="commentaire" class="form-label">Commentaire : </label>
        <textarea name="commentaire" id="commentaire" cols="30" rows="10" class="form-control" required><?=nl2br($commentaire);?></textarea>
    </div>
    <div class="mb-3 mx-5">
        <label for="note" class="form-label">Note : </label>
        <input type="number" name="note" id="note" value= "<?=$note;?>" class="form-control" required >
    </div>
    <div class="mb-3 mx-5">
        <label for="statut" class="form-label">Statut : </label>
        <input type="text" name="statut" id="statut" value= "<?=$statut;?>" class="form-control">
    </div>
    <input type="submit" value="Modifier commentaire" name="mofifierCommentaire" class="btn parrotbtn mx-5">
</form>

<?php
require_once __DIR__ . "/../employe/templates/footer.php";
?>

