<?php 

$post = $args ? $args : $post;

$id	    = get_the_ID();
$img    = get_post_thumbnail_id();
$ttl    = get_the_title();
$link   = get_permalink();

?>

<a href="<?= $link ?>"class="photo-block">
    <img class="photo-block_img" src="<?= wp_get_attachment_url($img) ?>">
</a>