<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package minera
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	
	<header id="masthead" class="site-header">

		<div class="header">
			<div class="<?php echo is_shop() ? 'container-fluid' : 'container'; ?>">
				<div class="site-branding">
					<?php minera_logo(); ?>
				</div><!-- .site-branding -->

				<div class="main-menu">
					<nav id="site-navigation" class="main-navigation">
						<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="icon ion-md-menu"></i></button>
						<?php
						wp_nav_menu( array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						) );
						?>
					</nav><!-- #site-navigation -->
					<div class="menu-user-total">
						<div class="search">
							<button class='btn btn-search' id="btn-search-product"></button>
						</div>
						<div class="my-account">
							<a href="<?php echo esc_html(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>" class="user"></a>
						</div>
						<div class="number-product-cart">
							<a href="<?php echo esc_url(wc_get_cart_url()); ?>">
								<i class="icon ion-ios-cart-outline"></i>
								<span class="number-product"><?php echo esc_html( WC()->cart->get_cart_contents_count() ); ?></span>
							</a>
						</div>
					</div>
				</div><!-- #site-navigation -->
			</div>
		</div> <!-- End header -->


		<div class="adv">
			<div class="container-fluid">
				<?php minera_breadcrumb();?>
			
			</div>
		</div>

	</header><!-- #masthead -->
	<div id="form-search-product" class="form-search-fw">
		<span class="close-btn" id="close-btn"><i class="fa fa-close"></i></span>
		<div class="search-content">
			<form action="<?php echo esc_url( home_url() ); ?>">

				<?php 
					if ( is_woocommerce() || is_checkout() || is_cart() ) { ?>
						<input type="search" name="s" value="" class="search-product" placeholder="Enter product">
						<input type="hidden" value="product" name="post-type">
				<?php
					}
					else{

				 ?>

					<input type="search" name="s" value="" class="search-post" placeholder="Enter post">

				<?php } ?>

			</form>
		</div>

	</div>
	<div id="content" class="site-content">

