<div class="container ">

<?php
require_once './lib/pdo.php';

$messages = [];
$errors = [];
if (isset($_POST['envoyerFormulaire'])) {
    if (!empty($_POST['nom'])
        && !empty($_POST['commentaire'])
        && !empty($_POST['note'])) {

        $nomCommentaireForm = htmlentities($_POST['nom']);
        $commentaireCommentaireForm = htmlentities($_POST['commentaire']);
        $noteCommentaireForm = nl2br(htmlentities($_POST['note']));

        $insererCommentaire = 'INSERT INTO comments(nom, commentaire, note) VALUES(:nom, :commentaire, :note)';
        $stmt = $pdo->prepare($insererCommentaire);
        $stmt->bindParam(":nom", $nomCommentaireForm);
        $stmt->bindParam(":commentaire", $commentaireCommentaireForm);
        $stmt->bindParam(":note", $noteCommentaireForm);
        $stmt->execute();

        $messages[] = 'Commentaire envoyé !';
    } else {
        $errors[] = 'Veuillez remplir les champs';
    }
}
?>

<?php
foreach ($messages as $message) {?>
<div class="alert alert-success mt-2"><?=$message;?></div>
<?php }
?>
<?php
foreach ($errors as $error) {?>
<div class="alert alert-danger mt-2"><?=$error;?></div>
<?php }?>

    <div class="row commentForm">
    <form action="" method="post">
      <legend>Laisser un commentaire :</legend>
      <label for="nom" class="form-label" >Nom :</label>
      <input type="text" name="nom" id="nom" class="form-control" >

      <label for="commentaire" class="form-label" >Commentaire :</label>
      <textarea type="text" name="commentaire" id="commentaire" class="form-control" ></textarea>

      <label for="note" class="form-label" > Note :</label>
      <input type="number" name="note" id="note" value="1" min="1" max="5" class="form-control" >
      <br>
      <input type="submit" name="envoyerFormulaire" value="Envoyer" class="parrotbtn">
      <br>
      <br>

    </form>
    </div>
</div>
