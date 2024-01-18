<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package adidas
 */

get_header();
?>

	<main id="primary" class="site-main" style="padding-top: 178px">
	<div class="container" id="container-404">

	<h3 class="color-black heading-404">Sorry we could not find that page.</h3>

	<p class="color-black p-404">Search again or 
		<a href="<?php echo esc_url(home_url('/')); ?>" class="link-404">Go back to home page</a>
	</p>
	
	<div class="image-404">
		<img src="<?php echo get_template_directory_uri() ;?>/assets/images/image404.png" alt="">
	</div>
	<span class="error-404 color-black">
		ERROR: 404
	</span>
	</div>

	</main><!-- #main -->

<?php
get_footer();
