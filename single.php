<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package adidas
 */

get_header();
?>

<main id="primary" class="site-main" style="padding-top: 170px;"> <!-- inline-css: becasue, header are fixed -->


    <div class="container">
	<div id="datafetch"></div>

        <?php
        while (have_posts()) :
            the_post();
			
        ?>

            <h2 class="single-heading color-black"><?php the_title(); ?></h2>

            <?php if (has_post_thumbnail()) : ?>
                <div class="post-thumbnail">
                    <?php the_post_thumbnail(); ?>
                </div>
            <?php endif; ?>

            <p class="color-black post-date"><?php 
			echo get_the_date(); ?></p>

            <div class="color-black post-content">
                <?php the_content(); ?>
            </div>

        <?php
		the_post_navigation(
			array(
				'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'adidas' ) . '</span> <span class="nav-title">%title</span>',
				'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'adidas' ) . '</span> <span class="nav-title">%title</span>',
			)
		);
        
        ?>

		<button id="single-home-btn" class="btn third flex">
			<a href="<?php echo esc_url(home_url('/')); ?>" class="flex">Go to Home Page
			<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 48 48">
			<linearGradient id="jv689zNUBazMNK6AOyXtga_wFfu6zXx15Yk_gr1" x1="6" x2="42" y1="41" y2="41" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#c8d3de"></stop><stop offset="1" stop-color="#c8d3de"></stop></linearGradient><path fill="url(#jv689zNUBazMNK6AOyXtga_wFfu6zXx15Yk_gr1)" d="M42,39H6v2c0,1.105,0.895,2,2,2h32c1.105,0,2-0.895,2-2V39z"></path><linearGradient id="jv689zNUBazMNK6AOyXtgb_wFfu6zXx15Yk_gr2" x1="14.095" x2="31.385" y1="10.338" y2="43.787" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#fcfcfc"></stop><stop offset=".495" stop-color="#f4f4f4"></stop><stop offset=".946" stop-color="#e8e8e8"></stop><stop offset="1" stop-color="#e8e8e8"></stop></linearGradient><path fill="url(#jv689zNUBazMNK6AOyXtgb_wFfu6zXx15Yk_gr2)" d="M42,39H6V20L24,3l18,17V39z"></path><path fill="#de490d" d="M13,25h10c0.552,0,1,0.448,1,1v17H12V26C12,25.448,12.448,25,13,25z"></path><path d="M24,4c-0.474,0-0.948,0.168-1.326,0.503l-5.359,4.811L6,20v5.39L24,9.428L42,25.39V20L30.685,9.314	l-5.359-4.811C24.948,4.168,24.474,4,24,4z" opacity=".05"></path><path d="M24,3c-0.474,0-0.948,0.167-1.326,0.5l-5.359,4.784L6,18.909v5.359L24,8.397l18,15.871v-5.359	L30.685,8.284L25.326,3.5C24.948,3.167,24.474,3,24,3z" opacity=".07"></path><linearGradient id="jv689zNUBazMNK6AOyXtgc_wFfu6zXx15Yk_gr3" x1="24" x2="24" y1="1.684" y2="23.696" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#d43a02"></stop><stop offset="1" stop-color="#b9360c"></stop></linearGradient><path fill="url(#jv689zNUBazMNK6AOyXtgc_wFfu6zXx15Yk_gr3)" d="M44.495,19.507L25.326,2.503C24.948,2.168,24.474,2,24,2s-0.948,0.168-1.326,0.503	L3.505,19.507c-0.42,0.374-0.449,1.02-0.064,1.43l1.636,1.745c0.369,0.394,0.984,0.424,1.39,0.067L24,7.428L41.533,22.75	c0.405,0.356,1.021,0.327,1.39-0.067l1.636-1.745C44.944,20.527,44.915,19.881,44.495,19.507z"></path><linearGradient id="jv689zNUBazMNK6AOyXtgd_wFfu6zXx15Yk_gr4" x1="28.05" x2="35.614" y1="25.05" y2="32.614" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#33bef0"></stop><stop offset="1" stop-color="#0a85d9"></stop></linearGradient><path fill="url(#jv689zNUBazMNK6AOyXtgd_wFfu6zXx15Yk_gr4)" d="M29,25h6c0.552,0,1,0.448,1,1v6c0,0.552-0.448,1-1,1h-6c-0.552,0-1-0.448-1-1v-6	C28,25.448,28.448,25,29,25z"></path>
			</svg>
			</a>
		</button>

		<?php
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
		endwhile; 
		?>
    </div>

</main><!-- #main -->

<style>
	#datafetch h3 {
		color: black;
	}
</style>

<?php
get_footer();
