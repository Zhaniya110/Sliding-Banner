<?php 

/*
 * Plugin Name:       Sliding Banner
 * Plugin URI:        https://techlabds.com
 * Description:       Слайдер записей
 * Version:           1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Zhaniya Meiramova
 * Author URI:        https://zhan883.kz
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       sliding-banner
 * Domain Path:       /languages
 * Requires Plugins: acf
 */

 
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}



function example_register_styles_and_scripts() {
	wp_register_style( 'flickity', 'https://unpkg.com/flickity@2/dist/flickity.min.css' );
    wp_register_script( 'tailwind', 'https://cdn.tailwindcss.com/3.3.3' );
	wp_register_script( 'flickity', 'https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js' );
	wp_register_script( 'wp-block-acf-carousel', plugin_dir_url( __FILE__ ) . '/blocks/news/script.js', array( 'flickity' ), filemtime( plugin_dir_path( __FILE__ ) . '/blocks/news/script.js' ), true );
}
add_action( 'wp_enqueue_scripts', 'example_register_styles_and_scripts' );
add_action( 'admin_enqueue_scripts', 'example_register_styles_and_scripts' );



function news(){
    register_block_type(__DIR__ . '/blocks/news');
  }
  add_action( 'init','news');