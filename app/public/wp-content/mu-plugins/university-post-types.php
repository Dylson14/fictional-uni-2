<?php

// CUSTOM POST TYPES
function university_post_types()
{
    // register_post_type(), a WP func that takes 2 args, 1: name of custom post type, 2: an array of different options that describe the custom post type. See link for all labels params: https://developer.wordpress.org/reference/functions/get_post_type_labels/
    register_post_type('event', array(
        'public' => true,
        'menu_icon' => 'dashicons-calendar',
        'show_in_rest' => true,
        'has_archive' => true,
        'rewrite' => array(
            'slug' => 'events'
        ),
        'supports' => array(
            'title',
            'editor',
            'excerpt'
        ),
        'labels' => array(
            'name' => 'Events',
            'add_new_item' => 'Add New Event',
            'edit_item' => 'Edit Event',
            'all_items' => 'All Events',
            'singular_name' => 'Event'
        )
    ));
}

// the event hook responsible for creating custom post types
add_action('init', 'university_post_types');
