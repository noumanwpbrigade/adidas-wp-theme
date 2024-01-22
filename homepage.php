<?php
/*
* Template Name: Home Page
*/

wp_head();
?>
    <div id="datafetch"></div>


    <?php    include 'second_post_slider.php';  ?>

    


    <!-- Sticky Post -->

    <?php   $sticky = get_option('sticky_posts');
                $args = array(
                        'posts_per_page' => 1,
                        'post__in' => $sticky,
                        'ignore_sticky_posts' => 1 // ya add krny k bad lates sticky show hu e thi
                        );
                $query_sticky = new WP_Query($args);

                if ($query_sticky->have_posts()) :
                        while ($query_sticky->have_posts()) : $query_sticky->the_post();
                ?>

                        <div class="sticky-post flex">
                                <div class="sticky-content">
                                        <h3><a href="<?php the_permalink(); ?>" style="text-decoration: none;"><?php the_title(); ?></a>  </h3>
                                        <p> <?php the_excerpt(); ?> </p>
                                </div>
                                
                                <?php if (has_post_thumbnail()) : ?>
                                <div class="sticky-post-thumbnail">
                                        <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail('full'); ?>
                                        </a>
                                </div>
                                <?php endif; ?>
                        </div>

                <?php
                        endwhile;
                        wp_reset_postdata();
                endif;
                ?>
        <!-- last 3 posts -->

        <?php
                $last_three_posts = get_option('public');
                $args_post = array(
                'posts_per_page' => 3,
                'post__in'       => $last_three_posts,
                'post_type'      => 'post',
                'post_status'    => 'publish',
                'orderby'        => 'date',
                'order'          => 'DESC', // last wali 3
                'ignore_sticky_posts' => 1, // Exclude sticky posts, error resolved 
                );

                $query_posts = new WP_Query($args_post);
                echo "<div class=\"last-post-wrapper flex\">";

                if ($query_posts->have_posts()) :
                while ($query_posts->have_posts()) : $query_posts->the_post();
                ?>
                        <div class="post-item">
                                <div class="latest-post-thumbnail">
                                        <?php if (has_post_thumbnail()) : ?>
                                        <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail('thumbnail'); ?>
                                        </a>
                                        <?php endif; ?>
                                </div>
                                <div class="the-title">
                                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                </div>
                                <div class="the-description">
                                        <?php the_excerpt(); ?>
                                </div>
                                <a href="<?php the_permalink(); ?>" class="btn-read-more">READ MORE</a>
                        </div>
                <?php
                endwhile;
                wp_reset_postdata();
                endif;
                echo "</div>";
        ?>

                                
        <div class="social-section flex">
                <!-- Lates Tweets -->
                <div class="tweets">
                        <?php if (is_active_sidebar('lates-tweets')) { 
                                dynamic_sidebar('lates-tweets'); 
                                }
                        ?>
                </div>

                <!-- Facebook Page -->
                <div class="fb-page">
                        
                <?php 
                        if (is_active_sidebar('fb-page')) {
                        dynamic_sidebar('fb-page');
                        }
                ?>
                </div>
        </div>  


