<?php get_header(); ?>

<section class="hero">
    <h1 class="hero_ttl"><?php the_title(); ?></h1>
    <img src="<?php echo get_stylesheet_directory_uri()."/assets/img/nathalie-0-min.jpeg" ?>" alt="">
</section>

<!-- SECTION FILTRES -->

<section class="section-filtres ctn">
	<div class="section-filtres_catform">
		<div id="filtre-cat" class="filtre-cat">
			<div class="section-filtres_select">
				<span class="section-filtres_label">Catégories</span>
				<img class="section-filtres_icon" src="<?php echo get_template_directory_uri(); ?>/assets/svg/chevron-down-s.svg">
			</div>
			<ul class="section-filtres_options">
				<?php $categories = get_terms( array( 
						'taxonomy' => 'category'
					) );?>
				<?php foreach($categories as $cat) :?>
					<li value="<?= $cat->name?>" data-cat="<?= $cat->name ?>">
						<a class="filtre-cat_option" id="<?= $cat->slug?>" href=""><?= $cat->name?></a>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>

		<div id="filtre-formats" class="filtre-formats">
			<div class="section-filtres_select">
				<span class="section-filtres_label">Formats</span>
				<img class="section-filtres_icon" src="<?php echo get_template_directory_uri(); ?>/assets/svg/chevron-down-s.svg">
			</div>
			<ul class="section-filtres_options">
				<?php $formats = get_terms( array( 
						'taxonomy' => 'format'
					) );?>
				<?php foreach($formats as $form) :?>
					<li value="<?= $form->name?>" data-form="<?= $form->name?>">
						<a class="filtre-cat_option" id="<?= $form->slug?>"><?= $form->name?></a>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
	
	<div id="filtre-date" class="filtre-dates">	
		<div class="section-filtres_select">
			<span class="section-filtres_label">Trier par</span>
			<img class="section-filtres_icon" src="<?php echo get_template_directory_uri(); ?>/assets/svg/chevron-down-s.svg">
		</div>
		<ul class="section-filtres_options">
			<li value="desc"><a>Plus récentes</a></li>
			<li value="asc"><a>Plus anciennes</a></li>
		</ul>
	</div>

</section>

<script>
	let photosList = [];
</script>
<section class="section-photos ctn">
	<?php 

		$args = array(
			'post_type' => 'photos',
			'posts_per_page' => 12,
			'paged' => 1,
		);

		$myQuery = new WP_Query( $args );
		?>
		<div class="section-photos_wrp">
			<?php foreach($myQuery->posts as $post) :?>
				<?php get_template_part('template_parts/photo-block', null, ['post'=>$post]); ?>
			<?php endforeach;?>
		</div>
		<?php wp_reset_postdata();?>

        <button id="load-more" class="load-more-btn">Charger plus</button>

</section>

<?php get_footer(); ?>