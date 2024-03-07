<?php
/**
 * Plugin Name: Weather Plugin
 * Description: Display weather data on WordPress site using the OpenWeatherMap API.
 * Version: 1.0
 * Author: Mrunali
 * Text Domain: weather-translate
 * Domain Path: /languages
 * Requires PHP: 5.6.0
 *
 * @category Plugin
 * @requires PHP 5.6.0
 * @package  Weather_Plugin
 * @author   Mrunali <mrunalis@bsf.io>
 * @license  GPL-2.0-or-later https://www.gnu.org/licenses/gpl-2.0.html
 * @link     https://example.com/plugin-link
 */



if (!defined('ABSPATH')) {
    die('No Script kitties please');
}

define('WEATHER_PLUGIN_FILE', __FILE__);
define('WEATHER_VERSION', '1.0');

require_once dirname(__FILE__) . '/includes/custom_post_type.php';
require_once dirname(__FILE__) . '/includes/admin.php';
require_once dirname(__FILE__) . '/includes/api.php';
require_once dirname(__FILE__) . '/includes/display.php';

add_action('admin_menu', 'Weather_Data_Plugin_menu');
add_action('admin_init', 'Weather_Data_Plugin_Register_settings');
add_action('plugins_loaded', 'Weather_Plugin_Load_textdomain');

/**
 * Adds the weather data plugin menu page.
 *
 * @return void
 */
function Weather_Data_Plugin_menu()
{
    add_menu_page(
        'Weather Data Plugin',
        __('Weather Plugin', 'weather-translate'),
        'manage_options',
        'weather_data_plugin',
        'weather_data_plugin_options_page'
    );
}

/**
 * Loads the plugin text domain for translation.
 *
 * @return void
 */
function Weather_Plugin_Load_textdomain()
{
    load_plugin_textdomain(
        'weather-translate',
        false,
        dirname(plugin_basename(__FILE__)) . '/languages'
    );
}
