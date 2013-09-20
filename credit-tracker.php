<?php
/**
 * @wordpress-plugin
 * Plugin Name: Credit Tracker
 * Plugin URI:  https://github.com/Labs64/credit-tracker
 * Description: Fetch (from image agencies) & process credits for the different WordPress entities.
 * Author:      Labs64
 * Author URI:  http://www.labs64.com
 * Version:     0.9.0
 * Text Domain: credit-tracker
 * Domain Path: /languages
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Requires at least: 3.5.1
 * Tested up to: 3.6.1
 *
 * @package   Credit_Tracker
 * @author    Labs64 <info@labs64.com>
 * @license   GPL-2.0+
 * @link      http://www.labs64.com
 * @copyright 2013 Labs64
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}


/**
 * Plugin version, used for cache-busting of style and script file references.
 */
define('CT_VERSION', '0.9.0');

/**
 * Unique identifier for your plugin.
 *
 * Use this value (not the variable name) as the text domain when internationalizing strings of text. It should
 * match the Text Domain file header in the main plugin file.
 */
define('CT_SLUG', 'credit-tracker');


require_once(plugin_dir_path(__FILE__) . 'credit-tracker-class.php');
require_once(plugin_dir_path(__FILE__) . 'credit-tracker-shortcodes.php');
require_once(plugin_dir_path(__FILE__) . 'credit-tracker-functions.php');
require_once(plugin_dir_path(__FILE__) . 'options.php');

// Register hooks that are fired when the plugin is activated, deactivated, and uninstalled, respectively.
register_activation_hook(__FILE__, array('Credit_Tracker', 'activate'));
register_deactivation_hook(__FILE__, array('Credit_Tracker', 'deactivate'));

add_action('plugins_loaded', array('Credit_Tracker', 'get_instance'));
