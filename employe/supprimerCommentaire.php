<?php
require_once __DIR__ . "/../lib/pdo.php";
require_once __DIR__ . "/../employe/templates/header.php";

$messages = [];
$errors = [];

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $getId = $_GET['id'];

    $sql = "SELECT * FROM comments WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":id", $getId);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $recupCommentaire = $stmt->fetch(PDO::FETCH_ASSOC);

        $nom = $recupCommentaire["nom"];
        $commentaire = $recupCommentaire["commentaire"];

        if (isset($_POST["supprimerCommentaire"])) {
            $sql = "DELETE FROM comments WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(":id", $getId);
            $stmt->execute();
            $messages[] = 'Le commentaire ) a  bien été supprimé';
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
<div class="alert alert-danger mt-3"><?=$error;?></div>
<?php }?>

<h1>Formulaire de suppression commentaire</h1>
<?=RETOUR_PAGE_COMMENTAIRE;?>

<form action="" method="post">
    <div class="mb-3 mx-5">
        <label for="nom" class="form-label">Nom : </label>
        <input type="text" name="nom" id="nom" value= "<?=$nom;?>" class="form-control" required >
    </div>
    <div class="mb-3 mx-5">
        <label for="commentaire" class="form-label"> Commentaire : </label>
        <textarea name="commentaire" id="commentaire" cols="30" rows="10" class="form-control" required><?=nl2br($commentaire);?></textarea>
    </div>

        <div class="mb-3">
            <input type="submit" name="supprimerCommentaire" value="Supprimer commentaire" onclick=" return confirm('Êtes-vous sûr de vouloir supprimer ce commentaire ?') " class="parrotbtn" >
        </div>

</form>

<?php
require_once __DIR__ . '/../employe/templates/footer.php';
?>
