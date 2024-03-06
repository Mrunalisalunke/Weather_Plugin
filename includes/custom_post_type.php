<?php

function add_weather_post_type() {
    $args = array(
        'label'         => 'Weather',
        'public'        => true,
        'has_archive'   => true,
        'supports'      => array('title', 'thumbnail'),
        'rewrite'       => array('slug' => 'weather'), // Specify the slug for the custom post type
    );
    register_post_type('weather', $args);
}

add_action('init', 'add_weather_post_type');
