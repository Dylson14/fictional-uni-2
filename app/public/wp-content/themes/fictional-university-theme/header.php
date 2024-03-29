<!-- header.php, controls the template for the header -->
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- wp_head() lets WP load all the needed styles/files, WP will determine the best time to load said styles/files. It gets all the needed files from the functions.php file -->
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <!-- HEADER_start -->
    <header class="site-header">
        <div class="container">
            <h1 class="school-logo-text float-left">
                <a href="<?php echo site_url('/') ?>"><strong>Fictional</strong> University</a>
            </h1> 
            <span class="js-search-trigger site-header__search-trigger"><i class="fa fa-search" aria-hidden="true"></i></span>
            <i class="site-header__menu-trigger fa fa-bars" aria-hidden="true"></i>
            <div class="site-header__menu group">
                <nav class="main-navigation">
                    
                    <!-- wp_nav_menu(), this func lets us determine where our nav menus will be placed, takes an associative array as an arg to acces params-->
                    <!-- <php 
                        wp_nav_menu(array(
                            'theme_location' => 'headerMenuLocation'
                        )); 
                    ?> -->
                    
                    <!-- site_url(), automatically gives you the root URL of your current WP website, anything we include as an arg gets added on to the end of the root URl -->
                    <ul> 
                        <li <?php if(is_page('about-us') OR wp_get_post_parent_id(0) == 21) echo 'class="current-menu-item"'?> ><a href="<?php echo site_url('/about-us') ?>">About Us</a></li>
                        <li><a href="#">Programs</a></li>
                        <li <?php if (get_post_type() == 'event') echo 'class="current-menu-item"' ?>><a href="<?php echo get_post_type_archive_link('event') ?>">Events</a></li>
                        <li><a href="#">Campuses</a></li>
                        <li <?php if (get_post_type() == 'post') echo 'class="current-menu-item"'?>><a href="<?php echo site_url('/blog') ?>">Blog</a></li>
                    </ul>
                </nav>
                <div class="site-header__util">
                    <a href="#" class="btn btn--small btn--orange float-left push-right">Login</a>
                    <a href="#" class="btn btn--small btn--dark-orange float-left">Sign Up</a>
                    <span class="search-trigger js-search-trigger"><i class="fa fa-search" aria-hidden="true"></i></span>
                </div>
            </div>
        </div>
    </header>
    <!-- HEADER_end -->