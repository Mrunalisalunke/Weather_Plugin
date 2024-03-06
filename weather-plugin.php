<?php
/*
Plugin Name: Weather Plugin
Description: Display weather data on WordPress site using the OpenWeatherMap API.
Version: 1.0
Author: Mrunali
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

add_action('admin_menu', 'weather_data_plugin_menu');
add_action('admin_init', 'weather_data_plugin_register_settings');


function weather_data_plugin_menu() {
    add_menu_page('Weather Data Plugin', 'Weather Plugin', 'manage_options', 'weather_data_plugin', 'weather_data_plugin_options_page');
}




