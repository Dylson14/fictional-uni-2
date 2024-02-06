<!-- page.php, controls the template for single pages -->
<!-- This file is solely for learning purposes, has no real use in the final website -->

<?php
// get_header(), retrieves code from header.php file
get_header();

// WP works on loops, the while loop initiates everything. have_posts(), checks to see if where we are in the website has any posts, if posts exists, run the code block inside loop. the_post(), gives us access to funcs for individual posts, like "the_title()"
while (have_posts()) {
    the_post(); ?>

    <h1><?php the_title(); ?></h1>
    <h3>This is a page not a post!</h3>
    <p><?php the_content(); ?></p>

<?php }
// get_footer(), retrieves code from footer.php file
get_footer();
?>
