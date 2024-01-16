<?php
/*
* Template Name: Show All Post In Slider
*/

get_header();
?>

<style>
    a:visited   {
    color: #fff ;
}
</style>




<!-- <div class="container"> -->
    <!-- <div id="custom-background-div" style="background-color: red; background-image: url('<?php // echo esc_url(get_theme_mod('background_image', '')); ?>'); width: 100%; height: 40vh;"> -->
        <!-- Your content goes here -->
    <!-- </div> -->

<!-- </div> -->

    <div class="slider_page_wrapper">
        
        
        <?php   // Order results by post types names
            $args_arrays = array(
                'posts_per_page' => -1, // -1 to display all posts
                'post_type'      =>   'slickslider',  // array('page','post'), post type ka name url sa
                'post_status'    => 'publish',
                'orderby'        => 'post_type',
                'order'          => 'ASC'
            );
                $get_slickslider = get_posts( $args_arrays );
            // echo "<pre>"; print_r($get_slickslider); echo "</pre>";

            // https://developer.wordpress.org/reference/functions/get_posts/
            // Latest posts ordered by title
            // wp loop

            if($get_slickslider)    {
                echo "<div class=\"custom_slider\">";
                foreach ($get_slickslider as $post) :
                    setup_postdata($post);
                    ?>
                    <?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); ?>
                <div class="post_wrapper flex" style="background-image: url('<?php echo $featured_img_url;  ?>')">
 
                    <div class="container flex hero-container">
                        <div class="left-hero-section">
                            <h2><a href="<?php the_permalink(); ?>" class="hero-title"><?php the_title() ?></a></h2>
                            <div class="hero-description"><?php the_excerpt();  ?></div>
                        </div>

                        <div class="right-hero-section flex">
                            <div class="popup-wraper flex" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/video-thumbnail-img.png');" >                                
                            <a href="<?php $youtube_video = get_option('field_4'); echo esc_attr($youtube_video);  ?>" class="flex" data-fancybox="gallery">
                                    <img src="<?= get_template_directory_uri(); ?>/assets/images/play-icon.png" alt="img">
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
                <?php
                endforeach;
                wp_reset_postdata();
                echo "</div>";
            }
        ?>
            <!-- <h1>Show all Posts</h1>
            <div class="custom_slider_3">

                <div style="background-color: red;">slider 1</div>
                <div>slider 2</div>
                <div style="background-color: red;">slider 3</div>
                <div>slider 4</div>
                <div style="background-color: red;">slider 5</div>
                <div>slider 6</div>
                <div style="background-color: red;">slider 7</div>
                <div>slider 8</div>
                <div style="background-color: red;">slider 9</div>
                <div>slider 10</div>

            </div> -->
        </div>

    </div>




<script>
    jQuery(document).ready(function($){
        $('.custom_slider').slick({
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            adaptiveHeight: true
            });
        });
    jQuery(document).ready(function($){
        $('.custom_slider_3').slick({
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 3,
            adaptiveHeight: true
            });
        });
</script>

