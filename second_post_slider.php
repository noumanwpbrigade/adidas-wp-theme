<?php
/*
* Template Name: POST for SECOND Slider
*/

get_header();
?>
<style>
    a:visited   {
    color: #fff ;
}
</style>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/slick/slick/slick.css"/>
<!-- // Add the new slick-theme.css if you want the default styling -->
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/slick/slick/slick-theme.css"/>


<?php   // Order results by post types names
            $args = array(
                'posts_per_page' => -1, // -1 to display all posts
                'post_type'      =>   'postforsecondslider',  // array('page','post'), post type ka name url sa
                'post_status'    => 'publish',
                'orderby'        => 'post_type',
                'order'          => 'ASC'
            );
                $postforsecondslider = get_posts( $args );
            // echo "<pre>"; print_r($postforsecondslider); echo "</pre>";

            // https://developer.wordpress.org/reference/functions/get_posts/
            // Latest posts ordered by title
            // wp loop

            if($postforsecondslider)    {
                echo "<div class=\"custom_slider_2\">";
                foreach ($postforsecondslider as $post_slider) :
                    setup_postdata($post_slider);

?>

            <div class="slider-post-wraper">
                <div class="post-thumbnail" style="color: #fff;">
                <img src="<?php echo get_the_post_thumbnail_url($post_slider->ID, 'full'); ?>" alt="img">
                </div>
                <div class="post-title" style="color: #fff;"> 
                    <h4>
                    <a href="<?php echo get_permalink($post_slider->ID); ?>" class="a-post-title"> <?php echo get_the_title($post_slider->ID); ?> </a>
                    </h4>
                </div>
            </div>










<?php
                endforeach;
                wp_reset_postdata();
                echo "</div>";
                echo "<hr />";
            }
        ?>

<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/slick/slick/slick.min.js"></script>
<script>
    jQuery(document).ready(function($){
        $('.custom_slider_2').slick({
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 4,
            adaptiveHeight: true
            });
        });
</script>