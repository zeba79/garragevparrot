<?php
$messages = [];
$errors = [];
if (isset($_POST["Envoyer"])) {
    if (!empty($_POST["nom"]) && !empty($_POST["prenom"])
        && !empty($_POST["email"]) && !empty($_POST["telephone"])
        && !empty($_POST["message"])) {
        $messages[] = "Votre message a été bien pris en compte ";
    } else {
        $errors[] = "Veuillez remplir les champs...";
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
<h3 class="text text-center">Contactez-nous par téléphone au : 04 75 25 25 25</h3>
<div class="contacterAtelier">

    <form action="" method="post">
      <label for="nom" class="form-label" >Nom :</label>
      <input type="text" name="nom" id="nom" class="form-control" >

      <label for="prenom" class="form-label" >Prénom :</label>
      <input type="text" name="prenom" id="prenom" class="form-control" >

      <label for="email" class="form-label" >Email :</label>
      <input type="email" name="email" id="email" class="form-control" >

      <label for="telephone" class="form-label" >Téléphone :</label>
     <input type="tel" name="telephone" id="" class="form-control" >

      <label for="message" class="form-label" >Message :</label>
      <textarea name="message" id="" cols="30" rows="10" class="form-control" ></textarea>
      <br>

      <input type="submit" name="Envoyer" class="parrotbtn ">
      <br>
      <br>

    </form>
</div>
