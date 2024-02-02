<!-- header.php, controls the template for the header -->
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- wp_head() lets WP load all the needed styles/files, WP will determine the best time to load said styles/files. It gets all the needed files from the functions.php file -->
    <?php wp_head(); ?>
</head>

<body>
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
                    <!-- site_url(), automatically gives you the root URL of your current WP website, anything we include as an arg gets added on to the end of the root URl -->
                    <ul>
                        <li><a href="<?php echo site_url('/about-us') ?>">About Us</a></li>
                        <li><a href="#">Programs</a></li>
                        <li><a href="#">Events</a></li>
                        <li><a href="#">Campuses</a></li>
                        <li><a href="#">Blog</a></li>
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