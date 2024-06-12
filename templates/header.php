<?php
require_once './config/config.php';
require_once './lib/session.php';
require_once './lib/menu.php';
$currentPage = basename($_SERVER['SCRIPT_NAME']);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css"
  integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">
<link rel="stylesheet" href="/assets/css/styles2.css">
<script src="/assets/js/scripts1.js" defer></script>
  <title><?=htmlentities($mainMenu[$currentPage]["head_title"]);?></title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light  parrot-color header_footer">
    <div class="container slogan">

    <a href="index.php">
    <img src="./assets/img/logoVParrot.jpg" alt="Logo garage Parrot" width="30%">
    </a>
      <p>Votre partenaire de confiance</p>
    </div>
  <div class="container">
  <a href="index.php" class="navbar-brand mb-0 h1 "></a>

  <button
    type="button"
    data-bs-toggle="collapse"
    data-bs-target="#navbarNav"
    class="navbar-toggler"
    aria-controls="navbarNav"
    aria-expanded="false"
    aria-label="Toggle navigation"
    >
    <span class="navbar-toggler-icon"></span>
  </button>
    <div class="collapse navbar-collapse " id="navbarNav">
      <ul class="navbar-nav">
        <?php foreach ($mainMenu as $key => $menuItem) {?>
          <li class="nav-item  mb-1 mt-1" style="width: 60%; text-align:center";><a href="<?=$key;?>" class="nav-link parrot-color
            <?php if ($key === $currentPage) {
    echo "parrotbtn";
}?> ">
      <?=htmlentities($menuItem["title_menu"]);?></a></li>
        <?php }?>
        <div class="col-md-3 text-end">
<?php
if (isset($_SESSION["user"])) {?>
  <a href="deconnexion.php" class="btn  border border-success">Déconnexion</a>
        <?php } else {?>
            <a href="connexion.php" class="btn  border border-success mb-1 mt-1">Connexion</a>
            <?php }?>
        </div>
      </ul>
  </div>
  </div>
</nav>