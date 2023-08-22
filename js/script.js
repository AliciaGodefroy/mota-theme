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

// Ouverture de la lightbox sur l'icone "Fullscreen"

const lightbox = document.getElementById("myLightbox");
const fullscreens = document.querySelectorAll(".fullscreen-icon"); 

fullscreens.forEach(function(fullscreen){
    fullscreen.addEventListener('click', function(){
        lightbox.classList.remove("inactive");
        lightboxImgSrc = this.getAttribute('rel');
        lightboxImage = document.querySelector('.image-lightbox');
        lightboxImage.src = lightboxImgSrc;
    })
});

// Fermeture de la lightbox sur l'icone "Croix"

const close = document.getElementById("close");

close.addEventListener('click', function(){
    lightbox.classList.add('inactive');
});