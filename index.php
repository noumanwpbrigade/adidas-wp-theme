<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package adidas
 */


get_header();
?>


<?php
/* including template */

// get_template_part('template-parts/home', 'featured');

// two parameters hai, pahla 'slug/before - ', 'file name after -'.

?>

<main id="main">
<div id="hero">
        <?php include 'slick_slider_template.php' ?>
</div>

<!-- <div class="container">
        <?php // dynamic_sidebar('sidebar');  ?>       
</div> -->

<div class="main">

        <div class="container flex">
                <div class="else-sildebar">
                        <?php  include 'homepage.php'; ?>                      
                </div>

                <div class="sidebar">
                        <?php get_sidebar(); ?>
                </div>
                
        </div>

        <!-- Tab info section -->

        <?php include 'tabinfo.php'; ?>

        <!-- spacer -->
        <div class="spacer" style="width: 100%; height: 40px;"></div>
      

</div>
</main>

<?php
// include 'footer.php';
get_footer();
