<div class="container">
  <div class="avisClients">
    <div class="commentaires">
      <p><?=htmlentities(($commentaire['nom']));?></p>
      <p><?=htmlentities(($commentaire['commentaire']));?></p>
      <p><?=htmlentities(($commentaire['note']));?></p>
    </div>
  </div>
</div>


<!-- <script>

function afficherCommentaires(){
alert('Bonjour !');
}

// const avisClients = document.getElementsByClassName('avisClients');

  const readComment = document.getElementsByClassName("readComment");
  console.log(readComment);
  readComment.addEventListener('click', afficherCommentaires());
</script> -->
