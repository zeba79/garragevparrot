<?php
$currentPage = basename($_SERVER['SCRIPT_NAME']);
?>

<?php
include './lib/menu.php'
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
 <link rel="stylesheet" href="./assets/css/style.css">
    <title><?=htmlentities($menuItem["head_title"]);?></title>
</head>
<body>
  <div class="row">
      <header class="d-flex flex-wrap align-items-center justify-content-center
      justify-content-md-between py-3 mb-4 border-bottom">
        <div class="col-md-3 mb-2 mb-md-0">
          <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
            <img src="./assets/img/logoVParrot.jpg" alt="Logo garage Parrot" width="30%">
            <p class="slogan">Votre partenaire de confiance</p>
          </a>
        </div>
        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
<?php
foreach ($mainMenu as $key => $menuItem) {?>
  <li class="nav-item"><a href="<?=$key;?>" class="nav-link px-2 parrot-color "><?=htmlentities($menuItem["title_menu"]);?></a></li>
  <?php
if ($key === $currentPage) {echo "parrobtn";}?>
<?php }?>
</ul>

        <div class="col-md-3 text-end">
          <a href="#" class="btn btn-outline-primary me-2">Connexion</a>
          <a href="#" class="btn btn-primary">Déconnexion</a>
        </div>
      </header>
  </div>
