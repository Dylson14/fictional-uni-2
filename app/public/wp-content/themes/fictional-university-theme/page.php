<!-- page.php, controls the template for single pages -->

<?php
// get_header(), retrieves code from header.php file
get_header();

// WP works on loops, the while loop initiates everything. have_posts(), checks to see if where we are in the website has any posts, if posts exists, run the code block inside loop. the_post(), gives us access to funcs for individual posts, like "the_title()"
while (have_posts()) {
    the_post(); ?>


    <header class="site-header">
        <div class="container">
            <h1 class="school-logo-text float-left">
                <a href="#"><strong>Fictional</strong> University</a>
            </h1>
            <span class="js-search-trigger site-header__search-trigger"><i class="fa fa-search" aria-hidden="true"></i></span>
            <i class="site-header__menu-trigger fa fa-bars" aria-hidden="true"></i>
            <div class="site-header__menu group">
                <nav class="main-navigation">
                    <ul>
                        <li class="current-menu-item"><a href="#">About Us</a></li>
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

    <div class="page-banner">
        <div class="page-banner__bg-image" style="background-image: url(images/ocean.jpg)"></div>
        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title"><?php the_title(); ?></h1>
            <div class="page-banner__intro">
                <p>Learn how the school of your dreams got started.</p>
            </div>
        </div>
    </div>

    <div class="container container--narrow page-section">
        <div class="metabox metabox--position-up metabox--with-home-link">
            <p>
                <a class="metabox__blog-home-link" href="#"><i class="fa fa-home" aria-hidden="true"></i> Back to About Us</a>
                <span class="metabox__main">Our History</span>
            </p>
        </div>

        <!-- <div class="page-links">
            <h2 class="page-links__title"><a href="#">About Us</a></h2>
            <ul class="min-list">
                <li class="current_page_item"><a href="#">Our History</a></li>
                <li><a href="#">Our Goals</a></li>
            </ul>
        </div> -->

        <div class="generic-content">
            <?php the_content(); ?>
        </div>
    </div>


<?php }
// get_footer(), retrieves code from footer.php file
get_footer();
?>