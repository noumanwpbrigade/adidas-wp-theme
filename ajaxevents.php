<?php
/*
* Template Name: Events posts
*/

get_header();
?>

<div class="events">
    <div class="wrapper">
        <div class="title"> EVENTS </div>

        <?php
        $args_post0 = array(
            'posts_per_page' => -1,
            'paged' => 1,
            'post_type'      => 'event_post',
            'orderby'        => 'date',
            'order'          => 'ASC',
            'meta_query'     => array(
                array(
                    'key'     => 'event_date',
                    'value'   => date('Y-m-d'),
                    'compare' => '>=',
                    'type'    => 'DATE',
                ),
            ),
        );

        $query_posts = new WP_Query($args_post0);
        // echo $query_posts->found_posts;

        $args_post = array(
            'posts_per_page' => 3,
            'paged' => 1,
            'post_type'      => 'event_post',
            'orderby'        => 'date',
            'order'          => 'ASC',
            'meta_query'     => array(
                array(
                    'key'     => 'event_date',
                    'value'   => date('Y-m-d'),
                    'compare' => '>=',
                    'type'    => 'DATE',
                ),
            ),
        );

        $query_posts = new WP_Query($args_post);
        ?>
        <div id="append-wrapper" data-count="<?php echo ceil($query_posts->found_posts / 3); ?>">
            <?php

            if ($query_posts->have_posts()) :
                echo "<div class='event_slider'>";
                while ($query_posts->have_posts()) : $query_posts->the_post();
                    ?>
                    <div class="event-wrapper flex">
                        <div class="flex">
                            <div class="event-thumbnail">
                                <?php if (has_post_thumbnail()) : ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('thumbnail'); ?>
                                    </a>
                                <?php endif; ?>
                            </div>

                            <div class="event-content flex">
                                <div class="event-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </div>
                                <div class="event-dates ">
                                    <div class="event-year">
                                        <?php echo get_post_meta(get_the_ID(), 'event_date', true); ?>
                                    </div>
                                    <span class="event-s-time">
                                        <?php echo get_post_meta(get_the_ID(), 'event_s_time', true); ?>
                                    </span>
                                    <span> - </span>
                                    <span class="event-e-time">
                                        <?php echo get_post_meta(get_the_ID(), 'event_e_time', true); ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
                echo "</div>";
            endif;
            ?>
        </div>
        <div class="more-events flex">
            <div class="events-btn">
                <button id="previous" data-page="1" class="previous-btn">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/pagination-arrow-left.png" alt="prev">
                </button>
                <button id="next" data-page="2" class="next-btn">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/pagination-arrow-right.png" alt="next">
                </button>
            </div>
            <a href="<?php echo get_post_type_archive_link('event_post'); ?>">More Events</a>
        </div>
    </div>
</div>
