<?php
$note = $commentaire['note'];
$not1 = "&#9733";
$not2 = "&#9733 &#9733";
$not3 = "&#9733 &#9733 &#9733";
$not4 = "&#9733 &#9733 &#9733 &#9733";
$not5 = "&#9733 &#9733 &#9733 &#9733 &#9733";
?>
        <div class="card m-2 " style="width: 18rem">
          <div class=" card-body ">
                <p class="nomCommentaire card-title d-block w-100 "><?=$commentaire['nom'];?></p>
                <p class="card-text d-block w-100 "><?=nl2br(str_replace('<br />', '', $commentaire['commentaire']));?></p>
                <p class="stars card-text d-block w-100 "><?php
switch ($note) {
    case 1:
        echo $not1;
        break;
    case 2:
        echo $not2;
        break;
    case 3:
        echo $not3;
        break;
    case 4:
        echo $not4;
        break;
    case 5:
        echo $not5;
        break;
    default:
        echo $note;
}?>
                </p>
          </div>
        </div>
