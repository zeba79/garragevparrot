<?php
require_once './config/config.php';
require_once './lib/pdo.php';
?>

<?php
try {
    if (isset($_POST['loginUser'])) {
        // création des variables de connexion formulaire
        $nomForm = $_POST['nom'];
        $prenomForm = $_POST['prenom'];
        $emailForm = $_POST['email'];
        $passwordForm = $_POST['password'];

        // Récupération de 'lutilisateur en base de données
        $selectQuery = "SELECT * FROM users WHERE email = :email";
        $stmt = $pdo->prepare($selectQuery);
        $stmt->bindParam(':email', $emailForm);
        $stmt->execute();

        //  Vérifier l'unicité de l'utilisateur en BDD
        if ($stmt->rowCount() > 0) {
            echo "Désolé, cette adresse mail existe déjà dans la base de donnée...";
        }

        // Hashage du mot de passe saisi coté formulaire
        $hashedPassword = password_hash($passwordForm, PASSWORD_DEFAULT);

        // Inserer l'utilisateur en BDD
        $insertquery = "INSERT INTO users(nom, prenom, email, password, role)
        VALUES (:nom, :prenom, :email, :password, role = null)";
        $stmt = $pdo->prepare($insertquery);
        $stmt->bindParam(":nom", $nomForm);
        $stmt->bindParam(":prenom", $prenomForm);
        $stmt->bindParam(":email", $emailForm);
        $stmt->bindParam(":password", $hashedPassword);
        $stmt->execute();
        header("location: inscriptionRedirection.php");
    }

} catch (PDOException $e) {
    echo "Erreur de connexion à la base de donnés" . $e->getMessage();
}

?>
