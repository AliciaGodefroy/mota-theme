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

fullscreens.forEach(function(fullscreen){
    fullscreen.addEventListener('click', function(e){
        lightbox.classList.remove("inactive");
        const photoBlockImg = e.target.closest('.wrapper').querySelector('.photo-block_img');

        //  Remplacer l'attribut src par le lien de l'img sur laquelle on clique
        const lightboxImgSrc = photoBlockImg.getAttribute('data-src');
        let lightbox_img = document.querySelector('.lightbox_img');
        lightbox_img.src = lightboxImgSrc ;

        // Récupérer et afficher la référence et la catégorie;
        let lightboxInfos = document.createElement("div");
        lightboxInfos.classList.add("lightbox_infos");
        lightboxInfos.innerHTML = `
        <p class="lightbox_ref"></p>
        <p class="lightbox_cat"></p>
        `;
        const lightboxMed = document.querySelector(".lightbox_med");
        lightboxMed.appendChild(lightboxInfos);
        const lightboxImgRef = photoBlockImg.getAttribute('data-ref');
        const lightboxImgCat = photoBlockImg.getAttribute('data-cat')
        const ctnRef = document.querySelector(".lightbox_ref");
        const ctnCat = document.querySelector(".lightbox_cat");
        ctnRef.innerHTML = lightboxImgRef ;
        ctnCat.innerHTML = lightboxImgCat;

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

        previous.addEventListener('click', function(){
            const lightboxImg = document.querySelector('.lightbox_img');
            const currentSrc = lightboxImg.src;
            
            // Récupérer l'élément .photo-block_img actuel
            const currentPhotoBlockImg = document.querySelector(`.wrapper[data-src="${currentSrc}"]`);
            // Trouver l'élément .photo-block_img précédent en remontant dans l'arbre DOM
            let previousPhotoBlockImg = currentPhotoBlockImg.previousSibling;
            
            while (previousPhotoBlockImg && previousPhotoBlockImg.nodeType !== 1) {
                previousPhotoBlockImg = previousPhotoBlockImg.previousSibling;
            }
        
            if (previousPhotoBlockImg) {
                // S'il y a un élément précédent, mettez à jour la source de l'image dans la lightbox
                const previousImgSrc = previousPhotoBlockImg.getAttribute('data-src');
                lightboxImg.src = previousImgSrc;
        
                // Mettez à jour également les informations de référence et de catégorie si nécessaire
                const lightboxRef = document.querySelector(".lightbox_ref");
                const lightboxCat = document.querySelector(".lightbox_cat");
                const previousImgRef = previousPhotoBlockImg.getAttribute('data-ref');
                const previousImgCat = previousPhotoBlockImg.getAttribute('data-cat');
                lightboxRef.innerHTML = previousImgRef;
                lightboxCat.innerHTML = previousImgCat;
            }
        });

        next.addEventListener('click', function(){
            const lightboxImg = document.querySelector('.lightbox_img');
            const currentSrc = lightboxImg.src;

            const currentPhotoBlockImg = document.querySelector(`.wrapper[data-src="${currentSrc}"]`);
            // Trouver l'élément .photo-block_img suivant
            let nextPhotoBlockImg = currentPhotoBlockImg.nextSibling;

            while (nextPhotoBlockImg && nextPhotoBlockImg.nodeType !== 1) {
                nextPhotoBlockImg = nextPhotoBlockImg.nextSibling;
            }
        
            if (nextPhotoBlockImg) {
                // S'il y a un élément précédent, mettez à jour la source de l'image dans la lightbox
                const nextImgSrc = nextPhotoBlockImg.getAttribute('data-src');
                lightboxImg.src = nextImgSrc;
        
                // Mettez à jour également les informations de référence et de catégorie si nécessaire
                const lightboxRef = document.querySelector(".lightbox_ref");
                const lightboxCat = document.querySelector(".lightbox_cat");
                const nextImgRef = nextPhotoBlockImg.getAttribute('data-ref');
                const nextImgCat = nextPhotoBlockImg.getAttribute('data-cat');
                lightboxRef.innerHTML = nextImgRef;
                lightboxCat.innerHTML = nextImgCat;
            }

        });
        

    })
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

        page ++;
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
                console.log('Requête Ajax réussie !');
                // Manipulation des données de réponse ici + ajout à la page
                $('.section-photos_wrp').append(response);
            },
        });
    });
});


    