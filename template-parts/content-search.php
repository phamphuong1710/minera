<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package minera
 */


global $product;

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("col-md-6"); ?>>

	<?php if ( 'product' === get_post_type() ) : ?>
		<div class="img-product">
			<?php minera_post_thumbnail(); ?>

		</div>

		<div class="info-product">
				<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
				<?php woocommerce_template_loop_price(); ?>

			<span class="excrept"><?php the_excerpt(); ?></span>

			<?php
				woocommerce_template_loop_add_to_cart();

			 ?>
		</div><!-- .entry-summary -->


	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->

