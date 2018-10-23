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

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( 'post' === get_post_type() ) : ?>
		<header class="entry-header">
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

			
			<div class="entry-meta">
				<?php
				minera_posted_on();
				minera_posted_by();
				?>
			</div><!-- .entry-meta -->
			
		</header><!-- .entry-header -->

		<?php minera_post_thumbnail(); ?>

		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->

		<footer class="entry-footer">
			<?php minera_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>

	<?php if ( 'product' === get_post_type() ) : ?>
		<?php minera_post_thumbnail(); ?>
		<header class="entry-header">
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		</header><!-- .entry-header -->

		<div class="entry-summary">
			<!-- <?php the_excerpt(); ?> -->
				<?php if ( $product->is_on_sale() ) {
				?>
					<span class="sale-price"><?php echo get_woocommerce_currency_symbol().$product->get_sale_price()."&nbsp"; ?></span>

						<span class="del-img">
							<?php 
								echo get_woocommerce_currency_symbol();
								echo esc_html( $product->get_regular_price() ); 
							?>
						</span>


				<?php
				}
				else{
				?>
					<span class="price">
						
					<?php 
						echo get_woocommerce_currency_symbol();
						echo esc_html( $product->get_regular_price() ); 
					?>
					</span>
				<?php
				}
			 ?>
		</div><!-- .entry-summary -->

		<footer class="entry-footer">
			<?php minera_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->

