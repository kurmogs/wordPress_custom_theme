<?php
/**
 * @package WordPress
 * @subpackage Classic_Theme
 */

function add_theme_scripts() {
	wp_enqueue_style( 'foundation', get_template_directory_uri() . '/foundation.css',false,'1.1','all');
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_enqueue_style( 'menu', get_template_directory_uri() . '/menu.css',false,'1.1','all');
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

if(function_exists('add_theme_support')) {
	add_theme_support('automatic-feed-links');
}

if (function_exists('register_sidebar')) {
	
	register_sidebar(array(
	'name' => 'Header',
	'id' => 'Header',
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '',
	'after_title' => ''
	));
	
	register_sidebar(array(
	'name' => 'Home_Content',
	'id' => 'Home_Content',
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '',
	'after_title' => ''
	));
	
	register_sidebar(array(
	'name' => 'Footer',
	'id' => 'Footer',
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '',
	'after_title' => ''
	));
	
	register_sidebar(array(
	'name' => 'Blog_Sidebar',
	'id' => 'Blog_Sidebar',
	'before_widget' => '<div class="side_blog">',
	'after_widget' => '</div>',
	'before_title' => '<h5>',
	'after_title' => '</h5><hr />'
	));

	register_sidebar(array(
	'name' => 'Blog_Header',
	'id' => 'Blog_Header',
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '',
	'after_title' => ''
	));

}
	
add_theme_support( 'post-thumbnails' );

add_image_size( 'homepage-thumb', 500, 350, true );

add_theme_support( 'woocommerce' );

//changing excerpt length - words
function new_excerpt_length($length) {
	return 15;
}
add_filter('excerpt_length', 'new_excerpt_length');

//changing excerpt more
function new_excerpt_more($more) {
	return '...';
 }
add_filter('excerpt_more', 'new_excerpt_more');

//fix lightbox
add_action( 'after_setup_theme', 'layerswoo_theme_setup' );
function layerswoo_theme_setup() {
   add_theme_support( 'wc-product-gallery-zoom' );
   add_theme_support( 'wc-product-gallery-lightbox' );
   add_theme_support( 'wc-product-gallery-slider' );
}

/* Remove related products output */
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

/* badge change */
add_filter('woocommerce_sale_flash', 'ds_change_sale_text');

function ds_change_sale_text() {
return '<span class="onsale">%15</span>';
}

/* thank you order message */
add_filter('woocommerce_thankyou_order_received_text', 'woo_change_order_received_text', 10, 2 );
function woo_change_order_received_text( $str, $order ) {
    $new_str = $str . 'Gracias por tu compra. Tu pedido ha sido recibido y en breve te haremos llegar un correo con los detalles de tu compra.';
    return $new_str;
}

/* Adds a message to all products right before the add to cart button*/
add_action( 'woocommerce_single_product_summary', 'promo_alert', 20 );

function promo_alert() {
    echo 'Costo de envío a toda la República e IVA incluido';
}

/**
 * Shop/archives: wrap the product image/thumbnail in a div.
 * 
 * The product image itself is hooked in at priority 10 using woocommerce_template_loop_product_thumbnail(),
 * so priority 9 and 11 are used to open and close the div.
 */
add_action( 'woocommerce_before_shop_loop_item_title', function(){
    echo '<div class="imagewrapper">';
}, 9 );
add_action( 'woocommerce_before_shop_loop_item_title', function(){
    echo '</div>';
}, 11 );

/* return to shop link */
function store_mall_wc_empty_cart_redirect_url() {
        $url = 'https://voilaparking.club/rental/'; // change this link to your need
        return esc_url( $url );
    }
add_filter( 'woocommerce_return_to_shop_redirect', 'store_mall_wc_empty_cart_redirect_url' );