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
 * 
 * 
 * @return void
 */
function Add_Weather_Post_type() {
    $labels = array(
        'name'               => _x('Weather', 'post type general name', 'weather-translate'),
        'singular_name'      => _x('Weather', 'post type singular name', 'weather-translate'),
        'menu_name'          => _x('Weather', 'admin menu', 'weather-translate'),
        'name_admin_bar'     => _x('Weather', 'add new on admin bar', 'weather-translate'),
        'add_new'            => _x('Add New', 'Weather', 'weather-translate'),
        'add_new_item'       => __('Add New Weather', 'weather-translate'),
        'new_item'           => __('New Weather', 'weather-translate'),
        'edit_item'          => __('Edit Weather', 'weather-translate'),
        'view_item'          => __('View Weather', 'weather-translate'),
        'all_items'          => __('All Weather', 'weather-translate'),
        'search_items'       => __('Search Weather', 'weather-translate'),
        'parent_item_colon'  => __('Parent Weather:', 'weather-translate'),
        'not_found'          => __('No Weather found.', 'weather-translate'),
        'not_found_in_trash' => __('No Weather found in Trash.', 'weather-translate'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'supports'           => array('title', 'thumbnail'),
        'rewrite'            => array('slug' => 'weather'), 
    );
    register_post_type('weather', $args);
}

add_action('init', 'Add_Weather_Post_type');
