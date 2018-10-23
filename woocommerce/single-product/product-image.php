<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.3.2
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;

$attachment_ids = $product->get_gallery_image_ids();
$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 5 );
$post_thumbnail_id = $product->get_image_id();
$gallery_thumbnail = wc_get_image_size( 'gallery_thumbnail' );
$thumbnail_size    = apply_filters( 'woocommerce_gallery_thumbnail_size', array( $gallery_thumbnail['width'], $gallery_thumbnail['height'] ) );
$image_size        = apply_filters( 'woocommerce_gallery_thumbnail_size', array( 370 , 370 ) );

if ( !in_array($post_thumbnail_id, $attachment_ids) ) {
	$attachment_ids[] = $post_thumbnail_id;
}


?>

<div class="woocommerce-product-gallery images">
	<?php if ( $product->is_on_sale() ) { ?>
		<span class="onsale">Sale!</span>
	<?php } ?>
	<div class="slider-for">

		<?php
			if ( has_post_thumbnail() && $attachment_ids ) {
				foreach ($attachment_ids as $key => $attachment_id) {
					$image_src         = wp_get_attachment_image_src( $attachment_id,$image_size);
					$thumbnail_src     = wp_get_attachment_image_src( $attachment_id,$thumbnail_size);
					?>
					
						<div class="image-up">
							<div class="img-item">
								<img src="<?php echo $image_src[0] ?>" alt="Image Product" class="complete">
							</div>
						</div>
					

					<?php
				}
			}
		
		?>
	 	

	</div>
	<div class="slider-nav">

		<?php
			if ( has_post_thumbnail() && $attachment_ids ) {
				foreach ($attachment_ids as $key => $attachment_id) {
					$image_src         = wp_get_attachment_image_src( $attachment_id,$image_size);
					$thumbnail_src     = wp_get_attachment_image_src( $attachment_id,$thumbnail_size);
					?>
					
						<div class="image-list">
							<div class="img-item">
								<img src="<?php echo $image_src[0] ?>" alt="Image Product" class="complete">
							</div>
						</div>
					

					<?php
				}
			}
		
		?>
	 	

	</div>
</div>