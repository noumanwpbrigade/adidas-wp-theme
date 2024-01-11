<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package adidas
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header>
            <div class="notification-bar" id="notiBar">
                LIVE RACE STREAM FROM GATOR NATIONALS IN SARASOTA, FL/ <a href="#" class="green-a">WATCH NOW</a>
                <div id="cross-btn" onclick="closenoti();"><img src="<?= get_template_directory_uri(); ?>/assets/images/x-mark.png" alt=""></div>
            </div>

            <div class="top-nav">
                <div class="container flex">
                    <div class="top-nav-logo">

                    <?php  if(has_custom_logo()){
                            the_custom_logo();
                            } else {
                                ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="logo">
                    <?php } ?>

                    </div>
                    <div class="top-nav-btns">
                        <a href="#" class="btn btn-primary">membership</a>
                        <a href="" class="btn btn-secondary">account</a>
                    </div>
                </div>
            </div>

            <nav>
               <div class="container flex">
                
                <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                    ));
                ?>
                <form action="" method="post" class="nav-form">
                    <input type="text" name="search-input" placeholder="SEARCH" class="search-input">
                    <button type="submit" class="nav-btn"><img src="<?= get_template_directory_uri(); ?>/assets/images/search-icon.png" alt=""></button>
                </form>
               </div>
            </nav>
        
    </header>
