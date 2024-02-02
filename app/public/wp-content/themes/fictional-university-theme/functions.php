<?php
// functions.php, does many things. Lets us define functions and use them to perform an action, like load CSS and JS files 


function university_files()
{
    // wp_enqueue_style, a hook that lets us load CSS styles. Takes two args, 1st is a nickname we provide, 2nd is the file location. For the main styles file (style.css), we dont need to manually specify the file location as it's the main style file. To get its file location, simply use  get_stylesheet_uri(). Otherwise to specify a specific file use the hook get_theme_file_uri('<file_path_here>'). 
    // font-awesome is responsible for the social icons, found in the footer; we're also using google-fonts for our typography.
    // wp_enqueue_script, lets you load JS files. Takes 4 args, 1st the file path to be loaded; 2nd any file dependencies; 3rd version number for your script; 4th WP asks if we want to load file right before the closing body tag (true for yes, false for no); 
    wp_enqueue_script('main-university-js', get_theme_file_uri('/build/index.js'), array('jquery'), '1.0', true);
    wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
    wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('university-main-styles', get_theme_file_uri('/build/style-index.css'));
    wp_enqueue_style('university-extra-styles', get_theme_file_uri('/build/index.css'));
}

// add_action(), a hook that lets us give WP instructions. Takes two args, 1st arg is type of instruction on what we're doing; wp_enqueue_scripts lets us call a func we define in the 2nd arg. 2nd arg gives WP the name of a func we want to run, which we define.
add_action('wp_enqueue_scripts', 'university_files');
