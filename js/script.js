// Récupération du lien et de la modal
// let link = document.querySelector("myLink");
let modal = document.querySelector(".modal");

// Récupération du bouton de fermeture
let span = document.getElementsByClassName("close")[0];

// Ajout de l'événement pour fermer la modal
// span.onclick = function() {
//   modal.style.display = "none";
// }

modales = document.querySelectorAll('.close')
modales.forEach(function(modale) {
  modale.addEventListener('click', function (event) {
    modal.style.display = "none";
  })
});

profiles = document.querySelectorAll('.myLink')
profiles.forEach(function(profile) {
  profile.addEventListener('click', function (event) {
    modal.style.display = "block";
  })
});