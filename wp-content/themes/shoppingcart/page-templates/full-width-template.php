<?php
/**
 * Template Name: Full width Template
 *
 * @package Theme Freesia
 * @subpackage ShoppingCart
 * @since ShoppingCart 1.0
 */

get_header(); ?>

<div class="wrap">
	<?php while ( have_posts() ) : the_post(); ?>
		<?php the_content(); ?>
	<?php endwhile; ?>
</div><!-- end .wrap -->

<?php get_footer(); ?>