<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * enqueue all theme scripts and styles
 */


// stylesheets
// ----------------------------------------------------------------------------------------
if ( !is_admin() ) {
	// 3rd party css
   //wp_enqueue_style( 'blo-fonts', blo_google_fonts_url(['Rubik:300,400,500,700,900&display=swap', 'Merriweather:300,300i,400,700,900&display=swap', 'Poppins:100,200,300,400,500,700,800']), null,  BLO_VERSION );
   wp_enqueue_style( 'bootstrap',  BLO_CSS . '/bootstrap.min.css', null,  BLO_VERSION );
   //wp_enqueue_style( 'font-awesome',  BLO_CSS . '/font-awesome.css', null,  BLO_VERSION );
   wp_enqueue_style( 'OverlayScrollbars',  BLO_CSS . '/OverlayScrollbars.min.css', null,  BLO_VERSION );
   wp_enqueue_style( 'swiper',  BLO_CSS . '/swiper.min.css', null,  BLO_VERSION );
   
   if( !is_front_page()){
		wp_enqueue_style( 'blo-wocommerce-custom',  BLO_CSS . '/woocommerce.css', null,  BLO_VERSION );
   }

   // theme css
   wp_enqueue_style( 'blo-custom-icon',  BLO_CSS . '/blo-icons.css', null,  BLO_VERSION );
   if( !is_front_page()){
	wp_enqueue_style( 'blo-blog',  BLO_CSS . '/blog.css', null,  BLO_VERSION );
   }
	//wp_enqueue_style( 'blo-gutenberg-custom',  BLO_CSS . '/gutenberg-custom.css', null,  BLO_VERSION );
 	wp_enqueue_style( 'blo-master',  BLO_CSS . '/master.css', null,  BLO_VERSION );
}

// javascripts
// ----------------------------------------------------------------------------------------
if ( !is_admin() ) {

   // 3rd party scripts
	wp_enqueue_script( 'bootstrap',  BLO_JS . '/bootstrap.min.js', array( 'jquery' ),  BLO_VERSION, true );
    wp_enqueue_script( 'popper',  BLO_JS . '/Popper.js', array( 'jquery' ),  BLO_VERSION, true );
	wp_enqueue_script( 'swiper',  BLO_JS . '/swiper.min.js', array( 'jquery' ),  BLO_VERSION, true );
	wp_enqueue_script( 'fontface',  BLO_JS . '/fontface.js', array( 'jquery' ),  BLO_VERSION, true );

    // theme scripts
	wp_enqueue_script( 'blo-overlayScrollbars',  BLO_JS . '/jquery.overlayScrollbars.min.js', array( 'jquery' ),  BLO_VERSION, true );
	// theme scripts
	wp_enqueue_script( 'blo-script',  BLO_JS . '/script.js', array( 'jquery' ),  BLO_VERSION, true );

	// Load WordPress Comment js
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
if ( !is_admin() ) {
	$body_font           = !empty(blo_option('body_font')['family']) ? blo_option('body_font')['family'] : 'Rubik';
	$heading_font_one    = !empty(blo_option('heading_font_one')['family']) ? blo_option('heading_font_one')['family'] : 'Merriweather';
	$heading_font_two    = !empty(blo_option('heading_font_two')['family']) ? blo_option('heading_font_two')['family'] : 'Poppins';
	$heading_font_three  = !empty(blo_option('heading_font_three')['family']) ? blo_option('heading_font_three')['family'] : 'Poppins';

	$font_list = [
		$body_font,
		$heading_font_one,
		$heading_font_two,
		$heading_font_three,
	];
	wp_add_inline_script('blo-script', 'var fontList = ' . wp_json_encode($font_list), 'before');
}