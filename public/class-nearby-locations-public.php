<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://www.aaronjfrey.com/
 * @since      1.0.0
 *
 * @package    Nearby_Locations
 * @subpackage Pepperlillie_Nearby_Locations/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Nearby_Locations
 * @subpackage Pepperlillie_Nearby_Locations/public
 * @author     Aaron Frey <aaron.frey@gmail.com>
 */
class Pepperlillie_Nearby_Locations_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style('jquery-ui', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css', array(), $this->version, 'all');

		wp_enqueue_style('shared', plugin_dir_url(dirname(__FILE__)) . 'shared/css/nearby-locations-shared.css', array(), $this->version, 'all');

		wp_enqueue_style($this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/nearby-locations-public.css', array(), $this->version, 'all');
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		// get Google Maps API key
		$api_key = get_option('plnl-google-api-key');
		if ($api_key) {
			wp_enqueue_script('google-maps', "https://maps.googleapis.com/maps/api/js?key=$api_key", array(), $this->version, false);
		}

		wp_enqueue_script('jquery-ui', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js', array('jquery'), $this->version, false);

		wp_enqueue_script('shared', plugin_dir_url(dirname(__FILE__)) . 'shared/js/nearby-locations-shared.js', array('jquery'), $this->version, false);
		wp_localize_script('shared', 'myVars', array(
			'ajaxUrl' => admin_url('admin-ajax.php'),
			'pluginsUrl' => plugins_url(),
		));

		wp_enqueue_script($this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/nearby-locations-public.js', array('jquery'), $this->version, false);

	}

	public function pepperlillie_nearby_locations_shortcodes_init() {
    function pepperlillie_nearby_locations_shortcode($atts = [], $content = null) {
	    ob_start();
	    include('partials/nearby-locations-public-display.php');
	    return ob_get_clean();
    }
    add_shortcode('nearby_locations', 'pepperlillie_nearby_locations_shortcode');
	}

}
