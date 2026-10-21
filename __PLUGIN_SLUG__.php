<?php
/**
 * Plugin Name: __PLUGIN_NAME__
 * Plugin URI: https://unstoppablesolutions.app/plugins/__PLUGIN_SLUG__
 * Description: __PLUGIN_SHORT_DESCRIPTION__
 * Version: 0.1.0
 * Author: Unstoppable Solutions
 * Author URI: https://unstoppablesolutions.app
 * License: GPL-2.0-or-later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: __PLUGIN_SLUG__
 * Domain Path: /languages
 * Requires at least: 5.8
 * Tested up to: 7.1
 * Requires PHP: 7.4
 *
 * @package __PLUGIN_PACKAGE__
 */

defined( 'ABSPATH' ) || exit;

define( '__PREFIX___VERSION', '0.1.0' );
define( '__PREFIX___FILE', __FILE__ );
define( '__PREFIX___DIR', plugin_dir_path( __FILE__ ) );
define( '__PREFIX___URL', plugin_dir_url( __FILE__ ) );

require_once __PREFIX___DIR . 'includes/class-plugin.php';

register_activation_hook( __FILE__, array( '__PREFIX___Plugin', 'activate' ) );
register_deactivation_hook( __FILE__, array( '__PREFIX___Plugin', 'deactivate' ) );

__PREFIX___Plugin::init();
