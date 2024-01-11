<?php
/*
* Template Name: Home Page
*/

wp_head();
?>



    <?php    include 'second_post_slider.php';  ?>


    <!-- Sticky Post -->

    <?php   $sticky = get_option('sticky_posts');
                $args = array(
                        'posts_per_page' => 1,
                        'post__in' => $sticky,
                        'ignore_sticky_posts' => 1
                        );
                $query_sticky = new WP_Query($args);

                if ($query_sticky->have_posts()) :
                        while ($query_sticky->have_posts()) : $query_sticky->the_post();
                ?>

                        <div class="sticky-post flex">
                                <div class="sticky-content">
                                        <h3> <?php the_title(); ?> </h3>
                                        <p> <?php the_excerpt(); ?> </p>
                                </div>
                                
                                <?php if (has_post_thumbnail()) : ?>
                                <div class="sticky-post-thumbnail">
                                        <?php the_post_thumbnail('full'); ?>
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
                'order'          => 'DESC',
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
                <?php if (is_active_sidebar('lates-tweets')) { dynamic_sidebar('lates-tweets'); };?>
                </div>

                <!-- Facebook Page -->
                <div class="fb">
                <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FiCodeguru%2Fvideos&tabs=timeline&width=%20&height=500&small_header=false&adapt_container_width=false&hide_cover=false&show_facepile=false&appId" width=" " height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>                
                        
                <?php 

                        // if (is_active_sidebar('fb-page')) {
                        // dynamic_sidebar('fb-page');
                        // }
                ?>
                </div>
        </div>
        <div class="tweets">
    <iframe 
        width="560" 
        height="315" 
        src="https://twitframe.com/show?url=https://twitter.com/" 
        frameborder="0" 
        allowfullscreen
    ></iframe>
</div>    


