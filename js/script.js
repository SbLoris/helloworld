// Récupération du lien et de la modal
var link = document.getElementById("myLink");
var modal = document.getElementById("myModal");

// Récupération du bouton de fermeture
var span = document.getElementsByClassName("close")[0];

// Ajout de l'événement pour ouvrir la modal
link.onclick = function() {
  modal.style.display = "block";
}

// Ajout de l'événement pour fermer la modal
span.onclick = function() {
  modal.style.display = "none";
}

