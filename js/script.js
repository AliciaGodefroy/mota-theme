// Ouverture de la modale au clic sur "Contact"

var modal = document.getElementById("myModal");
var btn = document.getElementById("btn-contact");

btn.addEventListener('click', function(){
    modal.classList.remove("display");
});

// Fermeture de la modale au clic hors de contact_wrp

modal.addEventListener('click', function(){
    modal.classList.add('display');
});

var modalWrapper = document.querySelectorAll(".contact_wrp");

modalWrapper.forEach(function(element) {
    element.addEventListener('click', function(event) {
      event.stopPropagation();
    });
  });