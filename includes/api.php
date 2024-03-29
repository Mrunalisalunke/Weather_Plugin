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
 * Get Weather Data
 *
 * @return string Weather data or error message.
 */
function Get_Weather_data()
{
    $latitude = floatval(get_option('latitude'));
    $longitude = floatval(get_option('longitude'));

    if (empty($latitude) || empty($longitude)) {
        return __('Error: Latitude and Longitude must be set in plugin options.', 'weather-translate');
    }

    $api_key = '75db5d2cafaff28402711d4266fa7164';
    $api_url = "https://api.openweathermap.org/data/2.5/weather?lat=$latitude&lon=$longitude&appid=$api_key";

    $response = wp_remote_get($api_url);

    if (is_wp_error($response)) {
        return __('Error: Unable to fetch weather data from OpenWeatherMap API.', 'weather-translate');
    }

    $data = json_decode(wp_remote_retrieve_body($response), true);

    if (isset($data['cod']) && $data['cod'] === 200) {
        $temperature = isset($data['main']['temp']) ? $data['main']['temp'] : __('N/A', 'weather-translate');
        $description = isset($data['weather'][0]['description']) ? $data['weather'][0]['description'] : __('N/A', 'weather-translate');
        $city = isset($data['name']) ? $data['name'] : __('N/A', 'weather-translate');
        $country = isset($data['sys']['country']) ? $data['sys']['country'] : __('N/A', 'weather-translate');

        $output = __("Latitude: %s<br>Longitude: %s<br>City: %s<br>Country: %s<br>Temperature: %s°C<br>Description: %s", 'weather-translate');

        $output = sprintf(
            $output,
            esc_html($latitude),
            esc_html($longitude),
            esc_html($city),
            esc_html($country),
            esc_html($temperature),
            esc_html($description)
        );

        return $output;
    } else {
        return __('Error: Unable to fetch weather data. Check your OpenWeatherMap API key and try again.', 'weather-translate');
    }
}
