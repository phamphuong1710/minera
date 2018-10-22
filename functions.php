<?php
/**
 * minera functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package minera
 */

if ( ! function_exists( 'minera_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function minera_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on minera, use a find and replace
		 * to change 'minera' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'minera', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'minera' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'minera_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );


		add_theme_support( 'woocommerce' );
		// add_theme_support( 'wc-product-gallery-zoom' );
		// add_theme_support( 'wc-product-gallery-lightbox' );
		// add_theme_support( 'wc-product-gallery-slider' );
	}
endif;
add_action( 'after_setup_theme', 'minera_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function minera_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'minera_content_width', 640 );
}
add_action( 'after_setup_theme', 'minera_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function minera_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'minera' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'minera' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'minera_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function minera_scripts() {
	wp_enqueue_style( 'minera-style', get_stylesheet_uri() );
	wp_enqueue_style( 'font-style', "https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i","all" );
	wp_enqueue_style( 'icon-style', "https://unpkg.com/ionicons@4.4.4/dist/css/ionicons.min.css","all" );
	wp_enqueue_script( 'icon-script', 'https://unpkg.com/ionicons@4.4.4/dist/ionicons.js', array(), '20151215', true );
	wp_enqueue_style( 'fontawesome-style', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css","all" );

	wp_enqueue_style( 'minera-style', get_stylesheet_uri() );

	wp_enqueue_script( 'minera-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'minera-js', get_template_directory_uri() . '/js/minera.js', array('jquery'), null, true);

	wp_enqueue_script( 'minera-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'minera_scripts' );

/**
Logo

*/
	if (!function_exists('minera_logo')) {
		function minera_logo() {
			$custom_logo_id = get_theme_mod( 'custom_logo' );
			if($custom_logo_id){
				$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
				$image_src=$image[0];
			}
			else{
				$image_src=get_template_directory_uri().'/image/logo.png';

			}
			?>
			<div class="logo">
				<a href="<?php echo home_url('/'); ?>"><img src="<?php echo $image_src; ?>" alt="Logo"></a>
			</div>

		<?php }
	}

/**
breadcrumb
*/

	if ( !function_exists( 'minera_breadcrumb' ) ) {
		function minera_breadcrumb(){
			if ( is_woocommerce() ) {
				if ( is_shop() ) {
					$title = "Product Listing";
				}
				elseif ( is_product() ) {
					$title = get_the_title();
				}
				elseif (is_product_category()){
					$title = 'Shop Category';
				}
			}
			else{
				if ( is_cart() ) {
					$title = "Shopping Cart";
				}
				if ( is_checkout() ) {
					$title = "Check Out";
				}
				elseif ( is_category() ) {
					$title = 'hello';
					var_dump(get_the_category());
				}
				else{
					$title = get_the_title();
				}
				
			}
			?>
				<h1 class="page-title-header"><?php echo esc_html($title, 'minera') ?></h1>
				<?php woocommerce_breadcrumb(); ?>
			<?php
		}
	}

/*
add description product
*/
	function minera_description_product(){
		global $product;
		if ( $product->get_short_description() && ! is_product() ) {
		?>
			<div class="description-product">
				<?php echo esc_html_e( $product->get_short_description() ); ?>
				<!-- <?php echo the_excerpt() ?> -->
			</div>
		<?php
		}
	}

	add_action( 'woocommerce_after_shop_loop_item', 'minera_description_product', 6 );


/*
Remove fuction rating in shop page
*/
	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
/*
Change Add to cart
*/
	function minera_related_product_remove(){
		if ( is_product() ) {
			remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
		}
	}

	add_action( 'woocommerce_after_shop_loop_item', 'minera_related_product_remove', 6 );


	function minera_related_product_add(){
		if ( is_product() ) {
			add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 15 );
		}
	}

	add_action( 'woocommerce_before_shop_loop_item_title', 'minera_related_product_add', 10 );

/*
Avatar size
*/

function minera_review_display_gravatar( $comment ) {
	echo get_avatar( $comment, apply_filters( 'woocommerce_review_gravatar_size', '70' ), '' );
}

remove_action( 'woocommerce_review_before', 'woocommerce_review_display_gravatar', 10 );
add_action( 'woocommerce_review_before', 'minera_review_display_gravatar', 10 );

/*
	add share 
*/
	function minera_share_with()
	{
	?>
		<div class="share-product-with">
			<?php esc_html_e( 'Share' ) ?>
			<ul class="share-prduct">
				<li class="facebook">
					<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink(); ?>"></a>
				</li>
				<li class="twitter">
					<a href="https://twitter.com/home?status=<?php echo get_permalink(); ?>"></a></li>
				<li class="pinterest">
					<a href="https://pinterest.com/pin/create/button/?url=<?php echo get_permalink(); ?>"></a>
				</li>
			</ul>
		</div>
	<?php
	}


	add_action( 'woocommerce_single_product_summary', 'minera_share_with', 55 );


/*
	custom tap shipping
*/

	function minera_shipping_content_tab()
	{

		get_template_part('woocommerce/single-product/tabs/shipping');
	}

	add_filter('woocommerce_product_tabs','minera_shipping_tabs');
	function minera_shipping_tabs($tabs)
	{
		
		$tabs['shipping'] = array(

			'title'    => __( 'Shipping', 'minera' ),
			'priority' => 15,
			'callback'=> 'minera_shipping_content_tab',

		);
		// echo "<pre>";
		// var_dump($tabs);
		return $tabs;
	}

/*
clear shopping cart button
*/

	add_action( 'init', 'woocommerce_empty_cart_url' );

	function woocommerce_empty_cart_url(){

		global $woocommerce;
		// var_dump($woocommerce);
		if ( isset( $_GET['empty-cart'] ) ) {
			$woocommerce->cart->empty_cart();
		}
	}

/*
edit titlte tab review
*/ 
	add_filter( 'woocommerce_product_tabs', 'minera_edit_title_tab_review', 98);

	function minera_edit_title_tab_review($tabs){
		global $product;
		$number_review = $product->get_review_count();
		$title = "Review ".$number_review;

		
		$tabs['reviews']['title'] = sprintf( __ ( 'Reviews <span>%s</span>', 'minera' ), $number_review );;
		return $tabs;
	}



/**
 * Implement the Custom Header feature.
 
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
