<!-- front-page.php, controls the template for the homepage content -->

<!-- get_header(), retrieves code from header.php file -->
<?php get_header(); ?>

<!-- mainContent_start -->
<div class="page-banner">
    <!-- get_theme_file_uri('<file_path_here>'), this hook lets you retrieve files -->
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/library-hero.jpg'); ?>)"></div>
    <div class="page-banner__content container t-center c-white">
        <h1 class="headline headline--large">Welcome!</h1>
        <h2 class="headline headline--medium">
            We think you&rsquo;ll like it here.
        </h2>
        <h3 class="headline headline--small">
            Why don&rsquo;t you check out the <strong>major</strong> you&rsquo;re
            interested in?
        </h3>
        <a href="#" class="btn btn--large btn--blue">Find Your Major</a>
    </div>
</div>

<div class="full-width-split group">
    <div class="full-width-split__one">
        <div class="full-width-split__inner">
            <h2 class="headline headline--small-plus t-center">
                Upcoming Events
            </h2>

            <?php
            // WP_Query, a WP object we can use to bring in custom post types, it can also bring in information from different sections of the website. i.e we brought in posts data into our front-page, where usally such info would only be available in posts page. 
            $today = date('Ymd');
            $homepageEvents = new WP_Query(array(
                'post_type' => 'event',
                'posts_per_page' => 2,
                // beneath is how we can select the custom field we set in the FE using ACF plugin, meta_key select the custom field key; orderby and order just deal with its arrangement.
                'meta_key' => 'event_date',
                'orderby' => 'meta_value_num',
                'order' => 'ASC',
                // beneath is how we can filter out events based on their event_date custom field
                'meta_query' => array(
                    array(
                        'key' => 'event_date',
                        'compare' => '>=',
                        'value' => $today,
                        'type' => 'numeric'
                    )
                )
            ));

            while ($homepageEvents->have_posts()) {
                $homepageEvents->the_post(); ?>

                <div class="event-summary">
                    <a class="event-summary__date t-center" href="<?php echo get_permalink(); ?>">
                        <span class="event-summary__month">
                            <?php
                            // get_field(), brings in the custom fields set up using ACF, so that we can use it in the backend
                            $eventDate = new DateTime(get_field('event_date'));
                            echo $eventDate->format('M')
                            ?>
                        </span>
                        <span class="event-summary__day">
                            <?php
                            $eventDate = new DateTime(get_field('event_date'));
                            echo $eventDate->format('d')
                            ?>
                        </span>
                    </a>
                    <div class="event-summary__content">
                        <h5 class="event-summary__title headline headline--tiny">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h5>
                        <p>
                            <?php if (has_excerpt()) {
                                echo get_the_excerpt();
                            } else {
                                /* wp_trim_words(), func takes 2  args, 1: content you want to limit, 2: how many words you want to limit it to. get_the_content(), will get current page content  */
                                echo wp_trim_words(get_the_content(), 18);
                            } ?>
                            <a href="<?php the_permalink(); ?>" class="nu gray">Learn more</a>
                        </p>
                    </div>
                </div>

            <?php }
            // once you created a custom query, and used it in a while loop, after loop ends, call wp_reset_postdata(), resets WP data and global variables back to default to the current URL.
            wp_reset_postdata();
            ?>

            <p class="t-center no-margin">
                <a href="<?php echo get_post_type_archive_link('event') ?>" class="btn btn--blue">View All Events</a>
            </p>
        </div>
    </div>
    <div class="full-width-split__two">
        <div class="full-width-split__inner">
            <h2 class="headline headline--small-plus t-center">From Our Blogs</h2>

            <?php
            // The content queried, will only show back information related to the URL you are trying to access. So to access the blog content in the home URL, we'll need to use a custom query.
            $hompagePosts = new WP_Query(array(
                'post_type' => 'post',
                'posts_per_page' => 2
            ));

            while ($hompagePosts->have_posts()) {
                $hompagePosts->the_post(); ?>
                <div class="event-summary">
                    <a class="event-summary__date event-summary__date--beige t-center" href="<?php the_permalink() ?>">
                        <span class="event-summary__month"><?php the_time('M') ?></span>
                        <span class="event-summary__day"><?php the_time('d') ?></span>
                    </a>
                    <div class="event-summary__content">
                        <h5 class="event-summary__title headline headline--tiny">
                            <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                        </h5>
                        <p>
                            <!-- If condition will check if a post has a custom excerpt, if not, the fallback will be the first 18 words of the body of the post -->
                            <?php if (has_excerpt()) {
                                echo get_the_excerpt();
                            } else {
                                /* wp_trim_words(), func takes 2  args, 1: content you want to limit, 2: how many words you want to limit it to. get_the_content(), will get current page content  */
                                echo wp_trim_words(get_the_content(), 18);
                            } ?>
                            <a href="<?php the_permalink() ?>" class="nu gray">Read more</a>
                        </p>
                    </div>
                </div>
            <?php }
            // once you created a custom query, and used it in a while loop, after loop ends, call wp_reset_postdata(), resets WP data and global variables back to default to the current URL.
            wp_reset_postdata();
            ?>

            <p class="t-center no-margin">
                <a href="<?php echo site_url('/blog') ?>" class="btn btn--yellow">View All Blog Posts</a>
            </p>
        </div>
    </div>
</div>

<div class="hero-slider">
    <div data-glide-el="track" class="glide__track">
        <div class="glide__slides">
            <div class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri('/images/bus.jpg'); ?>)">
                <div class="hero-slider__interior container">
                    <div class="hero-slider__overlay">
                        <h2 class="headline headline--medium t-center">
                            Free Transportation
                        </h2>
                        <p class="t-center">
                            All students have free unlimited bus fare.
                        </p>
                        <p class="t-center no-margin">
                            <a href="#" class="btn btn--blue">Learn more</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri('/images/apples.jpg'); ?>)">
                <div class="hero-slider__interior container">
                    <div class="hero-slider__overlay">
                        <h2 class="headline headline--medium t-center">
                            An Apple a Day
                        </h2>
                        <p class="t-center">
                            Our dentistry program recommends eating apples.
                        </p>
                        <p class="t-center no-margin">
                            <a href="#" class="btn btn--blue">Learn more</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri('/images/bread.jpg'); ?>)">
                <div class="hero-slider__interior container">
                    <div class="hero-slider__overlay">
                        <h2 class="headline headline--medium t-center">Free Food</h2>
                        <p class="t-center">
                            Fictional University offers lunch plans for those in need.
                        </p>
                        <p class="t-center no-margin">
                            <a href="#" class="btn btn--blue">Learn more</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="slider__bullets glide__bullets" data-glide-el="controls[nav]"></div>
    </div>
</div>
<!-- mainContent_end -->

<?php
// get_footer(), retrieves code from footer.php file
get_footer(); ?>