<?php
require_once __DIR__ . '/lib/pdo.php';
require_once __DIR__ . '/lib/user.php';
require_once __DIR__ . '/templates/header.php';

//  créer un tableau des erreurs
$errors = [];

// condition si loginUser envoyé
if (isset($_POST["loginUser"])) {

    $emailform = $_POST['email'];
    $passwordForm = $_POST["password"];

    $user = verifyLoginUserAndPassword($pdo, $emailform, $passwordForm);

    if ($user) {
        //  si le role est admin
        if ($user["role"] === "admin") {
            // alors redirige vers interface admin
            header(("location: admin/index.php"));

            //  sinon si le role est employe
        } elseif ($user["role"] === "employe") {
            // alors redirige vers interface admin
            header(("location: mecanique.php"));

        } elseif ($user["role"] === "user") {
            header(("location: index.php"));
        }
    } else {
        $errors[] = "Email ou mot de passe incorrect";

    }

}
?>
      <h1>Formulaire de connexion</h1>
<!-- Créer une boucle pour afficher les erreurs rencontrées -->
<?php
// pour chaque error dans le tableau $errors
foreach ($errors as $error) {?>
        <!-- affiche l'erreur -->
        <div class="alert alert-danger">
            <?=$error;?>
        </div>
<?php }?>

      <form action="" method="post">
        <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required >
            </div>
            <div class="mb-3">
                <label for="password">Mot de passe </label>
                <input type="password" name="password" id="password" class="form-control" required >
            </div>
                <div class="mb-3">
                <input type="submit" name="loginUser" value="Se Connecter" class="parrotbtn" required >
            </div>

        </div>


      </form>

<?php
require_once __DIR__ . '/templates/footer.php';
?>;