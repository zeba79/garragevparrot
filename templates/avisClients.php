  <div class="commentaires">
    <p><?=$commentaire['nom'];?></p>
    <p><?=nl2br(str_replace('<br />', '', $commentaire['commentaire']));?></p>
    <p><?=$commentaire['note'];?></p>
  </div>


