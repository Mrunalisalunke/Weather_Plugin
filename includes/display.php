<?php
/**
 * Administration functionality for the Weather Plugin settings page in admin.
 * Requires PHP: 5.6.0
 * 
 * @category Plugin
 * @requires PHP 5.6.0
 * @package  Weather_Plugin
 * @author   Mrunali <mrunalis@bsf.io>
 * @license  GPL-2.0-or-later https://www.gnu.org/licenses/gpl-2.0.html
 * @link     https://example.com/plugin-link
 */
/**
 * Display and update weather data
 * 
 * @return void
 */
function Display_And_Update_Weather_data()
{
    if (isset($_POST['update_weather_data'])) {
        update_option('latitude', sanitize_text_field($_POST['latitude']));
        update_option('longitude', sanitize_text_field($_POST['longitude']));
    }

    $weather_data = Get_Weather_data();
    return "<div class='weather-data'>$weather_data</div>";
}
/**
 * Display and update weather data
 * 
 * @param string $content The content to be updated with weather data.
 * 
 * @return string The updated content with weather data.
 */
function Display_Weather_Data_On_posts($content)
{
    $display_on_posts = get_option('display_on_posts');

    if ($display_on_posts && is_single() && !is_singular('weather')) {
        $weather_data = Display_And_Update_Weather_data();
        return $content . $weather_data;
    }
    
    return $content;
}
/**
 * Display and update weather data
 * 
 * @param string $content The content to be updated with weather data.
 * 
 * @return string The updated content with weather data.
 */
function Display_Weather_Data_On_pages($content)
{
    $display_on_pages = get_option('display_on_pages');

    if ($display_on_pages && is_page()) {
        $weather_data = Display_And_Update_Weather_data();
        return $content . $weather_data;
    }

    return $content;
}
/**
 * Display and update weather data
 * 
 * @param string $content The content to be updated with weather data.
 * 
 * @return string The updated content with weather data.
 */
function Display_Weather_Data_On_Custom_Post_type($content)
{
    $display_on_custom_post_type = get_option('display_on_custom_post_type');

    if ($display_on_custom_post_type && is_singular('weather')) {
        $weather_data = Display_And_Update_Weather_data();
        return $content . $weather_data;
    }

    return $content;
}
/**
 * Display and update weather data
 * 
 * @param string $content The content to be updated with weather data.
 * 
 * @return string The updated content with weather data.
 */
function Display_Weather_Data_On_all($content)
{
    $display_on_all = get_option('display_on_all');

    if ($display_on_all) {
        $weather_data = Display_And_Update_Weather_data();
        return $content . $weather_data;
    }

    return $content;
}


add_filter('the_content', 'Display_Weather_Data_On_posts');
add_filter('the_content', 'Display_Weather_Data_On_pages');
add_filter('the_content', 'Display_Weather_Data_On_Custom_Post_type');
add_filter('the_content', 'Display_Weather_Data_On_all');
