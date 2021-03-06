<?php
// Query featured entries
$featured = new WP_Query(
	array(
		'no_found_rows'				=> false,
		'update_post_meta_cache'	=> false,
		'update_post_term_cache'	=> false,
		'ignore_sticky_posts'		=> 1,
		'posts_per_page'			=> ot_get_option('featured-posts-count'),
		'cat'						=> ot_get_option('featured-category')
	)
);
?>

<?php if ( is_home() && !is_paged() && ( ot_get_option('featured-posts-count') !='0') || is_page_template( 'page-templates/frontpage.php' ) ): ?>
	
	<div id="owl-featured" class="owl-carousel owl-theme">
	<?php while ( $featured->have_posts() ): $featured->the_post(); ?>
		<?php get_template_part('content-featured'); ?>
	<?php endwhile; ?>
	</div>
	
<?php endif; ?>
<?php wp_reset_postdata(); ?>