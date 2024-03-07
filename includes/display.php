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
        $latitude_longitude_form = Display_Latitude_Longitude_form();
        $weather_data = Display_And_Update_Weather_data();
        return $content . $latitude_longitude_form . $weather_data;
    }
    
    return $content;
}
/**
 * Display Weather data on pages
 * 
 * @return void
 */
function Display_Weather_Data_On_pages($content)
{
    $display_on_pages = get_option('display_on_pages');

    if ($display_on_pages && is_page()) {
        $latitude_longitude_form = Display_Latitude_Longitude_form();
        $weather_data = Display_And_Update_Weather_data();
        return $content . $latitude_longitude_form . $weather_data;
    }

    return $content;
}
/**
 * Display Weather data on custom post type
 * 
 * @return void
 */
function Display_Weather_Data_On_Custom_Post_type($content)
{
    $display_on_custom_post_type = get_option('display_on_custom_post_type');

    if ($display_on_custom_post_type && is_singular('weather')) {
        $latitude_longitude_form = Display_Latitude_Longitude_form();
        $weather_data = Display_And_Update_Weather_data();
        return $content . $latitude_longitude_form . $weather_data;
    }

    return $content;
}
/**
 * Display Weather data on all
 * 
 * @return void
 */
function Display_Weather_Data_On_all($content)
{
    $display_on_all = get_option('display_on_all');

    if ($display_on_all) {
        $latitude_longitude_form = Display_Latitude_Longitude_form();
        $weather_data = Display_And_Update_Weather_data();
        return $content . $latitude_longitude_form . $weather_data;
    }

    return $content;
}
/**
 * Display Latitude and Longitude form
 * 
 * @return void
 */
function Display_Latitude_Longitude_form()
{
    $latitude = get_option('latitude', '44.34'); 
    $longitude = get_option('longitude', '10.99'); 

    return "<form method='post' action=''>
        " . __('Latitude:', 'weather-translate') . " <input type='text' name='latitude' value='$latitude' /><br>
        " . __('Longitude:', 'weather-translate') . " <input type='text' name='longitude' value='$longitude' /><br>
        <input type='submit' name='update_weather_data' value='" . __('Update Weather Data', 'weather-translate') . "'>
    </form>";
}

add_filter('the_content', 'Display_Weather_Data_On_posts');
add_filter('the_content', 'Display_Weather_Data_On_pages');
add_filter('the_content', 'Display_Weather_Data_On_Custom_Post_type');
add_filter('the_content', 'Display_Weather_Data_On_all');
