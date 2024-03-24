function afficherCommentaires(){
      const avisClients = document.querySelector(".avisClients");
      avisClients.setAttribute("style", "visibility:visible;");
    //   return alert ('Bonjour !');
    }
  const readComment = document.querySelector(".readComment");
  readComment.addEventListener("click", afficherCommentaires);
  
