<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://tanvirmelon.com
 * @since      1.0.0
 *
 * @package    WPScrollTop
 * @subpackage WPScrollTop/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    WPScrollTop
 * @subpackage WPScrollTop/admin
 * @author     Tanvir Islam <tanvirmelon2@gmail.com>
 */
class WP_Scroll_Top_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $wpscrolltop    The ID of this plugin.
	 */
	private $wpscrolltop;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $wpscrolltop       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $wpscrolltop, $version ) {

		$this->wpscrolltop = $wpscrolltop;
		$this->version = $version;

	    //this action callback is triggered when wordpress is ready to add new items to menu.
	    add_action("admin_menu", array(&$this, "wst_menu_items"));

	    //this action is executed after loads its core, after registering all actions, finds out what page to execute and before producing the actual output(before calling any action callback)
	    add_action("admin_init", array(&$this, "wst_display_options"));

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in WP_Scroll_Top_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The WP_Scroll_Top_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->wpscrolltop, plugin_dir_url( __FILE__ ) . 'css/wp-scroll-top-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in WP_Scroll_Top_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The WP_Scroll_Top_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->wpscrolltop, plugin_dir_url( __FILE__ ) . 'js/wp-scroll-top-admin.js', array( 'jquery' ), $this->version, false );

	}
    /*WordPress Menus API.*/
    public function wst_menu_items()
    {
        //add a new menu item. This is a top level menu item i.e., this menu item can have sub menus
        add_menu_page(
            "WP Scroll Top", //Required. Text in browser title bar when the page associated with this menu item is displayed.
            "WP Scroll Top", //Required. Text to be displayed in the menu.
            "manage_options", //Required. The required capability of users to access this menu item.
            "theme-optionss", //Required. A unique identifier to identify this menu item.
            array(&$this, "wst_theme_options_page"), //Optional. This callback outputs the content of the page associated with this menu item.
            "", //Optional. The URL to the menu item icon.
            100 //Optional. Position of the menu item in the menu.
        );

    }

    public function wst_theme_options_page()
    {
        ?>
            <div class="wrap">
            <div id="icon-options-general" class="icon32"></div>
            <h1>WP Scroll Top</h1>
            <?php settings_errors(); //its works for save error show ?>
            <form method="post" action="options.php">
                <?php
               
                    //add_settings_section callback is displayed here. For every new section we need to call settings_fields.
                    settings_fields("wst_header_section");
                   
                    // all the add_settings_field callbacks is displayed here
                    do_settings_sections("theme-optionss");
               
                    // Add the submit button to serialize the options
                    submit_button();
                   
                ?>         
            </form>
        </div>
        <?php
    }


    /*WordPress Settings API Demo*/
    public function wst_display_options()
    {
    	// All Callback to print form elemt
    	$wst_head_ca  = array(&$this, "display_header_options_content");
    	$wst_enable_c = array(&$this, "display_enable_form_element");
    	$wst_size_c_  = array(&$this, "display_size_form_element");
    	$wst_durati_c = array(&$this, "display_duration_form_element");
    	$text_color_c = array(&$this, "display_txcolor_form_element");
    	$wst_bg_col_c = array(&$this, "display_bgcolor_form_element");
        $wst_voercl_c = array(&$this, "display_overclr_form_element");
    	$wst_otxtclr  = array(&$this, "display_overtxtclr_form_element");
    	$wst_locat_c  = array(&$this, "display_location_form_element");
        $wst_style_c  = array(&$this, "display_style_form_element");
    	$wst_alt_c    = array(&$this, "display_imgalt_form_element");
        //section name, display name, callback to print description of section, page to which section is attached.
        add_settings_section("wst_header_section", " Display ", $wst_head_ca, "theme-optionss");

        //setting name, display name, callback to print form element, page in which field is displayed, section to which it belongs.
        //last field section is optional.
        // Enable
        add_settings_field("wst_enable", "Enable", $wst_enable_c, "theme-optionss", "wst_header_section");
        // Button Size
        add_settings_field("wst_size", "Button Size", $wst_size_c_, "theme-optionss", "wst_header_section");
        // Scroll Duration
        add_settings_field("wst_duration", "Scroll Duration", $wst_durati_c, "theme-optionss", "wst_header_section");
        // Text Color
        add_settings_field("wst_txcolor", "Text Color", $text_color_c, "theme-optionss", "wst_header_section");
        // Background Color
        add_settings_field("wst_bgcolor", "Background Color", $wst_bg_col_c, "theme-optionss", "wst_header_section");
        // Mouse Over Color
        add_settings_field("wst_overclr", "Mouse Over Color", $wst_voercl_c, "theme-optionss", "wst_header_section");
        // Mouse Text Over Color
        add_settings_field("wst_otxtclr", "Mouse Over Text Color", $wst_otxtclr, "theme-optionss", "wst_header_section");
        // Location
        add_settings_field("wst_location", "Location", $wst_locat_c, "theme-optionss", "wst_header_section");
        // Button Style
        add_settings_field("wst_style", "Button Style", $wst_style_c, "theme-optionss", "wst_header_section");
        //  Image ALT 
        add_settings_field("wst_imgalt", " Image ALT", $wst_alt_c, "theme-optionss", "wst_header_section");

        //section name, form element name, callback for sanitization
        register_setting("wst_header_section", "wst_enable");
        register_setting("wst_header_section", "wst_size");
        register_setting("wst_header_section", "wst_duration");
        register_setting("wst_header_section", "wst_txcolor");
        register_setting("wst_header_section", "wst_bgcolor");
        register_setting("wst_header_section", "wst_overclr");
        register_setting("wst_header_section", "wst_otxtclr");
        register_setting("wst_header_section", "wst_location");
        register_setting("wst_header_section", "wst_style");
        register_setting("wst_header_section", "wst_image");
        register_setting("wst_header_section", "wst_imgalt");
    }

    public function display_header_options_content(){echo "<p>All color style will be working for the first button. You should all select then save it </p>If have any suggesion on this plugin. please, contact with support <a href='http://tanvirmelon.com/' target='_blank'>Support</a>&#160;<a href='http://tanvirmelon.com/' target='_blank'>Author</a>";}

    // Enable
    public function display_enable_form_element()
    {
        $wst_enable = get_option('wst_enable');
        //id and name of form element should be same as the setting name.
        ?>
            <input type="checkbox" name="wst_enable" value="1" id="wst_enable" <?php echo $wst_enable == 1 ? 'checked' : ''; ?> />
        <?php
    }
    // Button Size
    public function display_size_form_element()
    {
        $wst_size = get_option('wst_size');
        //id and name of form element should be same as the setting name.
        ?>
            <input type="number" name="wst_size" id="wst_size" value="<?php echo $wst_size; ?>" />px <small>default:20px</small>
        <?php
    }
    // Duration
    public function display_duration_form_element()
    {
        $wst_duration = get_option('wst_duration');
        //id and name of form element should be same as the setting name.
        ?>
            <input type="number" name="wst_duration" id="wst_duration" value="<?php echo $wst_duration; ?>" /><small>default:1500</small>
        <?php
    }
    // Text Color
    public function display_txcolor_form_element()
    {
        $wst_txcolor = get_option('wst_txcolor');
        //id and name of form element should be same as the setting name.
        ?>
            <input type="color" name="wst_txcolor" id="wst_txcolor" value="<?php echo $wst_txcolor; ?>" />
        <?php
    }
    // Background Color
    public function display_bgcolor_form_element()
    {
        $wst_bgcolor = get_option('wst_bgcolor');
        //id and name of form element should be same as the setting name.
        ?>
            <input type="color" name="wst_bgcolor" id="wst_bgcolor" value="<?php echo $wst_bgcolor; ?>" />
        <?php
    }
    // Over Color
    public function display_overclr_form_element()
    {
        $wst_overclr = get_option('wst_overclr');
        //id and name of form element should be same as the setting name.
        ?>
            <input type="color" name="wst_overclr" id="wst_overclr" value="<?php echo $wst_overclr; ?>" />
        <?php
    }
    // Over Color
    public function display_overtxtclr_form_element()
    {
        $wst_otxtclr = get_option('wst_otxtclr');
        //id and name of form element should be same as the setting name.
        ?>
            <input type="color" name="wst_otxtclr" id="wst_otxtclr" value="<?php echo $wst_otxtclr; ?>" />
        <?php
    }
    // Location
    public function display_location_form_element()
    {
        $wst_location = get_option('wst_location');
        //id and name of form element should be same as the setting name.
        ?>
             <input type="radio" name="wst_location" value="7" id="wstright"  <?php echo $wst_location == 7 ? 'checked' : ''; ?> />
                <label for="wstright">Button Left</label>
             <input type="radio" name="wst_location" value="8" id="wstleft" <?php echo $wst_location == 8 ? 'checked' : ''; ?> />
             <label for="wstleft">Button Right</label>

        <?php
    }

    // Button Style
    public function display_style_form_element()
    {
        $wst_style = get_option('wst_style');
        //id and name of form element should be same as the setting name.
        ?>
            <div><input type="radio" name="wst_style" value="1" id="wst_style1" <?php echo $wst_style == 1 ? 'checked' : ''; ?> /><label for="wst_style1"><img src="<?php echo esc_url( plugins_url( 'img/style1.png', __FILE__ ) ) ?>" alt="onet-1" border="0"></label></div>
            <br>
            <div><input type="radio" name="wst_style" value="2" id="wst_style2" <?php echo $wst_style == 2 ? 'checked' : ''; ?> /><label for="wst_style2"><img src="<?php echo esc_url( plugins_url( 'img/style2.png', __FILE__ ) ) ?>" alt="hide1" border="0"></label></div>
            <br>
            <div><input type="radio" name="wst_style" value="3" id="wst_style3" <?php echo $wst_style == 3 ? 'checked' : ''; ?> /><label for="wst_style3"><img src="<?php echo esc_url( plugins_url( 'img/style3.png', __FILE__ ) ) ?>" alt="three1" border="0"></label></div>
            <br>
            <div><input type="radio" name="wst_style" value="4" id="wst_style4" <?php echo $wst_style == 4 ? 'checked' : ''; ?> /><label for="wst_style4"><img src="<?php echo esc_url( plugins_url( 'img/style4.png', __FILE__ ) ) ?>" alt="style4" border="0"></label></div>
            <h2>Image Style</h2>
            <div class="wst_img_class">
                <input type="radio" name="wst_style" value="5" id="wst_image5" <?php echo $wst_style == 5 ? 'checked' : ''; ?> /><label for="wst_image5"><img src="<?php echo esc_url( plugins_url( 'img/style5.png', __FILE__ ) ) ?>" alt="Style 5" border="0"></label>
            <!-- STyle 6 -->
            <input type="radio" name="wst_style" value="6" id="wst_image6" <?php echo $wst_style == 6 ? 'checked' : ''; ?> /><label for="wst_image6"><img src="<?php echo esc_url( plugins_url( 'img/style6.png', __FILE__ ) ) ?>" alt="Style 5" border="0"></label>
            <!-- Style 8 -->
            <input type="radio" name="wst_style" value="8" id="wst_image8" <?php echo $wst_style == 8 ? 'checked' : ''; ?> /><label for="wst_image8"><img src="<?php echo esc_url( plugins_url( 'img/style8.png', __FILE__ ) ) ?>" alt="Style 5" border="0"></label>
            <!-- Style 9 -->
            <input type="radio" name="wst_style" value="9" id="wst_image9" <?php echo $wst_style == 9 ? 'checked' : ''; ?> /><label for="wst_image9"><img src="<?php echo esc_url( plugins_url( 'img/style9.png', __FILE__ ) ) ?>" alt="Style 9" border="0"></label>
            <!-- Style 10 -->
            <input type="radio" name="wst_style" value="10" id="wst_image10" <?php echo $wst_style == 10 ? 'checked' : ''; ?> /><label for="wst_image10"><img src="<?php echo esc_url( plugins_url( 'img/style10.png', __FILE__ ) ) ?>" alt="Style 10" border="0"></label>
            <!-- Style 11 -->
            <input type="radio" name="wst_style" value="11" id="wst_image11" <?php echo $wst_style == 11 ? 'checked' : ''; ?> /><label for="wst_image11"><img src="<?php echo esc_url( plugins_url( 'img/style11.png', __FILE__ ) ) ?>" alt="Style 11" border="0"></label>
            <!-- Style 12 -->
            <input type="radio" name="wst_style" value="12" id="wst_image12" <?php echo $wst_style == 12 ? 'checked' : ''; ?> /><label for="wst_image12"><img src="<?php echo esc_url( plugins_url( 'img/style12.png', __FILE__ ) ) ?>" alt="Style 12" border="0"></label>
            <!-- Style 13 -->
            <input type="radio" name="wst_style" value="13" id="wst_image13" <?php echo $wst_style == 13 ? 'checked' : ''; ?> /><label for="wst_image13"><img src="<?php echo esc_url( plugins_url( 'img/style13.png', __FILE__ ) ) ?>" alt="Style 13" border="0"></label>
            <!-- Style 14 -->
            <input type="radio" name="wst_style" value="14" id="wst_image14" <?php echo $wst_style == 14 ? 'checked' : ''; ?> /><label for="wst_image14"><img src="<?php echo esc_url( plugins_url( 'img/style14.png', __FILE__ ) ) ?>" alt="Style 14" border="0"></label>
        </div>
        <?php
    }
    // Image ALT
    public function display_imgalt_form_element()
    {
        $wst_imgalt = get_option('wst_imgalt');
        //id and name of form element should be same as the setting name.
        ?>
            <input type="text" name="wst_imgalt" id="">
        <?php
    }
}
