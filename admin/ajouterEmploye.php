






<?php
require_once __DIR__ . "/../lib/pdo.php";
require_once __DIR__ . "/../lib/employe.php";
require_once __DIR__ . "/../admin/templates/header.php";
?>

<?php
$messages = [];
$errors = [];
if (isset($_POST["ajouterEmploye"])) {
    if (!empty($_POST["nom"]) && !empty(["prenom"]) && !empty(["role"]) && !empty(["email"]) && !empty(["password"])) {
        // création des variables de connexion formulaire
        $nomForm = $_POST['nom'];
        $prenomForm = $_POST['prenom'];
        $roleForm = $_POST['role'];
        $emailForm = $_POST['email'];
        $passwordForm = $_POST['password'];

        // Récupération de 'lutilisateur en base de données
        $selectQuery = "SELECT * FROM users WHERE email = :email";
        $stmt = $pdo->prepare($selectQuery);
        $stmt->bindParam(':email', $emailForm);
        $stmt->execute();

        //  Vérifier l'unicité de l'utilisateur en BDD
        if ($stmt->rowCount() > 0) {
            $errors[] = "Désolé, cette adresse mail existe déjà dans la base de donnée...";
        }

        // Hashage du mot de passe saisi coté formulaire
        $hashedPassword = password_hash($passwordForm, PASSWORD_DEFAULT);

        // Inserer l'utilisateur en BDD
        $insertquery = "INSERT INTO users(nom, prenom, role, email, password )
        VALUES (:nom, :prenom, :role, :email, :password )";
        $stmt = $pdo->prepare($insertquery);
        $stmt->bindParam(":nom", $nomForm);
        $stmt->bindParam(":prenom", $prenomForm);
        $stmt->bindParam(":role", $roleForm);
        $stmt->bindParam(":email", $emailForm);
        $stmt->bindParam(":password", $hashedPassword);
        $stmt->execute();
        $messages[] = "L'employé(e) a bien été inserré(e) ....";

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


<h1>Formulaire d'ajout véhicule</h1>
<a href="./employes.php" class="btn parrotbtn" >Retour à la page des employés</a>
<form action="" method="post">
    <div class="mb-3 mx-5">
        <label for="nom" class="form-label">Nom</label>
        <input type="text" name="nom" id="nom" class="form-control" required >
    </div>
    <div class="mb-3 mx-5">
        <label for="prenom" class="form-label">Prénom</label>
        <input type="text" name="prenom" id="prenom" class="form-control" required >
    </div>
    <div class="mb-3 mx-5">
        <label for="role" class="form-label">Role</label>
        <input type="text" name="role" id="role" class="form-control" required >
    </div>
    <div class="mb-3 mx-5">
        <label for="email" class="form-label" required >Email</label>
        <input type="email" name="email" id="email" class="form-control">
    </div>
    <div class="mb-3 mx-5">
        <label for="password" class="form-label" required >Mot de passe</label>
        <input type="password" name="password" id="password" class="form-control">
    </div>
    <input type="submit" value="Ajouter" name="ajouterEmploye" class="btn parrotbtn mx-5">
</form>



<?php
require_once __DIR__ . "/../admin/templates/footer.php";
?>

