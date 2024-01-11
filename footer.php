<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package abdullah
 */

?>

	<footer id="colophon" class="site-footer">
        
		<div class="container flex">
            <div class="footer-menu">

                <?php 
                    if(is_active_sidebar('footer-menu-widget')){
                        dynamic_sidebar('footer-menu-widget');
                    }
                    else {
                        echo "<h4>Site Map</h4>";
                    }
                ?>
                
            </div>

            <div class="footer-links-widget"> 
                <h4>Important Links</h4>
                <iframe src="<?php echo esc_url($facebook_iframe_src); ?>" width="340" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>

                <?php 
                if (is_active_sidebar('footer-links')) {
                    dynamic_sidebar('footer-links');
                }
                ?>
            </div>


            <div class="footer-logo-section">

            <?php   // call the footer text widget
                if(is_active_sidebar('footer-text')){
                    dynamic_sidebar('footer-text');
                }   // if user does not design the footer text widget then display this on footer right.
                else {
                    if(has_custom_logo()){
                    the_custom_logo();
                    } else { ?>
                        <div class="flex" style="flex-direction: column; align-item: center;">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="logo"> <br>
                    <?php } ?>
                    
                       
                            <div>
                                <span>Copyrights © <?php echo date("Y");  ?>. All rights reserved. </span> <br>
                                <span> <a href="#" style="text-decoration: none;">Terms</a>  & <a href="#" style="text-decoration: none;">Conditions</a>  |  
                                       <a href="#" style="text-decoration: none;">Privacy</a> <a href="#" style="text-decoration: none;">Policy</a></span>  <br>
                                <span>Designed by: WPBrigade</span>
                            </div>
                       </div>
            <?php  } ?>

            </div>
        </div>
	</footer><!-- #colophon -->


<?php wp_footer(); ?>

</body>
</html>



