<?php
require_once './lib/pdo.php';
require_once './lib/commentaire.php';
require_once './config/config.php';
require_once './templates/header.php';

$commentaires = getCommentairesById($pdo, HOME_COMMENTAIRES_LIMIT);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style2.css">
    <title>Document</title>
</head>
<body>


    <div class="row ">
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php
$chunkedCommentaires = array_chunk($commentaires, 2);
foreach ($chunkedCommentaires as $key => $chunk) {
    $active = $key == 0 ? 'active' : '';
    ?>
                <div class="carousel-item <?=$active?>">
                    <div class="row justify-content-around">
                        <?php foreach ($chunk as $commentaire) {
        include './templates/commentaires.php';
    }
    ?>
                    </div>
                </div>
                <?php
}?>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<?php
require_once './templates/footer.php';
?>
</body>
</html>

<!-- <div class="carousel-item">
  <img src="..." class="d-block w-100" alt="...">
</div>
<div class="carousel-item">
  <img src="..." class="d-block w-100" alt="...">
</div>
</div>
<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
<span class="carousel-control-prev-icon" aria-hidden="true"></span>
<span class="visually-hidden">Previous</span>
</button>
<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
<span class="carousel-control-next-icon" aria-hidden="true"></span>
<span class="visually-hidden">Next</span>
</button>
</div> -->