<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://mwale.me
 * @since             1.0.0
 * @package           Env_Selector
 *
 * @wordpress-plugin
 * Plugin Name:       WordPress Environment Selector
 * Plugin URI:        https://mwale.me
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Mwale Kalenga
 * Author URI:        https://mwale.me
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       env-selector
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'ENV_SELECTOR_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-env-selector-activator.php
 */
function activate_env_selector() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-env-selector-activator.php';
	Env_Selector_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-env-selector-deactivator.php
 */
function deactivate_env_selector() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-env-selector-deactivator.php';
	Env_Selector_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_env_selector' );
register_deactivation_hook( __FILE__, 'deactivate_env_selector' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-env-selector.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_env_selector() {

	$plugin = new Env_Selector();
	$plugin->run();

}
run_env_selector();
