<?php

// Admin screen and options
function weather_data_plugin_options_page() {
    ?>
    <div class="wrap">
        <h1>Weather Data Plugin Options</h1>
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

function weather_data_plugin_register_settings() {
    register_setting('weather_data_plugin_options', 'display_on_pages');
    register_setting('weather_data_plugin_options', 'display_on_posts');
    register_setting('weather_data_plugin_options', 'display_on_custom_post_type');
    register_setting('weather_data_plugin_options', 'display_on_all');

    add_settings_section('weather_data_plugin_section', 'API Settings', null, 'weather_data_plugin');
    add_settings_field('display_on_pages', 'Display on Pages', 'display_on_pages_field', 'weather_data_plugin', 'weather_data_plugin_section');
    add_settings_field('display_on_posts', 'Display on Posts', 'display_on_posts_field', 'weather_data_plugin', 'weather_data_plugin_section');
    add_settings_field('display_on_custom_post_type', 'Display on Custom Post Type', 'display_on_custom_post_type_field', 'weather_data_plugin', 'weather_data_plugin_section');
    add_settings_field('display_on_all', 'Display on All', 'display_on_all_field', 'weather_data_plugin', 'weather_data_plugin_section');
}


function display_on_pages_field() {
    $display_on_pages = get_option('display_on_pages');
    echo "<input type='checkbox' name='display_on_pages' value='1' " . checked(1, $display_on_pages, false) . " />";
}

function display_on_posts_field() {
    $display_on_posts = get_option('display_on_posts');
    echo "<input type='checkbox' name='display_on_posts' value='1' " . checked(1, $display_on_posts, false) . " />";
}

function display_on_custom_post_type_field() {
    $display_on_custom_post_type = get_option('display_on_custom_post_type');
    echo "<input type='checkbox' name='display_on_custom_post_type' value='1' " . checked(1, $display_on_custom_post_type, false) . " />";
}

function display_on_all_field() {
    $display_on_all = get_option('display_on_all');
    echo "<input type='checkbox' name='display_on_all' value='1' " . checked(1, $display_on_all, false) . " />";
}


