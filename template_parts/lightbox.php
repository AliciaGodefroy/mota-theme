<?php

$id	    = get_the_ID();
$img    = get_post_thumbnail_id();
$ttl    = get_the_title();
$link   = get_permalink();
$cat 	= get_the_terms($post->ID, 'category');
$catName= $cat[0]->name;
$ref	= get_field("ref");

?>

<div id="myLightbox" class="lightbox inactive">
    <img id="close" src="<?php echo get_template_directory_uri(); ?>/assets/svg/cross.svg" alt="Croix pour fermer l'aperçu">

    <div class="lightbox_med">
        <img class="lightbox_img" src="" alt="Photo : <?= $ttl ?>">
        <div class="lightbox_infos">
            <p class="lightbox_ref"></p>
            <p class="lightbox_cat"></p>
        </div>
    </div>
    <div class="lightbox_nav">
    <div class="lightbox_prev">
            <img id="lightbox_icon-prev" src="<?php echo get_template_directory_uri(); ?>/assets/svg/arrow-left-white.svg" alt="Photo précédente">
            <p>Précédente</p>
        </div>
        <div class="lightbox_next">
            <p>Suivante</p>
            <img id="lightbox_icon-next" src="<?php echo get_template_directory_uri(); ?>/assets/svg/arrow-right-white.svg" alt="Photo suivante">
        </div>
    </div>
</div>