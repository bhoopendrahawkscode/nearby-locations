<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://www.pepperlillie.com/
 * @since             1.0.0
 * @package           Pepperlillie_Nearby_Locations
 *
 * @wordpress-plugin
 * Plugin Name:       Pepperlillie Nearby Locations
 * Plugin URI:        http://www.pepperlillie.com/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Aaron Frey
 * Author URI:        http://www.pepperlillie.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       pepperlillie-nearby-locations
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-pepperlillie-nearby-locations-activator.php
 */
function activate_pepperlillie_nearby_locations() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-pepperlillie-nearby-locations-activator.php';
	Pepperlillie_Nearby_Locations_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-pepperlillie-nearby-locations-deactivator.php
 */
function deactivate_pepperlillie_nearby_locations() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-pepperlillie-nearby-locations-deactivator.php';
	Pepperlillie_Nearby_Locations_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_pepperlillie_nearby_locations' );
register_deactivation_hook( __FILE__, 'deactivate_pepperlillie_nearby_locations' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-pepperlillie-nearby-locations.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_pepperlillie_nearby_locations() {

	$plugin = new Pepperlillie_Nearby_Locations();
	$plugin->run();

}
run_pepperlillie_nearby_locations();
