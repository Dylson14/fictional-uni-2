<?php 

function university_files(){
    // wp_enqueue_style, a hook that lets us load CSS styles, takes two args, 1st is a nickname we provide, 2nd is the file location; we dont need to manually specify style.css file location as it's the main style file
    wp_enqueue_style('university-main-styles', get_stylesheet_uri());
}

// lets us give it instructions, 1st arg is type of instruction on what we're doing
// 2nd arg, give WP name of func we want to run, which we define.
add_action('wp_enqueue_scripts','university_files'); 