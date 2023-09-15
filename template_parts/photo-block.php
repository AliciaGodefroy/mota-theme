<?php 

$post = $args['post'];

$id	    = get_the_ID();
$img    = get_post_thumbnail_id($post);
$ttl    = get_the_title();
$link   = get_permalink();
$ref	= get_field("ref");
$cat 	= get_the_terms($post->ID, 'category');
$catName= $cat[0]->name;


?>
<div class="wrapper" data-src="<?= wp_get_attachment_url($img) ?>" data-cat="<?= $catName ?>" data-ref="<?= $ref ?>">
    <article class="photo-block">
        <a href="<?= $link ?>"class="photo-block_lnk">
            <img class="photo-block_img" src="<?= wp_get_attachment_url($img) ?>" data-src="<?= wp_get_attachment_url($img) ?>" data-cat="<?= $catName ?>" data-title="<?= $ttl ?>" data-ref="<?= $ref ?>">
        </a>
    </article>
    <div class="photo-block_hover">
        <div class="photo-block_hover-elements">
            <a class="photo-block_hover-fullscreen fullscreen-icon">
                <img src="<?php echo get_stylesheet_directory_uri()."/assets/svg/Icon_fullscreen.svg" ?>" alt="Voir en plein écran">
            </a>
            <a class="photo-block_hover-eye" href="<?= $link ?>">
                <img src="<?php echo get_stylesheet_directory_uri()."/assets/svg/Icon_eye.svg" ?>" alt="En savoir plus sur la photo">
            </a>
            <div class="photo-block_hover-infos">
                <p class="photo-block_hover-ttl"><?= $ttl ?></p>
                <p class="photo-block_hover-cat"><?= $catName ?></p>
            </div>
        </div>
    </div>
</div>