

<?php

require_once './templates/header.php';
require_once './config/config.php'
?>

<h1 class="text-center"> <?=WELLCOME_PAGE?> contact !</h1>
<div class="d-grid gap-2 d-md-flex justify-content-md-start">
        <a href="inscription.php" class="btn px-4 me-md-2 parrot-color parrotbtn ">Inscrivez-vous</a>
    </div>

<?php
require_once './templates/contactAtelier.php';

?>


<?php
require_once './templates/footer.php';

?>