

<?php
require_once './config/config.php';
require_once './lib/menu.php';
require_once './templates/header.php'

?>

<div class="container col-xxl-8 px-4 py-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
      <div class="col-10 col-sm-8 col-lg-6">
        <a href="index.php">
          <img src="/uploads/vehicules/carrosserie.jpg"  class="d-block mx-lg-auto img-fluid"
          alt="Bootstrap Themes" width="700" height="500" loading="lazy">
        </a>
      </div>
      <div class="col-lg-6">
        <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">
            <?=WELLCOME_PAGE . " " . htmlentities($mainMenu[$currentPage]['title_menu'])?></h1>
        <p class="lead">Quickly design and customize responsive mobile-first sites with Bootstrap,
          the world’s most popular front-end open source toolkit, featuring Sass variables and mixins,
          responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
        <a href="vehicules.php" class="btn parrotbtn btn-lg px-4 me-md-2">Voir nos véhicules d'Occasion</a>
        </div>
      </div>
    </div>
  </div>

<?php
require_once './templates/footer.php';

?>