
// Afficher les commentaires
const avisClients = document.querySelector(".avisClients");
const readComment = document.querySelector(".readComment");
readComment.addEventListener("click", afficherCommentaires);


function afficherCommentaires(){
  avisClients.setAttribute("style", "visibility:visible; background-color:gray");
  hideComment.setAttribute("style", "visibility:visible;");
}

const hideComment = document.querySelector(".hideComment");
hideComment.addEventListener("click", cacherCommentaires);
    // Cacher les commentaires
  function cacherCommentaires(){
    avisClients.setAttribute("style", "visibility:hidden;");
    hideComment.setAttribute("style", "visibility:hidden;");
    
  }


// Afficher le formulaire des avis
  const commentForm = document.querySelector(".commentForm")
  const keepCpmment = document.querySelector(".keepComment");
  keepCpmment.addEventListener("click", afficherformulaire);

  function afficherformulaire(){
    commentForm.setAttribute("style", "visibility:visible; background-color:gray");
    hideForm.setAttribute("style", "visibility:visible;");
  }

  // Cacher le formulaire des avis
  const hideForm = document.querySelector(".hideForm");
  hideForm.addEventListener("click", cacherFormulaire);

  function cacherFormulaire (){
    commentForm.setAttribute("style", "visibility:visible;");
    hideForm.setAttribute("style", "visibility:hidden;");
  }