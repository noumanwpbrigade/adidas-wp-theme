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
                'posts_per_page' => 3, // -1 to display all posts
                'post_type'      =>   'event_post',  // array('page','post'), post type ka name url sa copy krna ha
                'orderby'        => 'date',
                'order'          => 'ASC',
                'paged'          => get_query_var('paged') ? get_query_var('paged') : 1, // Add this line for pagination                
                // 'paged'          => $_POST['page'] ? $_POST['page'] : 1,
                );

                $query_posts = new WP_Query($args_post);
                echo "<div class=\"event-outer-wrapper\">";

                // print_r($query_posts);

                if ($query_posts->have_posts()) :
                while ($query_posts->have_posts()) : $query_posts->the_post();

                ?>
        <div class="event-wrapper flex">

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

                        <?php 
                        // debugging
                        // var_dump(get_post_meta(get_the_ID(), 'event_e_time'));

                        echo get_post_meta(get_the_ID(), 'event_date', true); ?>

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
        
                <?php
                endwhile;
                 // Output pagination links
                // previous_posts_link('&laquo; Newer Events', $query_posts->max_num_pages);
                // next_posts_link('Older Events &raquo;', $query_posts->max_num_pages);

                ?>
                <div class="event-pagination">
                    <?php
                        
                    ?>
                </div>
                <?php
                
                wp_reset_postdata();
                endif;
                echo "</div>";
        ?>
       

    </div>   
</div>

<script>
    document.getElementsByClassName("next")[0].addEventListener("click", function(event){
    event.preventDefault(); // to stay at the same page

        });
</script>