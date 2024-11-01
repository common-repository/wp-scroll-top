<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://tanvirmelon.com
 * @since      1.0.0
 *
 * @package    WPScrollTop
 * @subpackage WPScrollTop/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    WPScrollTop
 * @subpackage WPScrollTop/includes
 * @author     Tanvir Islam <tanvirmelon2@gmail.com>
 */
class WP_Scroll_Top_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'wpscrolltop',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
