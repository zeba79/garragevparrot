<?php
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/templates/header.php';
?>

<h1 class="text-center"> <?=WELLCOME_PAGE?> contact !</h1>
<h2 class="mx-5"> Remplir le formulaire ci-dessous</h2>
<form action="inscriptionPost.php" method="post">
    <div class="mb-3 mx-5">
        <label for="last_name" class="form-label">Nom</label>
        <input type="text" name="last_name" id="last_name" class="form-control" required >
    </div>
    <div class="mb-3 mx-5">
        <label for="first_name" class="form-label">Prénom</label>
        <input type="text" name="first_name" id="first_name" class="form-control" required >
    </div>
    <div class="mb-3 mx-5">
        <label for="email" class="form-label" required >Email</label>
        <input type="email" name="email" id="email" class="form-control">
    </div>
    <div class="mb-3 mx-5">
        <label for="password" class="form-label" required >Mot de passe</label>
        <input type="password" name="password" id="password" class="form-control">
    </div>
    <input type="submit" value="Envoyer" name="loginUser" class="btn parrotbtn mx-5">
</form>
<?php
require_once __DIR__ . '/templates/footer.php';
?>
