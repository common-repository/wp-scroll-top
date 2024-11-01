<?php
# Change Pac	WPScrollTop
# description 
# file name 	wp-scroll-top
# function  	wpscrolltop
# Class Name 	WP_Scroll_Top
/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://tanvirmelon.com
 * @since      1.0.0
 *
 * @package    WPScrollTop
 * @subpackage WPScrollTop/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    WPScrollTop
 * @subpackage WPScrollTop/public
 * @author     Tanvir Islam <tanvirmelon2@gmail.com>
 */
class WP_Scroll_Top_Public {

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
	 * @param      string    $wpscrolltop       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $wpscrolltop, $version ) {

		$this->wpscrolltop = $wpscrolltop;
		$this->version = $version;
        add_action( 'wp_footer', array( $this, 'wpscrolltop_shortcode_area' ) );

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->wpscrolltop, WPSCROLLTOP_PCSS_URL . 'wp-scroll-top-public.css', array(), $this->version, 'all' );

		wp_enqueue_style( 'wp-scroll-top-font', plugin_dir_url( __FILE__ ) . 'css/wp-scroll-top-font.min.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( $this->wpscrolltop, plugin_dir_url( __FILE__ ) . 'js/wp-scroll-top-public.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Register the Shortcode for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
    public function wpscrolltop_shortcode_area(){
    	/**
		 * This function is provided for shortcode public purposes only.
		 *
		 */
    	echo $wst_enable = get_option('wst_enable');
    	if($wst_enable == 1) :
    	$wst_location= get_option('wst_location');
    	$wst_duration= get_option('wst_duration');
    	$wst_imgalt  = get_option('wst_imgalt');
		// Duration
    	if( $wst_duration == '' ){
			$wst_duration = '1500';
		}else{
			$wst_duration = $wst_duration;
		}
        ?>
        <?php 
    	$wst_style = get_option('wst_style');
    	if($wst_style == 1) :
    	$wst_bgcolor = get_option('wst_bgcolor');
    	$wst_txcolor = get_option('wst_txcolor');
    	$wst_overclr = get_option('wst_overclr');
    	$wst_otxtclr = get_option('wst_otxtclr');
    	$wst_size 	 = get_option('wst_size');
    	// Background Color
    	if( $wst_bgcolor == '#000000' ){
				$wst_bgcolor = 'rgba(178,178,178,0.7)';
			}else{
				$wst_bgcolor = $wst_bgcolor;
			}
		// Text Color
    	if( $wst_txcolor == '#000000' ){
				$wst_txcolor = '#333333';
			}else{
				$wst_txcolor = $wst_txcolor;
			}
		// Over Background Color
    	if( $wst_overclr == '#000000' ){
				$wst_overclr = 'rgba(178,178,178,1.0)';
			}else{
				$wst_overclr = $wst_overclr;
			}
		// Over text color 
    	if( $wst_otxtclr == '#000000' ){
				$wst_otxtclr = '#333';
			}else{
				$wst_otxtclr = $wst_otxtclr;
			}
		// Size
    	if( $wst_size == '' ){
				$wst_size = '20';
			}else{
				$wst_size = $wst_size;
			}
        ?>
        <style type="text/css">
			.scrolltop {
				display:none;
				width:100%;
				margin:0 auto;
				position:fixed;
				bottom:20px;
				right:10px;	
			}
			.scroll {
				position:absolute;
				<?php if( $wst_location == 7 ) {echo 'left';} else {echo 'right';} ?>
				:20px;
				bottom:20px;
				background:#b2b2b2;
				background:rgba(178,178,178,0.7);
				padding:<?php echo $wst_size; ?>px!important;
				text-align: center;
				margin: 0 0 0 0;
				cursor:pointer;
				transition: 0.5s;
				-moz-transition: 0.5s;
				-webkit-transition: 0.5s;
				-o-transition: 0.5s; 		
			}
			.scroll:hover {
				background: <?php echo $wst_overclr; ?>!important;
				transition: 0.5s;
				-moz-transition: 0.5s;
				-webkit-transition: 0.5s;
				-o-transition: 0.5s; 		
			}
			.scroll:hover .fa {
				padding-top:-10px;
				color: <?php echo $wst_otxtclr; ?>!important;
			}
			.scroll .fa {
				font-size:30px;
				margin-top:-5px;
				margin-left:1px;
				transition: 0.5s;
				-moz-transition: 0.5s;
				-webkit-transition: 0.5s;
				-o-transition: 0.5s;
				color: <?php echo $wst_txcolor; ?>	
			}
		</style> 
		<div class='scrolltop'>
		    <div class='scroll icon' style="background-color: <?php echo $wst_bgcolor; ?>">
		    	<i class="fa fa-4x fa-angle-up"></i>
		    </div>
		</div>
		<script type="text/javascript">
            (function( $ ) {
			'use strict';

			/**
			 * All of the code for your public-facing JavaScript source
			 * should reside in this file.
			 */
			 $(window).scroll(function() {
			    if ($(this).scrollTop() > 50 ) {
			        $('.scrolltop:hidden').stop(true, true).fadeIn();
			    } else {
			        $('.scrolltop').stop(true, true).fadeOut();
			    }
			});
			$(function(){$(".scroll").click(function(){$("html,body").animate({ scrollTop: 0 }, <?php echo $wst_duration; ?>);return false})})

		})( jQuery );
        </script>
    	<?php endif; ?>
        <?php 
    	$wst_style = get_option('wst_style');
    	if($wst_style == 2) :
        ?>
        <!-- Second -->
        <style type="text/css">
        .top a{
        	color: #428bca;
			text-decoration: none;
        }
		.top {
		  right:-84px;
		  top:80%;
		  position:fixed;
		  background-color: white;
		  -webkit-border-top-left-radius: 15px;
		  -webkit-border-bottom-left-radius: 15px;
		  -moz-border-radius-topleft: 15px;
		  -moz-border-radius-bottomleft: 15px;
		  border-top-left-radius: 15px;
		  border-bottom-left-radius: 15px;
		  padding: 10px 5px;
		  transition:all 1s linear;
		  border-top: 2px solid black;
		  border-bottom: 2px solid black;
		  border-left: 2px solid black;
		  }

		.top2 {
		  right:-65px;
		     -webkit-transition: all cubic-bezier(.94,.03,.57,1.81) 0.7s;
		    -moz-transition: all cubic-bezier(.94,.03,.57,1.81) 0.7s;
		    -ms-transition: all cubic-bezier(.94,.03,.57,1.81) 0.7s;
		    -o-transition: all cubic-bezier(.94,.03,.57,1.81) 0.7s;
		     transition: all cubic-: ;bezier(.94,.03,.57,1.81) 0.7s;
		}
		.top2:hover {
		  right:0px;
		     -webkit-transition: all cubic-bezier(.3,-0.11,.92,-0.52) 0.7s;
		    -moz-transition: all cubic-bezier(.3,-0.11,.92,-0.52) 0.7s;
		    -ms-transition: all cubic-bezier(.3,-0.11,.92,-0.52) 0.7s;
		    -o-transition: all cubic-bezier(.3,-0.11,.92,-0.52) 0.7s;
		     transition: all cubic-bezier(.3,-0.11,.92,-0.52) 0.7s;
		}
		</style> 
		<div class="top"> <a href=""><img src="<?php echo esc_url( plugins_url( 'img/hiden.png', __FILE__ ) ) ?>" alt="[]"> Go to top<a></div>
		<script type="text/javascript">
            (function( $ ) {
			'use strict';

			/**
			 * All of the code for your public-facing JavaScript source
			 * should reside in this file.
			 */
			 $(window).scroll(function() {    
			    var scroll = $(window).scrollTop();

			    // $("body").attr("id","top");
			    if (scroll >= 1000) {
			        $(".top").addClass("top2");
			    } else {
			        $(".top").removeClass("top2");
			    }
			});
			$(function() {
			  $('a[href*=#]:not([href=#])').click(function() {
			    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			      var target = $(this.hash);
			      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
			      if (target.length) {
			        $('html,body').animate({
			          scrollTop: target.offset().top
			        }, <?php echo $wst_duration; ?>);
			        return false;
			      }
			    }
			  });
			});

		})( jQuery );
        </script>
    	<?php endif; ?>
        <!-- Thirds -->
        <?php 
    	$wst_style = get_option('wst_style');
    	if($wst_style == 3) :
        ?>
        <style type="text/css">
		.back-to-top {
			position: fixed;
			<?php if( $wst_location == 7 ) {echo 'left';} else {echo 'right';} ?>: 1%;
			bottom: -7.5%;
			height: 15px;
			width: 40px;
			padding: 3px 5px;
			font-size: 10px;
			font-weight: bold;
			color: transparent;
			opacity: 0.5;
			z-index: 3;
			visibility: hidden;
			text-align: center;
			text-decoration: none;
			text-transform: uppercase;
			transition: all 0.25s ease-in-out;
			background-color: #858585;

			&:hover,
			&:focus {
				opacity: 1;
				text-decoration: none;
			}

			&:focus {
				outline: thin dotted;
			}
		}

		.back-to-top::before,
		.back-to-top::after {
			content: '';
			position: absolute;
			left: 0;
			width: 0;
			height: 0;
			border: 20px solid transparent;
			border-top: 0;
		}

		.back-to-top::before {
			top: -20px;
			z-index: 4;
			border-bottom: 20px solid #858585;
		}

		.back-to-top::after {
			bottom: 0;
			z-index: 5;
			border-bottom: 20px solid #505050;
		}

		.back-to-top:hover,
		.back-to-top:focus {
			height: 40px;
			color: #212223;
		}

		.show-back-to-top {
			display: block;
			bottom: 1.25%;
			visibility: visible;
		}
		.back-to-top.show.show-back-to-top {
			margin-bottom: 2%;
		}
		</style> 
        <a href="#" class="back-to-top">Top</a>
        <script type="text/javascript">
            (function( $ ) {
			'use strict';

			/**
			 * All of the code for your public-facing JavaScript source
			 * should reside in this file.
			 */
			 // Check distance to top and display back-to-top.
				$( window ).scroll( function() {
				  if ( $( this ).scrollTop() > 800 ) {
				    $( '.back-to-top' ).addClass( 'show-back-to-top' );
				  } else {
				    $( '.back-to-top' ).removeClass( 'show-back-to-top' );
				  }
				});

				// Click event to scroll to top.
				$( '.back-to-top' ).click( function() {
				  $( 'html, body' ).animate( { scrollTop : 0 }, <?php echo $wst_duration; ?> );
				  return false;
				});

		})( jQuery );
        </script>
    	<?php endif; ?>
    	<!-- Fourth Style -->
        <?php 
    	$wst_style = get_option('wst_style');
    	if($wst_style == 4) :
        ?>
        <style type="text/css">
        a.back-to-top:hover, a.back-to-top:focus {
			color: #2a6496;
			text-decoration: underline;
		}
        a.back-to-top, a.back-to-top {
			color: #2a6496;
			text-decoration: underline;
		}
		.back-to-top,
		.back-to-top::after,
		.back-to-top-text {
			transition: all 0.25s ease-in-out;
		}

		.back-to-top,
		.back-to-top::after {
			position: fixed;
			height: 45px;
			width: 45px;
			color: #262728;
			opacity: 0.75;
			padding: 3px 5px;
			font-size: 12px;
			font-weight: bold;
			border: 1px solid #262728;
		}

		.back-to-top {
			<?php if( $wst_location == 7 ) {echo 'left';} else {echo 'right';} ?>: 1.5%;
			bottom: -12%;
			z-index: 3;
			text-align: center;
			text-decoration: none;
			text-transform: uppercase;
			transform: rotate(-45deg);
			background: #fff;
		}

		.back-to-top::after {
			display: inline-block;
			content: "";
			right:  -1px;
			bottom: 0;
			border-width: 1px;
			background: transparent;
		}

		.back-to-top-text {
			display: block;
			transform: rotate(45deg) translate(25%,75%);
		}

		.back-to-top:hover,
		.back-to-top:focus,
		.back-to-top:hover::after,
		.back-to-top:focus::after,
		.back-to-top:hover .back-to-top-text,
		.back-to-top:focus .back-to-top-text {
			opacity: 1;
		}

		.back-to-top:hover::after,
		.back-to-top:focus::after {
			transform: translate(25%,-25%);
		}

		.back-to-top:hover .back-to-top-text,
		.back-to-top:focus .back-to-top-text {
			transform: rotate(45deg) translate(25%,0);
		}

		.show-back-to-top {
			bottom: 4%;
		}



		*,
		*:before,
		*:after {
		  box-sizing: inherit;
		}
		</style> 	
    	<div>
			<a href="#content" class="back-to-top">Top</a>
		</div>
		 <script type="text/javascript">
            (function( $ ) {
			'use strict';
			/**
			 * All of the code for your public-facing JavaScript source
			 * should reside in this file.
			 */
			$( window ).scroll( function() {
				if ( $( this ).scrollTop() > 800 ) {
					$( '.back-to-top' ).addClass( 'show-back-to-top' );
				} else {
					$( '.back-to-top' ).removeClass( 'show-back-to-top' );
				}
			});

			// Click event to scroll to top.
			$( '.back-to-top' ).click( function() {
				$( 'html, body' ).animate( { scrollTop : 0 }, <?php echo $wst_duration; ?> );
				return false;
			});

		})( jQuery );
        </script>
    	<?php endif; ?>
    	<!-- Last For Image -->
		<style type="text/css">
			.scrolltop {
				display:none;
				width:100%;
				margin:0 auto;
				position:fixed;
				bottom:20px;
				right:10px;	
			}
			.scroll {
				position:absolute;
				<?php if( $wst_location == 7 ) {echo 'left';} else {echo 'right';} ?>
				:20px;
				bottom:20px;
				padding:20px;
				text-align: center;
				margin: 0 0 0 0;
				cursor:pointer;
				transition: 0.5s;
				-moz-transition: 0.5s;
				-webkit-transition: 0.5s;
				-o-transition: 0.5s; 		
			}
		</style>
		<?php 
		 $wst_style = get_option('wst_style');
		 if($wst_style == 5): 
		?>
		<div class='scrolltop'>
		    <div class='scroll icon'>
		    	<img src="<?php echo esc_url( plugins_url( 'img/style5.png', __FILE__ ) ) ?>" alt="<?php echo $wst_imgalt; ?>" border="0">
		    </div>
		</div>
		<?php endif; ?>
		<?php 
		 $wst_style = get_option('wst_style');
		 if($wst_style == 6): 
		?>
		<div class='scrolltop'>
		    <div class='scroll icon'>
		    	<img src="<?php echo esc_url( plugins_url( 'img/style6.png', __FILE__ ) ) ?>" alt="<?php echo $wst_imgalt; ?>" border="0">
		    </div>
		</div>
		<?php endif; ?>
		<?php
		 $wst_style = get_option('wst_style');
		 if($wst_style == 7): 
		?>
		<div class='scrolltop'>
		    <div class='scroll icon'>
		    	<img src="<?php echo esc_url( plugins_url( 'img/style7.png', __FILE__ ) ) ?>" alt="<?php echo $wst_imgalt; ?>" border="0">
		    </div>
		</div>
		<?php 
		 endif;
		 $wst_style = get_option('wst_style');
		 if($wst_style == 8): 
		?>
		<div class='scrolltop'>
		    <div class='scroll icon'>
		    	<img src="<?php echo esc_url( plugins_url( 'img/style8.png', __FILE__ ) ) ?>" alt="<?php echo $wst_imgalt; ?>" border="0">
		    </div>
		</div>
		<?php 
		endif;
		 $wst_style = get_option('wst_style');
		 if($wst_style == 9): 
		?>
		<div class='scrolltop'>
		    <div class='scroll icon'>
		    	<img src="<?php echo esc_url( plugins_url( 'img/style9.png', __FILE__ ) ) ?>" alt="<?php echo $wst_imgalt; ?>" border="0">
		    </div>
		</div>
		<?php 
		endif;
		 $wst_style = get_option('wst_style');
		 if($wst_style == 10): 
		?>
		<div class='scrolltop'>
		    <div class='scroll icon'>
		    	<img src="<?php echo esc_url( plugins_url( 'img/style10.png', __FILE__ ) ) ?>" alt="<?php echo $wst_imgalt; ?>" border="0">
		    </div>
		</div>
		<?php 
		endif;
		 $wst_style = get_option('wst_style');
		 if($wst_style == 11): 
		?>
		<div class='scrolltop'>
		    <div class='scroll icon'>
		    	<img src="<?php echo esc_url( plugins_url( 'img/style11.png', __FILE__ ) ) ?>" alt="<?php echo $wst_imgalt; ?>" border="0">
		    </div>
		</div>
		<?php 
		endif;
		 $wst_style = get_option('wst_style');
		 if($wst_style == 12): 
		?>
		<div class='scrolltop'>
		    <div class='scroll icon'>
		    	<img src="<?php echo esc_url( plugins_url( 'img/style12.png', __FILE__ ) ) ?>" alt="<?php echo $wst_imgalt; ?>" border="0">
		    </div>
		</div>
		<?php 
		endif;
		 $wst_style = get_option('wst_style');
		 if($wst_style == 13): 
		?>
		<div class='scrolltop'>
		    <div class='scroll icon'>
		    	<img src="<?php echo esc_url( plugins_url( 'img/style13.png', __FILE__ ) ) ?>" alt="<?php echo $wst_imgalt; ?>" border="0">
		    </div>
		</div>
		<?php 
		endif;
		 $wst_style = get_option('wst_style');
		 if($wst_style == 14): 
		?>
		<div class='scrolltop'>
		    <div class='scroll icon'>
		    	<img src="<?php echo esc_url( plugins_url( 'img/style14.png', __FILE__ ) ) ?>" alt="<?php echo $wst_imgalt; ?>" border="0">
		    </div>
		</div>
		<?php 
		endif;?>
		<script type="text/javascript">
            (function( $ ) {
			'use strict';

			/**
			 * All of the code for your public-facing JavaScript source
			 * should reside in this file.
			 */
			 $(window).scroll(function() {
			    if ($(this).scrollTop() > 50 ) {
			        $('.scrolltop:hidden').stop(true, true).fadeIn();
			    } else {
			        $('.scrolltop').stop(true, true).fadeOut();
			    }
			});
			$(function(){$(".scroll").click(function(){$("html,body").animate({ scrollTop: 0 }, 1500 );return false})})

		})( jQuery );
        </script>
        <?php
    	endif;
    }

}
