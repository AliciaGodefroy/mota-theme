<?php 
$post = $args ? $args : $post;

$id	    = get_the_ID();
$img    = get_post_thumbnail_id();
$ttl    = get_the_title();
$link   = get_permalink();
$cat 	= get_the_terms($post->ID, 'category');
$catName= $cat[0]->name;

?>

<div id="myLightbox" class="lightbox inactive">
    <img id="close" src="<?php echo get_template_directory_uri(); ?>/assets/svg/cross.svg" alt="Croix pour fermer l'aperçu">

    <div class="lightbox_med">
        <img class="lightbox_img" src="" alt="images">
        <?php var_dump($ttl); ?>
    </div>
</div>