<?php
/**
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://tanvirmelon.com
 * @since             1.0.0
 * @package           WPScrollTop
 *
 * @wordpress-plugin
 * Plugin Name:       WP Scroll Top
 * Plugin URI:        http://tanvirmelon.com/wp-scroll-top-uri/
 * Description:       This plugin will enable as WP Scroll Top in your wordpress theme. you can embed WP Scroll Top via shortcode in everywhere you want, even in theme files.
 * Version:           1.0.0
 * Author:            Tanvir Islam
 * Author URI:        http://tanvirmelon.com/
 * License:           GPL-2.0+
 * License URI:       https://www.gnu.org/licenses/license-list.html#GPLCompatibleLicenses
 * Text Domain:       wpscrolltop
 * Domain Path:       /languages
 */


/**
 * Copyright (c) 2018 Tanvir Islam (email: tanvirmmelon2@gmail.com). All rights reserved.
 *
 * This is an add-on for WordPress
 *
 * **********************************************************************
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 * **********************************************************************
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Sets the path & That is Include path.
 *
 * @since    1.0.0
 */
if( ! defined( 'WPSCROLLTOP_PATH' ) ){
    define( "WPSCROLLTOP_PATH", trailingslashit( dirname( __FILE__ ) ) );
}

/**
 * Sets the path to the parent theme directory.
 *
 * @since    1.0.0
 */
if( ! defined( 'WPSCROLLTOP_BASE_URL' ) ){
	define( 'WPSCROLLTOP_BASE_URL', trailingslashit( plugins_url('',__FILE__) ) );
}

/**
 * The code that runs during plugin includes functionaltiy.
 * This action is documented in includes
 */
if( ! defined( 'WPSCROLLTOP_INC_PATH' ) ){
    define( "WPSCROLLTOP_INC_PATH", trailingslashit( WPSCROLLTOP_PATH . 'includes' ) );
}

/**
 * The core plugin class 
 * that is used to define plugin constant,
 */
require_once WPSCROLLTOP_INC_PATH . 'class-wp-scroll-top-constants.php';

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-scroll-top-activator.php
 */
function activate_wpscrolltop() {
	require_once WPSCROLLTOP_INC_PATH . 'class-wp-scroll-top-activator.php';
	WP_Scroll_Top_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-scroll-top-deactivator.php
 */
function deactivate_wpscrolltop() {
	require_once WPSCROLLTOP_INC_PATH . 'class-wp-scroll-top-deactivator.php';
	WP_Scroll_Top_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wpscrolltop' );
register_deactivation_hook( __FILE__, 'deactivate_wpscrolltop' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require WPSCROLLTOP_INC_PATH . 'class-wp-scroll-top.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wpscrolltop() {

	$plugin = new WP_Scroll_Top();
	$plugin->run();

}
run_wpscrolltop();
