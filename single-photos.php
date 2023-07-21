<?php
// ==========================================
  // Variable(s) ACF & WP de base
// ==========================================

		$ref	  = get_field("ref");
		$type	  = get_field("type");
		$date 	  = get_the_date( 'Y' );

		$post 	  = get_post();
		$cat 	  = get_the_terms($post->ID, 'category');
		$catName  = $cat[0]->name;
		$form	  = get_the_terms($post->ID, 'format');
		$formName = $form[0]->name;


// ==========================================
  // Manipulations des Variable(s) 
// ==========================================

	// var_dump($post);

// ==========================================
?>	

<?php get_header(); ?>

<div class="b-content">
	<div class="b-content_wrp">
		<div class="b-content_txt">
			<h2 class="b-content_ttl"><?= get_the_title() ?></h2>
			<p class="b-content_info">Référence : <?= $ref ?></p>
			<p class="b-content_info">Catégorie : <?= $catName ?></p>
			<p class="b-content_info">Format : <?= $formName ?></p>
			<p class="b-content_info">Type : <?= $type ?></p>
			<p class="b-content_info">Année : <?= $date ?></p>
			<span class="horizontal-line-sm"></span>
		</div>
		<div class="b-content_med">
			<div class="b-content_img"><?= get_the_post_thumbnail()?></div>
		</div>
	</div>
	<div class="b-content_actions">
		<div class="b-content_contact">
			<p>Cette photo vous intéresse ?</p>
			<a class="btn-contact b-content_btn">Contact</a>
		</div>
		<div class="b-content_nav">

		</div>
	</div>
	<span class="horizontal-line-lg"></span>
</div>


<?php get_footer(); ?>
