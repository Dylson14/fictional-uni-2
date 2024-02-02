<!-- This file is solely for learning purposes, has no real use in the final website -->

<!-- get_header(), retrieves code from header.php file -->
<?php
get_header();


// WP works on loops, the while loop initiates everything. have_posts(), checks to see if where we are in the website has any posts, if posts exists, run the code block inside loop. the_post(), gives us access to funcs for individual posts, like "the_title()"
while (have_posts()) {
    the_post(); ?>

    <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
    <p><?php the_content(); ?></p>
    <hr>

<?php }

// get_footer(), retrieves code from footer.php file
get_footer();
?>