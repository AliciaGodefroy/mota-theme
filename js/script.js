//---------- MODALE DE CONTACT ----------

// Ouverture de la modale au clic sur "Contact"

const modal = document.getElementById("myModal");
const btns = document.querySelectorAll(".btn-contact");

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

const modalWrapper = document.querySelectorAll(".contact_wrp");

modalWrapper.forEach(function(element) {
    element.addEventListener('click', function(event) {
      event.stopPropagation();
    });
});

//---------- MENU BURGER ----------

// Ouverture du menu burger 

const headerMob = document.querySelector(".header_mobile");
const headerDesk = document.querySelector(".header_desk");
const openBurger = document.querySelector(".header_burger");
const closeBurger = document.querySelector(".header_mobile-close");

openBurger.addEventListener('click', function(){
    headerMob.classList.add('display-mobile');
    headerDesk.classList.add('dont-show');
    closeBurger.classList.add('display-mobile');
    openBurger.classList.add('dont-show');

});

// Fermeture du menu burger

closeBurger.addEventListener('click', function(){
    headerMob.classList.remove('display-mobile');
    headerDesk.classList.remove('dont-show');
    closeBurger.classList.remove('display-mobile');
    openBurger.classList.remove('dont-show');
});


//---------- LIGHTBOX ----------

// Ouverture de la lightbox sur l'icone "Fullscreen"

const lightbox = document.getElementById("myLightbox");
const fullscreens = document.querySelectorAll(".fullscreen-icon"); 

// Créez une fonction pour ouvrir la lightbox
function openLightbox(e) {
    lightbox.classList.remove("inactive");
    const wrapper = e.target.closest('.wrapper');
    // console.log(wrapper.getAttribute('data-id'));
    const id = parseInt(wrapper.getAttribute('data-id'));
    let currentIndex = 0;
    let currentPhoto = null ;
    photosList.forEach((photo, index)=>{
        if(photo.id === id){
            currentIndex = index;
            currentPhoto = photo;
        }
    });

    //  Remplacez l'attribut src par le lien de l'img sur laquelle on clique
    let lightbox_img = document.querySelector('.lightbox_img');
    lightbox_img.src = currentPhoto.link;

    // Récupérez et affichez la référence et la catégorie;
    let lightboxInfos = document.createElement("div");
    lightboxInfos.classList.add("lightbox_infos");
    lightboxInfos.innerHTML = `
        <p class="lightbox_ref">${currentPhoto.ref}</p>
        <p class="lightbox_cat">${currentPhoto.cat}</p>
    `;
    const lightboxMed = document.querySelector(".lightbox_med");
    lightboxMed.appendChild(lightboxInfos);

    // Mise en place de la navigation
    let lightboxNav = document.createElement("div");
    lightboxNav.classList.add("lightbox_nav");
    let prevImagePath = 'wp-content/themes/mota-theme/assets/svg/arrow-left-white.svg';
    let nextImagePath = 'wp-content/themes/mota-theme/assets/svg/arrow-right-white.svg';
    lightboxNav.innerHTML = `
        <div class="lightbox_prev">
            <img id="lightbox_icon-prev" src="${prevImagePath}" alt="Photo précédente">
            <p>Précédente</p>
        </div>
        <div class="lightbox_next">
            <p>Suivante</p>
            <img id="lightbox_icon-next" src="${nextImagePath}" alt="Photo suivante">
        </div>
    `;
    lightbox.appendChild(lightboxNav);

    const previous = document.querySelector('.lightbox_prev');
    const next = document.querySelector('.lightbox_next');

    previous.addEventListener('click', function () {
        const lightboxImg = document.querySelector('.lightbox_img');
        // Trouver l'index de l'élément actuel dans le tableau
        const currentIndex = photosList.findIndex(photo => photo.link === currentPhoto.link);

        // Vérifier si l'élément actuel a un index valide
        if (currentIndex >= 0) {
        let previousIndex;

        if (currentIndex === 0) {
            // Si l'élément actuel est le premier, revenir au dernier élément
            previousIndex = photosList.length - 1;
        } else {
            // Récupérer l'index de l'élément précédent
            previousIndex = currentIndex - 1;
        }

        // Récupérer l'élément précédent dans le tableau
        const previousPhoto = photosList[previousIndex];

        // Mettre à jour currentPhoto pour qu'il soit égal à l'élément précédent
        currentPhoto = previousPhoto

        lightboxImg.src = currentPhoto.link;

        const lightboxRef = document.querySelector(".lightbox_ref");
        const lightboxCat = document.querySelector(".lightbox_cat");
        lightboxRef.innerHTML = currentPhoto.ref;
        lightboxCat.innerHTML = currentPhoto.cat;

        } else {
        console.log("L'élément actuel n'a pas été trouvé dans le tableau.");
        }
    });

    next.addEventListener('click', function () {
        const lightboxImg = document.querySelector('.lightbox_img');
        const currentIndex = photosList.findIndex(photo => photo.link === currentPhoto.link);
    
        // Vérifier si l'élément actuel a un index valide
        if (currentIndex >= 0) {
            let nextIndex;
    
            if (currentIndex === photosList.length - 1) {
                // Si l'élément actuel est le dernier, revenir au premier élément
                nextIndex = 0;
            } else {
                // Récupérer l'index de l'élément suivant
                nextIndex = currentIndex + 1;
            }
    
            // Récupérer l'élément suivant dans le tableau
            const nextPhoto = photosList[nextIndex];
    
            // Mettre à jour currentPhoto pour qu'il soit égal à l'élément suivant
            currentPhoto = nextPhoto;
    
            lightboxImg.src = currentPhoto.link;
    
            const lightboxRef = document.querySelector(".lightbox_ref");
            const lightboxCat = document.querySelector(".lightbox_cat");
            lightboxRef.innerHTML = currentPhoto.ref;
            lightboxCat.innerHTML = currentPhoto.cat;
    
        } else {
            console.log("L'élément actuel n'a pas été trouvé dans le tableau.");
        }
    });    
}

