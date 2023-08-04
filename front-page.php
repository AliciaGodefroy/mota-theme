<?php get_header(); ?>

<div class="hero">
    <h1 class="hero_ttl"><?php the_title(); ?></h1>
    <img src="<?php echo get_stylesheet_directory_uri()."/assets/img/nathalie-0-min.jpeg" ?>" alt="">
</div>

<div class="section-photos ctn">
<?php 
		$post_id = get_the_ID();

		$args = array(
			'post_type' => 'photos',
			'posts_per_page' => 8,
			'paged' => 1,
			'post__not_in'=> array($post_id)
		);

		$myQuery = new WP_Query( $args );
		// var_dump($myQuery->posts)
		?>
		<div class="section-photos_wrp">
			<?php foreach($myQuery->posts as $post) :?>
				<?php get_template_part('template_parts/photo-block'); ?>
			<?php endforeach;?>
		</div>
		<?php wp_reset_postdata();?>

</div>

<?php get_footer(); ?>