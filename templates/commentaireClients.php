<?php
if (isset($_POST['envoyer']) && !empty($_POST['nom']) && !empty($_POST['commentaire']) && !empty($_POST['note'])) {
    echo 'Bravo !';
} else {
    echo 'Veuillez remplir les chapms';
}
?>


<div class="container">
    <div class="row">
    <form action="" method="post">
      <legend>Laisser un commentaire :</legend>
      <label for="nom" class="form-label" >Nom :</label>
      <input type="text" name="nom" id="nom" class="form-control" >

      <label for="commentaire" class="form-label" >Commentaire :</label>
      <textarea type="text" name="commentaire" id="commentaire" class="form-control" ></textarea>

      <label for="note" class="form-label" > Note :</label>
      <input type="number" name="note" id="note" class="form-control" >
      <br>

      <input type="submit" name="envoyer" class="parrotbtn">
      <br>
      <br>

    </form>
    </div>
</div>