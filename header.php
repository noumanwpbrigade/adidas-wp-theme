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
<header style="position: fixed;">
    <!-- Notification Bar -->
    <?php 
    $value = get_option('field_1');
    if($value) { ?>
    <div class="notification-bar" id="notiBar">
        <div class="container">
            <?php echo esc_attr($value);  ?>
            <a href="<?php $url = get_option('field_2'); echo esc_attr($url);  ?>" class="green-a"> <?php $urltext = get_option('field_3'); echo esc_attr($urltext);  ?> </a>
            <div id="cross-btn" onclick="closenoti();"><img src="<?= get_template_directory_uri(); ?>/assets/images/x-mark.png" alt=""></div>
        </div>
    </div>
    <?php } ?>

    <!-- Logo Bar  -->

    <div class="top-nav">
        <div class="container flex">

                <div class="top-nav-logo flex">
                <?php 
                $custom_logo_id = get_theme_mod('custom_logo');
                $logo = wp_get_attachment_image_src($custom_logo_id, 'full');

                if(has_custom_logo()){
                    // the_custom_logo();
                    echo '<a href="' . esc_url(home_url('/')) . '" rel="home"><img src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '"></a>';

                } else {
                            ?>
                            <a href="<?php echo esc_url(home_url('/')); ?>">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="logo">
                            </a>
                <?php } ?>
                
                <div id="burger">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/burger-icon.png" alt="">
                </div>

                </div>
                
                <div class="s-menu">
                <?php
                    wp_nav_menu(array(
                        'theme_location' => 'secondar'
                    ));
                ?>
                </div>
    
        </div>
    </div>

    <nav id="nav-menu">
        <div class="container flex">
        
        <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
            ));
        ?>
        <form action="" method="post" class="nav-form">
            <input type="text" name="search-input" id="searchInput" onkeyup="fetchResults()" placeholder="SEARCH" class="search-input">
            <button type="submit" class="nav-btn"><img src="<?= get_template_directory_uri(); ?>/assets/images/search-icon.png" alt=""></button>
        </form>
        </div>
    </nav>

    
        
    </header>
