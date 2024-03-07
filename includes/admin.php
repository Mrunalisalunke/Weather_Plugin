<?php
/**
 * Administration functionality for the Weather Plugin settings page in admin.
 * 
 * @category Plugin
 * @requires PHP 5.6.0
 * @package  Weather_Plugin
 * @author   Mrunali <mrunalis@bsf.io>
 * @license  GPL-2.0-or-later https://www.gnu.org/licenses/gpl-2.0.html
 * @link     https://example.com/plugin-link
 */
/**
 * Weather Data plugin options page
 * 
 * @return void
 */
function Weather_Data_Plugin_Options_page()
{
    ?>
    <div class="wrap">
        <h1><?php _e('Weather Data Plugin Options', 'weather-translate'); ?></h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('weather_data_plugin_options');
            do_settings_sections('weather_data_plugin');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}
/**
 * Weather Data plugin Register settings
 * 
 * @return void
 */
function Weather_Data_Plugin_Register_settings()
{
    register_setting('weather_data_plugin_options', 'display_on_pages');
    register_setting('weather_data_plugin_options', 'display_on_posts');
    register_setting('weather_data_plugin_options', 'display_on_custom_post_type');
    register_setting('weather_data_plugin_options', 'display_on_all');
    register_setting('weather_data_plugin_options', 'latitude');
    register_setting('weather_data_plugin_options', 'longitude');

    add_settings_section('weather_data_plugin_section', __('API Settings', 'weather-translate'), null, 'weather_data_plugin');
    add_settings_field('display_on_pages', __('Display on Pages', 'weather-translate'), 'Display_On_Pages_field', 'weather_data_plugin', 'weather_data_plugin_section');
    add_settings_field('display_on_posts', __('Display on Posts', 'weather-translate'), 'Display_On_Posts_field', 'weather_data_plugin', 'weather_data_plugin_section');
    add_settings_field('display_on_custom_post_type', __('Display on Custom Post Type', 'weather-translate'), 'Display_On_Custom_Post_Type_field', 'weather_data_plugin', 'weather_data_plugin_section');
    add_settings_field('display_on_all', __('Display on All', 'weather-translate'), 'Display_On_All_field', 'weather_data_plugin', 'weather_data_plugin_section');
    add_settings_field('latitude', __('Latitude', 'weather-translate'), 'Latitude_field', 'weather_data_plugin', 'weather_data_plugin_section');
    add_settings_field('longitude', __('Longitude', 'weather-translate'), 'Longitude_field', 'weather_data_plugin', 'weather_data_plugin_section');

}
/**
 * Display data on pages field
 * 
 * @return void
 */
function Display_On_Pages_field()
{
    $display_on_pages = get_option('display_on_pages');
    echo "<input type='checkbox' name='display_on_pages' value='1' " . checked(1, $display_on_pages, false) . " />";
}
/**
 * Display data on posts field
 * 
 * @return void
 */
function Display_On_Posts_field()
{
    $display_on_posts = get_option('display_on_posts');
    echo "<input type='checkbox' name='display_on_posts' value='1' " . checked(1, $display_on_posts, false) . " />";
}
/**
 * Display data on custom post type field
 * 
 * @return void
 */
function Display_On_Custom_Post_Type_field()
{
    $display_on_custom_post_type = get_option('display_on_custom_post_type');
    echo "<input type='checkbox' name='display_on_custom_post_type' value='1' " . checked(1, $display_on_custom_post_type, false) . " />";
}
/**
 * Display data on all
 * 
 * @return void
 */
function Display_On_All_field()
{
    $display_on_all = get_option('display_on_all');
    echo "<input type='checkbox' name='display_on_all' value='1' " . checked(1, $display_on_all, false) . " />";
}
/**
 * Latitude Field
 * 
 * @return void
 */
function Latitude_field()
{
    $latitude = get_option('latitude', '');
    echo "<input type='text' name='latitude' value='" . esc_attr($latitude) . "' />";

}
/**
 * Longitude field
 * 
 * @return void
 */
function Longitude_field()
{
    $longitude = get_option('longitude', '');
    echo "<input type='text' name='longitude' value='" . esc_attr($longitude) . "' />";

}
