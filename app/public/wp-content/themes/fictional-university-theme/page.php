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

    <div class="container container--narrow page-section">

        <?php
        /* 1: If the current page has a PARENT page (thus, is a child page), then display the metaBox 
        get_the_ID(), gets the current ID for the post or page.
        2: wp_get_post_parent_id(<arg>), gets the parent ID of the specific page or post id that is passed as an arg. 
        3: wp_get_post_parent_id(get_the_ID()), combining both funcs will give us the parent ID of the current page we're in. If the page has a parent, an integer value will return, if the page has no parent the value 0 will return. */

        $theParent = wp_get_post_parent_id(get_the_ID());
        if ($theParent) { ?>
            <!-- metaBox_start -->
            <div class="metabox metabox--position-up metabox--with-home-link">
                <p>
                    <!-- 1: get_the_title(<arg>), takes an ID as an arg, then outputs title of the post or page that  corresponds to that ID; the_title(), just outputs the title of the CURRENT page or post you're in 
                    2: get_permalink(<arg>), takes an ID as an arg, gets the link of the post or page that corresponds to that ID -->
                    <a class="metabox__blog-home-link" href="<?php echo get_permalink($theParent); ?>"><i class="fa fa-home" aria-hidden="true"></i> Back to <?php echo get_the_title($theParent); ?></a>
                    <span class="metabox__main"><?php the_title(); ?></span>
                </p>
            </div>
            <!-- metaBox_end -->
        <?php } ?>


        <?php 
        // get_pages(<arg>) returns the pages in memory, you can pass an associative array as an arg to access parameters. wp_list_pages(<arg>) handles outputting pages onto the screen for you. 
        $testArray = get_pages(array(
            'child_of' => get_the_ID()
        ));
        ?>

        <?php if ($theParent or $testArray) { ?>
            <!-- sideBarMenu_start -->
            <div class="page-links">
                <h2 class="page-links__title"><a href="<?php echo get_permalink($theParent); ?>"><?php echo get_the_title($theParent) ?></a></h2>
                <ul class="min-list">
                    <?php
                    /*  1: if current page is parent, value is 0, so display the children pages of current page.
                    2: if current page is child, value is integer, so display the children pages of that integer */
                    if ($theParent) {
                        $findChildrenOf = $theParent;
                    } else {
                        $findChildrenOf = get_the_ID();
                    }
                    // wp_list_pages(<arg>), lists all pages of the website, however, as an arg, you can pass an associative array, which will give you access to a list of parameters that each do something. For ex. child_of param shows the children pages of the ID its pointing to
                    wp_list_pages(array(
                        'title_li' => NULL,
                        'child_of' => $findChildrenOf,
                        'sort_column' => 'menu_order'
                    ));
                    ?>
                </ul>
            </div>
            <!-- sideBarMenu_end -->
        <?php } ?>

        <div class="generic-content">
            <?php the_content(); ?>
        </div>
    </div>


<?php }
// get_footer(), retrieves code from footer.php file
get_footer();
?>