// Ajoutez un gestionnaire d'événements click à l'élément fullscreen
fullscreens.forEach(function (fullscreen) {
    fullscreen.addEventListener('click', function (e) {
        openLightbox(e); // Appel de la fonction pour ouvrir la lightbox
    });
});

// Fermeture de la lightbox sur l'icone "Croix"

const close = document.getElementById("close");

close.addEventListener('click', function(){
    lightbox.classList.add('inactive');
});



//---------- LOAD MORE BUTTON ----------

let page = 1;

jQuery(document).ready(function($) {
    $('#load-more').on('click', function(e) {
        e.preventDefault();

        page++;
        // Données à envoyer avec la requête Ajax
        var data = {
            action: 'load_more',
            page: page
        };

        // Requête Ajax
        $.ajax({
            url: ajax_object.ajax_url,
            data: data,
            type: 'POST',
            success: function(response) {
                // Convertir la réponse HTML en un objet jQuery
                var responseData = $(response.data);
                console.log(responseData);
                // Rechercher les éléments fullscreen-icon dans la réponse
                var fullscreenElements = responseData.find('.fullscreen-icon');
                // Ajouter la réponse au DOM
                $('.section-photos_wrp').append(responseData);
                
                // Déclencher la fonction lightbox au clic sur fullscreen-icon des nouveaux éléments
                fullscreenElements.on("click", function(e) {
                    openLightbox(e);
                });
            },
        });
    });
});


//---------- GESTION DES FILTRES ----------

const filtres = document.querySelectorAll(".section-filtres_select");
const options = document.querySelectorAll(".section-filtres_options");
const icons = document.querySelectorAll(".section-filtres_icon");

filtres.forEach(function (filtre, index) {
    filtre.addEventListener('click', function (e) {
        options.forEach(function (option, optionIndex) {
            if (index === optionIndex) {
                option.classList.toggle('show-options');
                icons[index].classList.toggle('rotate');
            } else {
                option.classList.remove('show-options');
                icons[optionIndex].classList.remove('rotate');
            }
        });

        // Gère l'ajout/suppression de la classe "active" pour le filtre actuellement cliqué
        if (filtre.classList.contains('active')) {
            filtre.classList.remove('active');
        } else {
            filtres.forEach(function (filter) {
                filter.classList.remove('active');
            });
            filtre.classList.add('active');
        }
    });
});

