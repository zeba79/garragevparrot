<?php
require_once __DIR__ . '/templates/header.php';
?>
      <h1>Formulaire de connexion</h1>
      <form action="" method="post">
        <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="mb-3">
                <label for="password">Mot de passe </label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
                <div class="mb-3">
                <input type="submit" name="loginUser" value="Se Connecter" class="parrotbtn">
            </div>

        </div>


      </form>

<?php
require_once __DIR__ . '/templates/footer.php';
?>;