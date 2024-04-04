
// Afficher les commentaires
const avisClients = document.querySelector(".avisClients");
const readComment = document.querySelector(".readComment");
readComment.addEventListener("click", afficherCommentaires);


function afficherCommentaires(){
  avisClients.setAttribute("style", "visibility:visible; height:100%");
  hideComment.setAttribute("style", "visibility:visible;height:80%");
  readComment.setAttribute("style", "visibility:hidden; height:100%");
}

const hideComment = document.querySelector(".hideComment");
hideComment.addEventListener("click", cacherCommentaires);
    // Cacher les commentaires
  function cacherCommentaires(){
    avisClients.setAttribute("style", "visibility:hidden;");
    hideComment.setAttribute("style", "visibility:hidden;");
    readComment.setAttribute("style", "visibility:visible; ");
    
  }


// Afficher le formulaire des avis
  const commentForm = document.querySelector(".commentForm")
  const keepComment = document.querySelector(".keepComment");
  keepComment.addEventListener("click", afficherformulaire);

  function afficherformulaire(){
    commentForm.setAttribute("style", "visibility:visible; height:100%");
    hideForm.setAttribute("style", "visibility:visible; height:40%");
    keepComment.setAttribute("style", "visibility:hidden; height:100%");
  }

  // Cacher le formulaire des avis
  const hideForm = document.querySelector(".hideForm");
  hideForm.addEventListener("click", cacherFormulaire);

  function cacherFormulaire (){
    commentForm.setAttribute("style", "visibility:hidden;");
    hideForm.setAttribute("style", "visibility:hidden;");
    keepComment.setAttribute("style", "visibility:visible;");
  }