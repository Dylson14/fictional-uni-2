<!-- archive-event.php, controls the template for the event archives -->

<?php
get_header(); ?>

<div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg'); ?>)"></div>
    <div class="page-banner__content container container--narrow">
        <!-- the_archive_title(), takes care of the title of any archive -->
        <h1 class="page-banner__title">Past Events</h1>
        <div class="page-banner__intro">
            <p>A Recap of our past Events</p>
        </div>
    </div>
</div>

<div class="container container--narrow page-section">
    <?php
    $today = date('Ymd');
    $pastEvents = new WP_Query(array(
        'paged' => get_query_var('paged', 1),
        'post_type' => 'event',
        'posts_per_page' => 1,
        // beneath is how we can select the custom field we set in the FE using ACF plugin, meta_key select the custom field key; orderby and order just deal with its arrangement.
        'meta_key' => 'event_date',
        'orderby' => 'meta_value_num',
        'order' => 'ASC',
        // beneath is how we can filter out events based on their event_date custom field
        'meta_query' => array(
            array(
                'key' => 'event_date',
                'compare' => '<=',
                'value' => $today,
                'type' => 'numeric'
            )
        )
    ));

    while ($pastEvents->have_posts()) {
        $pastEvents->the_post(); ?>

        <div class="event-summary">
            <a class="event-summary__date t-center" href="#">
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
                    <?php echo wp_trim_words(get_the_content(), 18); ?>
                    <a href="<?php the_permalink(); ?>" class="nu gray">Learn more</a>
                </p>
            </div>
        </div>

    <?php }
    echo paginate_links(array(
        'total' => $pastEvents->max_num_pages
    ));
    // once you created a custom query, and used it in a while loop, after loop ends, call wp_reset_postdata(), resets WP data and global variables back to default to the current URL.
    wp_reset_postdata();
    ?>
</div>

<?php get_footer();
?>