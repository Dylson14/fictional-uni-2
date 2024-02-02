<!-- page.php, controls the template for single pages -->

<?php
// get_header(), retrieves code from header.php file
get_header();

// WP works on loops, the while loop initiates everything. have_posts(), checks to see if where we are in the website has any posts, if posts exists, run the code block inside loop. the_post(), gives us access to funcs for individual posts, like "the_title()"
while (have_posts()) {
    the_post(); ?>

    <div class="page-banner">
        <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg'); ?>)"></div>
        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title"><?php the_title(); ?></h1>
            <div class="page-banner__intro">
                <p>DON'T FORGET TO REPLACE ME LATER!!!</p>
            </div>
        </div>
    </div>

    <!-- breadCrumbBox_start -->
    <div class="container container--narrow page-section">
        <div class="metabox metabox--position-up metabox--with-home-link">
            <p>
                <a class="metabox__blog-home-link" href="#"><i class="fa fa-home" aria-hidden="true"></i> Back to About Us</a>
                <span class="metabox__main">Our History</span>
            </p>
        </div>
        <!-- breadCrumbBox_end -->

        <!-- metaBox_start -->
        <!-- <div class="page-links">
            <h2 class="page-links__title"><a href="#">About Us</a></h2>
            <ul class="min-list">
                <li class="current_page_item"><a href="#">Our History</a></li>
                <li><a href="#">Our Goals</a></li>
            </ul>
        </div> -->
        <!-- metaBox_end -->

        <div class="generic-content">
            <?php the_content(); ?>
        </div>
    </div>


<?php }
// get_footer(), retrieves code from footer.php file
get_footer();
?>