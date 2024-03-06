<?php

// OpenWeatherMap API integration
function get_weather_data() {
    $api_url = 'https://api.openweathermap.org/data/2.5/weather?lat=44.34&lon=10.99&appid=75db5d2cafaff28402711d4266fa7164';

    $response = wp_remote_get($api_url);

    if (is_wp_error($response)) {
        return 'Error fetching data from OpenWeatherMap API.';
    }

    $data = json_decode(wp_remote_retrieve_body($response), true);

    if (isset($data['cod']) && $data['cod'] === 200) {
        // Convert the entire JSON response to a formatted string
        $formatted_data = '<pre>' . json_encode($data, JSON_PRETTY_PRINT) . '</pre>';
        return $formatted_data;
    } else {
        return 'Error: Unable to fetch weather data.';
    }
}