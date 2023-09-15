<?php get_header(); ?>

<section class="hero">
    <h1 class="hero_ttl"><?php the_title(); ?></h1>
    <img src="<?php echo get_stylesheet_directory_uri()."/assets/img/nathalie-0-min.jpeg" ?>" alt="">
</section>

<!-- SECTION FILTRES -->

<section class="section-filtres ctn">
	<div class="section-filtres_catform">
		<form id="filtre-cat">
			<label for="category" class="letters-transform ">Catégories</label>
			<select name="categories" id="categories-select" class="filters_text">
				<option></option>
				<option value="">Toutes les photos</option>
				<?php
				if (!empty($terms_pic_category) && !is_wp_error($terms_pic_category)) {
					foreach ($terms_pic_category as $individual_pic_cat) {
						$option_value = $individual_pic_cat->slug;
						$option_name = $individual_pic_cat->name;
						echo '<option value="' . $option_value . '">' . $option_name . '</option>';
					}
				}
				?>
			</select>
		</form>

		<form id="filtre-formats">
			<label for="formats">Formats</label>
			<select name="format" id="filter-select" class="filters_text">
				<option></option>
				<option value="">Toutes les photos</option>
				<?php
				if (!empty($terms_pic_formats) && !is_wp_error($terms_pic_formats)) {
					foreach ($terms_pic_formats as $pic_format) {
						$format_option_value = $pic_format->slug;
						$format_option_name = $pic_format->name;
						echo '<option value="' . $format_option_value . '">' . $format_option_name . '</option>';
					}
				}
				?>
			</select>
		</form>
	</div>
	
	<form id="filtre-date">	
		<label for="sort-by">Trier par</label>
		<select name="sort" id="sort-dates" class="filters_text">
			<option value=""></option>
			<option value="DESC">Nouveautés</option>
			<option value="ASC">Les plus anciens</option>
		</select>
	</form>

</section>

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