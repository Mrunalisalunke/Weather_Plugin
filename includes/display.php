<?php

function display_weather_data_on_posts($content) {
    $display_on_posts = get_option('display_on_posts');

    if ($display_on_posts && is_single() && !is_singular('weather')) {
        $weather_data = get_weather_data();
        $content .= "<div class='weather-data'>$weather_data</div>";
    }

    return $content;
}


function display_weather_data_on_pages($content) {
    $display_on_pages = get_option('display_on_pages');

    if ($display_on_pages && is_page()) {
        $weather_data = get_weather_data();
        $content .= "<div class='weather-data'>$weather_data</div>";
    }

    return $content;
}

function display_weather_data_on_custom_post_type($content) {
    $display_on_custom_post_type = get_option('display_on_custom_post_type');

    if ($display_on_custom_post_type && is_singular('weather')) {
        $weather_data = get_weather_data();
        $content .= "<div class='weather-data'>$weather_data</div>";
    }

    return $content;
}

function display_weather_data_on_all($content) {
    $display_on_all = get_option('display_on_all');

    if ($display_on_all) {
        $weather_data = get_weather_data();
        $content .= "<div class='weather-data'>$weather_data</div>";
    }

    return $content;
}

add_filter('the_content', 'display_weather_data_on_posts');
add_filter('the_content', 'display_weather_data_on_pages');
add_filter('the_content', 'display_weather_data_on_custom_post_type');
add_filter('the_content', 'display_weather_data_on_all');


