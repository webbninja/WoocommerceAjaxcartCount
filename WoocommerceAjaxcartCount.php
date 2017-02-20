<?php
/*
Plugin Name: Woocommerce Ajax cart Count Sortcode
Plugin URI: https://www.facebook.com/webbninja01
Description: Woocommerce cart total via ajax shortcode.
Author: Web Ninja
Version: 1.1
*/


# WOOCOMMERCE CART TOTAL
add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart');
function woocommerce_header_add_to_cart( $fragments ) {
global $woocommerce;
ob_start();
?>
<a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>"><?php echo sprintf(_n('%d item ', '%d items ', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?>&nbsp;<?php echo $woocommerce->cart->get_cart_total(); ?></a>
<?php
$fragments['a.cart-contents'] = ob_get_clean();
return $fragments;
}

add_shortcode( 'ajax_cart_total','cart_total_function' );
function cart_total_function( $cart_total ){
global $woocommerce;
$cart_total = '<a class="cart-contents" href="'.$woocommerce->cart->get_cart_url().'" title="View your shopping cart"><img src="cart.png">'.sprintf(_n('%d item', '%d item(s) ', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count).'&nbsp;'.$woocommerce->cart->get_cart_total().'</a>';
return $cart_total;
}

?>
