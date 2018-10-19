<?php
/**
 * Description tab
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/description.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post;

$heading = esc_html( apply_filters( 'woocommerce_product_description_heading', __( 'Description', 'woocommerce' ) ) );

?>

<?php if ( $heading ) : ?>
  <h2><?php echo $heading; ?></h2>
<?php endif; ?>

<table class="shipping-tab">
	<thead>
		<tr>
			<th class="shipping-type">Shipping Type</th>
			<th class="shipping-cost">Cost</th>
			<th class="shipping-time">Estimated Delivery Time</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="shipping-type">Standard</td>
			<td class="shipping-cost">Free</td>
			<td class="shipping-time">Product will be arrived In 3-5 business days.</td>
		</tr>
		<tr>
			<td class="shipping-type">Express</td>
			<td class="shipping-cost">$14.90</td>
			<td class="shipping-time">Product will be arrived In 2 business days.</td>
		</tr>
	</tbody>
</table>
<p class="text-shipping-note"><span>Note:</span>&nbspEstimated delivery time is only for North America.</p>