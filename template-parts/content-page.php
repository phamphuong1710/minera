<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package minera
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php echo is_cart() ? '<h2 class="cart_title" >My cart ('.WC()->cart->get_cart_contents_count().' items )</h2>' : ''; ?>


	<?php minera_post_thumbnail(); ?>

	<div class="entry-content">
		
		<?php
		echo (is_account_page() && !is_user_logged_in()) ? '<div class="row"><div class="col-md-5">' : '';
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'minera' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'minera' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
