
<?php
include_once './config/config.php';
include_once './templates/header.php';

?>

<h2 class="mx-5"> Notre formulaire d'inscription</h2>
<form action="inscriptionPost.php" method="post">
    <div class="mb-3 mx-5">
        <label for="nom" class="form-label">Nom</label>
        <input type="text" name="nom" id="nom" class="form-control" required >
    </div>
    <div class="mb-3 mx-5">
        <label for="prenom" class="form-label">Prénom</label>
        <input type="text" name="prenom" id="prenom" class="form-control" required >
    </div>
    <div class="mb-3 mx-5">
        <label for="email" class="form-label" required >Email</label>
        <input type="email" name="email" id="email" class="form-control">
    </div>
    <div class="mb-3 mx-5">
        <label for="password" class="form-label" required >Mot de passe</label>
        <input type="password" name="password" id="password" class="form-control">
    </div>
    <input type="submit" value="Envoyer" name="loginUser" class="btn parrotbtn mx-5 mb-3">
</form>

<?php
include_once './templates/footer.php';

?>