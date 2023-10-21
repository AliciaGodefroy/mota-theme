<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();


if (have_posts()):
	while (have_posts()) : the_post();
		echo '<div class="ctn padding-all">';
			the_content();
		echo '</div>';
	endwhile;
endif;


get_footer();
