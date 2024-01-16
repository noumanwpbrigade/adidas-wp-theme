<?php
/*
* Template Name: All Events
*/

get_header();
?>

<div class="events">
    <div class="wraper">
        <div class="title"> EVENTS </div>

        <?php
            $args_post = array(
                'posts_per_page' => -1,
                'post_type'      => 'event_post',
                'orderby'        => 'date',
                'order'          => 'ASC',
            );

            $query_posts = new WP_Query($args_post);

            if ($query_posts->have_posts()) :
                echo "<div class='event_slider' data-slick='{\"slidesToShow\": 3, \"slidesToScroll\": 3, \"vertical\": true, \"verticalSwiping\": true}'>";
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
        <div class="more-events">
        <a href="">More Events</a>
        </div>
    </div>
</div>

<script>
    jQuery(document).ready(function($) {
        $('.event_slider').slick({
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 3,
            slidesToScroll: 3,
            vertical: true,
            verticalSwiping: true,
            adaptiveHeight: true
        });
    });
</script>






<!-- or -->

<script>
    document.getElementsByClassName("next")[0].addEventListener("click", function(event){
    event.preventDefault(); // to stay at the same page

        });
</script>