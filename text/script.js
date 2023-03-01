// Récupérer la modale et le bouton de fermeture
var modal = document.getElementById("myModal");
var closeBtn = modal.querySelector(".close");

// Ajouter un écouteur d'événement pour fermer la modale lorsque l'utilisateur clique sur le bouton de fermeture
closeBtn.addEventListener("click", function() {
 window.location.href = "http://localhost/cours/LoginMongazon/Authentification/";
});

// Ajouter un écouteur d'événement pour fermer la modale lorsque l'utilisateur clique en dehors de la modale
window.addEventListener("click", function(event) {
  if (event.target == modal) {
   window.location.href = "http://localhost/cours/LoginMongazon/Authentification/";
  }
});
