<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package adidas
 */

 get_header();
?>
<!-- EVENTS -->
<?php   ?>
<div class="events">
    <div class="wraper">
        <div class="title"> EVENTS </div>
    </div>   
</div>
<!-- Categories --> <!-- ============================================================================   -->
<?php
$cat = get_categories();
?>
<div class="categories">
    <div class="wraper">
        <div class="title">Categories</div> 

        <div class="cat-content flex">
            <ul>
                <?php foreach ($cat as $catvalue) { ?>
                    <li>
                        <a href="<?php echo get_category_link($catvalue->term_id); ?>" class="ccolor-white  cat-li-a">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/cat-arrow.png" alt="img">
                            <?php echo $catvalue->name; ?>
                        </a>
                        <ul>
                        <?php
                        // Get subcategories
                        $subcat_args = array(
                            'parent' => $catvalue->term_id,
                            'hide_empty' => false, // Display even if empty
                        );
                        $subcategories = get_categories($subcat_args);
                        // Display subcategories
                        if ($subcategories) {
                            foreach ($subcategories as $subcat) {
                                
                        ?>

                        </ul>
                        
                        <?php
                        
                            echo '<ul>';
                            
                                echo '<li>';
                                echo '<a href="' . get_category_link($subcat->term_id) . '" class="ccolor-white cat-li-a">';
                                echo $subcat->name;
                                echo '</a>';
                                echo '</li>';
                            }
                            echo '</ul>';
                        }
                        ?>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>
?>

<!-- ============================================================================   -->

<!-- Weather -->

<?php   ?>
<div class="weather">
<div class="wraper">
        <div class="title">Weather</div>

    </div>
</div>

<!-- Date & Time -->
<?php   ?>
<div class="date-and-time">
<div class="wraper">
        <div class="title">Date & Time</div>

    </div>
</div>

<!-- Newsletter -->
<?php   ?>
<div class="newsletter">
<div class="wraper">
        <div class="title">Newsletter</div>

    </div>
</div>

<h3 style="color: #fff;"> I'm Side bar</h3>
<p style="color: #fff;">Lorem, ipsum dolor sit amet consectetur adipisicing elit. At voluptatibus assumenda sed recusandae dolores ratione facilis, sint sequi. Quos similique quas id cum illum, exercitationem magni minima impedit. Vero, quasi!</p>

<?php   get_footer();   ?>