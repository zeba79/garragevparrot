<?php
$imagePath = getVehiculesImage($vehicule["image"]);
?>

<div class="col-md-3 my-2 py-3">
<div class="card" style="width: 18rem;">
  <img src="<?=$imagePath;?>" class="card-img-top" alt="...">
  <div class="card-body">
    <p class="card-text"><?=$vehicule['marque'];?></p>
  </div>
</div>
</div>
