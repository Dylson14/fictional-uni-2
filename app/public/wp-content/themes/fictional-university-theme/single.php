<!-- single.php, controls the template for single posts  -->

<?php

get_header();

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

    <div class="container container--narrow page-section">
        <!-- metaBox_start -->
        <div class="metabox metabox--position-up metabox--with-home-link">
            <p>
                <!-- 1: get_the_title(<arg>), takes an ID as an arg, then outputs title of the post or page that  corresponds to that ID; the_title(), just outputs the title of the CURRENT page or post you're in 
                    2: get_permalink(<arg>), takes an ID as an arg, gets the link of the post or page that corresponds to that ID -->
                <a class="metabox__blog-home-link" href="<?php echo site_url('/blog'); ?>"><i class="fa fa-home" aria-hidden="true"></i> Blog Home</a>
                <span class="metabox__main">Posted by <?php the_author_posts_link(); ?> on <?php the_time('d.M.y'); ?> in <?php echo get_the_category_list(', ') ?></span>
            </p>
        </div>
        <!-- metaBox_end -->

        <div class="generic-content">
            <?php the_content(); ?>
        </div>
    </div>

<?php }

get_footer();
?>