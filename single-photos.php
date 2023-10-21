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

	// Navigation photo prédédente/suivante
	$next_post = get_next_post();
	$previous_post = get_previous_post();

	$next_post_lnk = get_permalink( $next_post->ID );
	$previous_post_lnk = get_permalink( $previous_post->ID );

	$next_post_img 	= get_the_post_thumbnail($next_post->ID);
	$previous_post_img = get_the_post_thumbnail($previous_post->ID);


// ==========================================
?>	

<?php get_header(); ?>

<div class="b-content">

<!-- SECTION PHOTO -->

	<section class="b-content_wrp ctn padding-all">
		<div class="b-content_txt">
			<h2 class="b-content_ttl"><?= get_the_title() ?></h2>
			<p class="b-content_info">Référence : <span id="ref"><?= $ref ?></span></p>
			<p class="b-content_info">Catégorie : <?= $catName ?></p>
			<p class="b-content_info">Format : <?= $formName ?></p>
			<p class="b-content_info">Type : <?= $type ?></p>
			<p class="b-content_info">Année : <?= $date ?></p>
			<span class="horizontal-line-sm"></span>
		</div>
		<div class="b-content_med">
			<div class="b-content_img"><?= get_the_post_thumbnail()?></div>
		</div>
	</section>

<!-- SECTION CONTACT & NAV -->	
	<section class="b-content_actions ctn padding-all">
		<div class="b-content_contact">
			<p>Cette photo vous intéresse ?</p>
			<a class="btn-contact b-content_btn">Contact</a>
		</div>
		<div class="b-content_nav">
			<div class="b-content_nav-prev">
				<?php if($previous_post): ?>
					<a class="b-content_nav-prev-link" href="<?= $next_post_lnk ?>">
						<img src="<?php echo get_stylesheet_directory_uri()."/assets/svg/previous.svg" ?>" alt="Photo précédente">
					</a>
					<div class="b-content_nav-preview1">
						<?= $next_post_img ?>
					</div>
				<?php endif; ?>
			</div>
			<div class="b-content_nav-next">
				<?php if($next_post): ?>
					<a class="b-content_nav-next-link" href="<?= $previous_post_lnk ?>">
						<img src="<?php echo get_stylesheet_directory_uri()."/assets/svg/next.svg" ?>" alt="Photo suivante">
					</a>
					<div class="b-content_nav-preview2">
							<?= $previous_post_img ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</section>
	<div class="padding-all">
		<span class="horizontal-line-lg ctn"></span>
	</div>

<!-- SECTION PHOTOS SUGGÉRÉES -->

	<section class="b-content_sugg ctn padding-all">
		<h3 class="b-content_sugg-ttl">Vous aimerez aussi</h3>

		<?php 
		$post_id = get_the_ID();

		$args = array(
			'post_type' => 'photos',
			'category_name' => $catName,
			'posts_per_page' => 2,
			'orderby' => 'rand',
			'paged' => 1,
			'post__not_in'=> array($post_id)
		);

		$myQuery = new WP_Query( $args );
		// var_dump($myQuery->posts)
		?>
		<div class="b-content_sugg-wrp">
			<div class="b-content_sugg-photos">
				<?php foreach($myQuery->posts as $post) :?>
					<?php get_template_part('template_parts/photo-block', null, ['post'=>$post]); ?>
				<?php endforeach;?>
			</div>
			<?php wp_reset_postdata();?>
			<a class="all-photos-btn" href="<?= get_site_url(); ?>">Toutes les photos</a>
		</div>
	</section>
</div>


<?php get_footer(); ?>
