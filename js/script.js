// Ouverture de la modale au clic sur "Contact"

var modal = document.getElementById('myModal');
var btn = document.getElementById("menu-item-14");

// btn.onclick = function() {
//     modal.style.display = "block";
// }

// Ouvrir la modal au clic sur le bouton "Contact"
btn.addEventListener("click", function() {
modal.style.display = "block";
});

// Fermer la modal si on clique à l'extérieur
window.addEventListener("click", function(event) {
if (event.target == modal) {
    modal.style.display = "none";
}
});