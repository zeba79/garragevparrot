






<?php
require_once __DIR__ . "/../lib/pdo.php";
require_once __DIR__ . "/../admin/templates/header.php";
?>

<?php
$messages = [];
$errors = [];
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $getId = $_GET['id'];

    $sql1 = 'SELECT * FROM users WHERE id = :id';
    $recupererEmploye = $pdo->prepare($sql1);
    $recupererEmploye->bindValue(':id', $getId);
    $recupererEmploye->execute();

    if ($recupererEmploye->rowCount() > 0) {
        $employeRecupere = $recupererEmploye->fetch(PDO::FETCH_ASSOC);

        $nom = $employeRecupere['nom'];
        $prenom = $employeRecupere['prenom'];
        $role = $employeRecupere['role'];
        $email = $employeRecupere['email'];
        $password = $employeRecupere['password'];

        if (isset($_POST['modifierEmploye'])) {
            $nomUpdate = htmlentities($_POST["nom"]);
            $prenomUpdate = htmlentities($_POST["prenom"]);
            $roleUpdate = htmlentities($_POST["role"]);
            $emailUpdate = htmlentities($_POST["email"]);
            $passwordUpdate = htmlentities($_POST["password"]);

            // Hashage du mot de passe saisi coté formulaire
            $hashedPassword = password_hash($passwordUpdate, PASSWORD_DEFAULT);

            $modifierEmploye = 'UPDATE users SET nom =:nom , prenom =:prenom, role = :role, email = :email , password = :password WHERE id = :id ';
            $updateEmploye = $pdo->prepare($modifierEmploye);
            $updateEmploye->bindValue(':nom', $nom);
            $updateEmploye->bindValue(':prenom', $prenom);
            $updateEmploye->bindValue(':role', $roleUpdate);
            $updateEmploye->bindValue(':email', $emailUpdate);
            $updateEmploye->bindValue(':password', $hashedPassword);
            $updateEmploye->bindValue(':id', $getId);
            $updateEmploye->execute();
            $messages[] = 'L\'employé(e) a bien été modifié(e) !';

        }

    } else {
        $errors[] = 'aucun employé(e) trouvé(e)';
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


<h1>Formulaire de modification employé(e)</h1>
<a href="./employes.php" class="btn parrotbtn" >Retour à la page des employé(es)</a>
<form action="" method="post">
    <div class="mb-3 mx-5">
        <label for="nom" class="form-label">Nom</label>
        <input type="text" name="nom" id="nom" value= "<?=$nom;?>" class="form-control" required >
    </div>
    <div class="mb-3 mx-5">
        <label for="prenom" class="form-label">Prénom</label>
        <input type="text" name="prenom" id="prenom" value= "<?=$prenom;?>" class="form-control" required >
    </div>
    <div class="mb-3 mx-5">
        <label for="role" class="form-label">Role</label>
        <input type="text" name="role" id="role" value= "<?=$role;?>" class="form-control" required >
    </div>
    <div class="mb-3 mx-5">
        <label for="email" class="form-label" required >Email</label>
        <input type="email" name="email" id="email" value= "<?=$email;?>" class="form-control">
    </div>
    <div class="mb-3 mx-5">
        <label for="password" class="form-label" value= "<?=$password;?>" required >Mot de passe</label>
        <input type="password" name="password" id="password" class="form-control">
    </div>
    <input type="submit" name="modifierEmploye" value="modifier employé(e)"  class="btn parrotbtn mx-5">
</form>
</form>


<?php
require_once __DIR__ . "/../admin/templates/footer.php";
?>

