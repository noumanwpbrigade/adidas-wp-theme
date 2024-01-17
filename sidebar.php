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
<?php    include 'allevents.php'; ?>

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
                        <span class="color-white cat-li-a">
                            <img id="category-arrow" src="<?php echo get_template_directory_uri(); ?>/assets/images/cat-arrow.png" alt="img">
                            <?php echo $catvalue->name; ?>
                        </span>
                        <?php
                        // Get subcategories
                        $subcat_args = array(
                            'parent' => $catvalue->term_id,
                            'hide_empty' => false, // Display even if empty
                        );
                        $subcategories = get_categories($subcat_args);

                        // Display subcategories
                        if ($subcategories) {
                            echo '<div class="sub-categories">'; // pahly <ul> tha <div> ma change krny sa display huwa hai
                            foreach ($subcategories as $subcat) {
                                echo '<span>';  // ya b li tha span ma change kiya ha
                                echo '<a href="' . get_category_link($subcat->term_id) . '">' . $subcat->name . '</a>';
                                echo '</span>';
                                echo '<br />';
                            }
                            echo '</div>'; 
                        }
                        ?>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>



<!-- ============================================================================   -->

<!-- Weather -->

<?php   ?>
<div class="weather">
<div class="wraper">
        <div class="title">Weather</div>
        <!-- https://dash.elfsight.com/apps/weather -->
        <script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
        <div class="elfsight-app-99931dd2-472b-4dec-938c-69fff474b118 weather-widget" data-elfsight-app-lazy></div>
        </div>
</div>

<!--  -->


    <!-- Date & Time -->
<?php   ?>
<div class="date-and-time">
<div class="wraper">
        <div class="title">Date & Time</div>
        <div class="current-date-and-time">
            <?php
                // Get the current date and time
                $current_date = current_time('l, j F, Y');
                $current_time = current_time('g:i:s');
                // $current_time = current_time('mysql');

                echo "<span class='current-date'>";
                echo $current_date;
                echo "</span>";
                echo "<br />";

                echo "<span class='current-time'>";
                echo $current_time;
                echo "</span>";

            ?>
        </div>
    </div>


<!-- Newsletter -->
<?php   ?>
<div class="newsletter">
<div class="wraper">
        <div class="title">Newsletter</div>
        <form action="" class="gravity-form">
            <div class="gravity-form-group">
                <input type="email" placeholder="Enter Email">
                <img src="<?= get_template_directory_uri();  ?>/assets/images/search-icon.png" alt="img">
            </div>
            <input type="submit" class="btn-gravity-submit" value="Submit">
        </form>
    </div>
</div>

</div>




<!-- <script>
    let category = document.getElementsByClassName('cat-li-a')[0];  // [0] to get the first element
    let sub_category = document.getElementsByClassName('sub-categories')[0];  // [0] to get the first element

    category.addEventListener('click', function(){
        if(sub_category.style.display === 'none' || sub_category.style.display === ''){
            sub_category.style.display = 'block';
        } else {
            sub_category.style.display = 'none';
        }
    });
</script> -->


<script>
    let categories = document.getElementsByClassName('cat-li-a');
    let sub_categories = document.getElementsByClassName('sub-categories');

    for (let i = 0; i < categories.length; i++) {
        categories[i].addEventListener('click', function(){
            let sub_category = sub_categories[i];

            if(sub_category.style.display === 'none' || sub_category.style.display === ''){
                sub_category.style.display = 'block';
            } else {
                sub_category.style.display = 'none';
            }
        });
    }
</script>



<?php



?>