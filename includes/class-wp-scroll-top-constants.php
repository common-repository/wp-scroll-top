<?php

/**
 * Fired during plugin constants
 *
 * @link       http://tanvirmelon.com
 * @since      1.0.0
 *
 * @package    WPScrollTop
 * @subpackage WPScrollTop/includes
 */

/**
 * Fired during plugin constants.
 *
 * This class defines all code necessary to run during the plugin's constants.
 *
 * @since      1.0.0
 * @package    WPScrollTop
 * @subpackage WPScrollTop/includes
 * @author     Tanvir Islam <tanvirmelon2@gmail.com>
 */
// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; } // Exit if accessed directly

/*Stylesheet Version*/
if( ! defined( 'WPSCROLLTOP_STYLESHEET_VERSION' ) ){
	define( 'WPSCROLLTOP_STYLESHEET_VERSION', '1.0.0' );
}
/*Js Version*/
if( ! defined( 'WPSCROLLTOP_JS_VERSION' ) ){
	define( 'WPSCROLLTOP_JS_VERSION', '1.0.0' );
}

/**
 * Currently plugin version.
 * Start at version 1.0.0
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'WPSCROLLTOP_VERSION', '1.0.0' );

/**
 * Sets the path to the parent admin.
 */
if( ! defined( 'WPSCROLLTOP_ADMIN_PATH' ) ){
    define( "WPSCROLLTOP_ADMIN_PATH", trailingslashit( WPSCROLLTOP_PATH . 'admin' ) );
}

/**
 * Sets the path to the parent admin >> partials.
 */

if( ! defined( 'WPSCROLLTOP_APRL_PATH' ) ){
    define( "WPSCROLLTOP_APRL_PATH", trailingslashit( WPSCROLLTOP_ADMIN_PATH . 'partials' ) );
}

/**
 * Sets the path to the parent public.
 */
if( ! defined( 'WPSCROLLTOP_PUBLIC_PATH' ) ){
    define( "WPSCROLLTOP_PUBLIC_PATH", trailingslashit( WPSCROLLTOP_PATH . 'public' ) );
}

/**
 * Sets the path to the parent public >> partials.
 */
if( ! defined( 'WPSCROLLTOP_PRL_PATH' ) ){
    define( "WPSCROLLTOP_PRL_PATH", trailingslashit( WPSCROLLTOP_PUBLIC_PATH . 'partials' ) );
}

/* Sets the path to the parent theme directory uri public . */
if( ! defined( 'WPSCROLLTOP_P_URL' ) ){
	define( 'WPSCROLLTOP_P_URL', trailingslashit( WPSCROLLTOP_BASE_URL . 'public' ) );
}

/* Sets the path to the parent theme directory uri public/css . */
if( ! defined( 'WPSCROLLTOP_PCSS_URL' ) ){
	define( 'WPSCROLLTOP_PCSS_URL', trailingslashit( WPSCROLLTOP_P_URL . 'css' ) );
}