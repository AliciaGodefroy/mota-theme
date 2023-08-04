// Ouverture de la modale au clic sur "Contact"

var modal = document.getElementById("myModal");
var btns = document.querySelectorAll(".btn-contact");

btns.forEach(function(btn) {
    btn.addEventListener('click', function(){
        modal.classList.remove("display");
        const reference = document.querySelector('#ref').innerText;
        document.querySelector('input[name="your-reference"]').value = reference;
    });
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