<?php
// Menu Register 
register_nav_menus( array(
    'primary'   => __( 'Primary Menu', 'adidas' ),
) );

// Secondary menu
register_nav_menus(array(
    'secondar' => __('secondary menu (Logo Bar)', 'adidas'),
));


// custom / default logo support 
add_theme_support( 'custom-logo' );


// enqueue stylesheet and script code

function adidas_theme_scripts() {
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('main', get_template_directory_uri().'/assets/css/main.css', array());
	//	Fancybox and Jquery CDN
    // <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
    // <link rel="stylesheet" href="./plugins/jquery.fancybox.min.css">
	wp_enqueue_style('fancy-box', get_template_directory_uri().'assets/plugins/jquery.fancybox.min.css', array('jQuery'));
	wp_enqueue_script('jQuery', 'https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js');
	
    // <script src="./plugins/jquery.fancybox.min.js"></script>
    // <script src="./plugins/fancyBox.js"></script>

    wp_enqueue_script('script-file', get_template_directory_uri().'/assets/js/script.js', array('jQuery'), 1.0, true);
	// FancyBox
    wp_enqueue_script('fancy-jquery', 'https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js', 1.0);
    wp_enqueue_style('fancy-stylesheet', 'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css', 1.0);
    wp_enqueue_script('fancy-js', 'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js', array('fancy-jquery'), '3.5.7', true);
}

add_action('wp_enqueue_scripts', 'adidas_theme_scripts');

// for custome slider

function custom_slider() {
	register_post_type('sliders', array(
		'labels' => array(
			'name' => __('Sliders' ),
			'singular_name' => __('sliders')
		),
		'public' => true,
		'has_archive' => true,
		'rewrite' => array('slug' => 'sliders'),
		'show_in_rest' => true,
		'supports' => array('title', 'editor', 'author', 'thumbnail', 'comments', 'revisions', 'taxonomices' => array('category'))
	));
}

add_action('init', 'custom_slider');



/**
 * adidas functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package adidas
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function adidas_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on adidas, use a find and replace
		* to change 'adidas' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'adidas', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'adidas' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'adidas_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'adidas_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function adidas_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'adidas_content_width', 640 );
}
add_action( 'after_setup_theme', 'adidas_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function adidas_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'adidas' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	// Lates Tweets
	// <iframe width="560" height="315" src=" " frameborder="0" allowfullscreen></iframe>

		register_sidebar( array(
			"name" => __('Lates Tweets (Embed your Twitter here)', 'adidas'),
			"id" => 'lates-tweets',
			"description" => 'Add the Twitter widget code here',
			"before_widget" => '<div class="tweet-widget-wrapper">',
			'after_widget' => '</div>',
			'before_title' => '',
			'after_title' => ''
		));
		
	// Facebook Page
		register_sidebar( array(
			"name" => __('Facebook Page (Embed your Facebook) ', 'adidas'),
			"id" => 'fb-page',
			"description" => 'add facebook page link',
			"before_widget" => '',
			'after_widget' => '',
			'before_title' => '',
			'after_title' => ''

		));
		// footer menu widgets
			register_sidebar( array(
				"name" => __('Footer Menu Widget', 'adidas'),
				"id" => 'footer-menu-widget',
				"description" => 'Footer Menu Widgets',
				"before_widget" => '',
				'after_widget' => '',
				'before_title' => '',
				'after_title' => ''

			));

	// footer links widgets
	register_sidebar( array(
		"name" => __('Footer Links', 'adidas'),
		"id" => 'footer-links',
		"description" => 'Footer Widgets to add links',
		"before_widget" => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => ''

	));
	// footer text widgets
	register_sidebar( array(
		"name" => __('Footer logo & text area', 'adidas'),
		"id" => 'footer-text',
		"description" => 'Footer Widgets to add links',
		"before_widget" => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => ''

	));
}
add_action( 'widgets_init', 'adidas_widgets_init' );

function modify_facebook_page_widget_output($content) {
    // Check if the widget content contains an iframe tag
    if (strpos($content, '<iframe') !== false) {
        // Remove any <p> tags around the iframe
        $content = preg_replace('/<p>(\s*)<iframe/', '<iframe', $content);
        $content = preg_replace('/<\/iframe>(\s*)<\/p>/', '</iframe>', $content);
    }

    return $content;
}

add_filter('widget_text', 'modify_facebook_page_widget_output');

/**
 * Enqueue scripts and styles.
 */
function adidas_scripts() {
	wp_enqueue_style( 'adidas-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'adidas-style', 'rtl', 'replace' );

	wp_enqueue_script( 'adidas-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'adidas_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


// `````````````````````````````````````````````````````````````````````````````````````````````````

// Creating a function to create our CPT

  
function custom_post_type() {
  
// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'slick slider', 'Post Type General Name', 'adidas' ),
        'singular_name'       => _x( 'slick slider', 'Post Type Singular Name', 'adidas' ),
        'menu_name'           => __( 'slick slider', 'adidas' ),
        'parent_item_colon'   => __( 'Parent slick slider', 'adidas' ),
        'all_items'           => __( 'All slick slider', 'adidas' ),
        'view_item'           => __( 'View slick slider', 'adidas' ),
        'add_new_item'        => __( 'Add New slick slider', 'adidas' ),
        'add_new'             => __( 'Add slick slider', 'adidas' ),
        'edit_item'           => __( 'Edit slick slider', 'adidas' ),
        'update_item'         => __( 'Update slick slider', 'adidas' ),
        'search_items'        => __( 'Search slick slider', 'adidas' ),
        'not_found'           => __( 'Not Found', 'adidas' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'adidas' ),
    );
      
// Set other options for Custom Post Type
      
    $args = array(
        'label'               => __( 'slick slider', 'adidas' ),
        'description'         => __( 'slick slider news and reviews', 'adidas' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'genres' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest' => true,
  
    );
      
    // Registering your Custom Post Type
    register_post_type( 'slick slider', $args );
  
}
  
add_action( 'init', 'custom_post_type', 0 );

// custome background image div
function custom_theme_settings($wp_customize) {
    // Add a setting for background image
    $wp_customize->add_setting('background_image', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    // Add a control for background image
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'background_image', array(
        'label' => __('Background Image', 'your_theme_textdomain'),
        'section' => 'background_image', // You can specify the section if needed
        'settings' => 'background_image',
    )));
}

add_action('customize_register', 'custom_theme_settings');

// register sidebar widget

// register_sidebar(
// 	array(
// 		'name' => 'sidebar location',
// 		'id' => 'sidebar'
// 	)
// );

// `````````````````````````````````````````````````````````````````````````````````````````````````


//	===== second slider =====
/*
* Creating a function to create our CPT
*/
  
function post_for_second_slider() {
  
	// Set UI labels for Custom Post Type
		$labels = array(
			'name'                => _x( 'post for second slider', 'Post Type General Name', 'twentytwentyone' ),
			'singular_name'       => _x( 'Movpost for second sliderie', 'Post Type Singular Name', 'twentytwentyone' ),
			'menu_name'           => __( 'post for second slider', 'twentytwentyone' ),
			'parent_item_colon'   => __( 'Parent post for second slider', 'twentytwentyone' ),
			'all_items'           => __( 'All post for second slider', 'twentytwentyone' ),
			'view_item'           => __( 'View post for second slider', 'twentytwentyone' ),
			'add_new_item'        => __( 'Add New post for second slider', 'twentytwentyone' ),
			'add_new'             => __( 'Add New', 'twentytwentyone' ),
			'edit_item'           => __( 'Edit post for second slider', 'twentytwentyone' ),
			'update_item'         => __( 'Update post for second slider', 'twentytwentyone' ),
			'search_items'        => __( 'Search post for second slider', 'twentytwentyone' ),
			'not_found'           => __( 'Not Found', 'twentytwentyone' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'twentytwentyone' ),
		);
		  
	// Set other options for Custom Post Type
		  
		$args = array(
			'label'               => __( 'post for second slider', 'twentytwentyone' ),
			'description'         => __( 'post for second slider news and reviews', 'twentytwentyone' ),
			'labels'              => $labels,
			// Features this CPT supports in Post Editor
			'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
			// You can associate this CPT with a taxonomy or custom taxonomy. 
			'taxonomies'          => array( 'genres' ),
			/* A hierarchical CPT is like Pages and can have
			* Parent and child items. A non-hierarchical CPT
			* is like Posts.
			*/
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 5,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
			'show_in_rest' => true,
	  
		);
		  
		// Registering your Custom Post Type
		register_post_type( 'post for second slider', $args);
	  
	}
	  
	/* Hook into the 'init' action so that the function
	* Containing our post type registration is not 
	* unnecessarily executed. 
	*/
	  
	add_action( 'init', 'post_for_second_slider', 0 );
	//	===== second slider =====

	// custome post for events
	// Register Custom Post Type
// Register Custom Post Type
// custom post for events
function event_custom_post_type() {
    $labels = array(
        'name'                  => _x( 'Events', 'Post Type General Name', 'event' ),
        'singular_name'         => _x( 'Event', 'Post Type Singular Name', 'event' ),
        'menu_name'             => __( 'Add Event', 'event' ),
        'name_admin_bar'        => __( 'Add Event', 'event' ),
        'archives'              => __( 'Item Archives', 'event' ),
        'attributes'            => __( 'Item Attributes', 'event' ),
        'parent_item_colon'     => __( 'Parent Item:', 'event' ),
        'all_items'             => __( 'All Events', 'event' ),
        'add_new_item'          => __( 'Add New Event', 'event' ),
        'add_new'               => __( 'Add New Event', 'event' ),
        'new_item'              => __( 'New Item', 'event' ),
        'edit_item'             => __( 'Edit Item', 'event' ),
        'update_item'           => __( 'Update Item', 'event' ),
        'view_item'             => __( 'View Item', 'event' ),
        'view_items'            => __( 'View Items', 'event' ),
        'search_items'          => __( 'Search Item', 'event' ),
        'not_found'             => __( 'Not found', 'event' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'event' ),
        'featured_image'        => __( 'Featured Image', 'event' ),
        'set_featured_image'    => __( 'Set featured image', 'event' ),
        'remove_featured_image' => __( 'Remove featured image', 'event' ),
        'use_featured_image'    => __( 'Use as featured image', 'event' ),
        'insert_into_item'      => __( 'Insert into item', 'event' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'event' ),
        'items_list'            => __( 'Items list', 'event' ),
        'items_list_navigation' => __( 'Items list navigation', 'event' ),
        'filter_items_list'     => __( 'Filter items list', 'event' ),
    );

    $rewrite = array(
        'slug'                  => 'event',
        'with_front'            => true,
        'pages'                 => true,
        'feeds'                 => true,
    );

    $args = array(
        'label'                 => __( 'Event', 'event' ),
        'description'           => __( 'Event custom post type with advanced options', 'event' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'revisions', 'custom-fields', 'page-attributes', 'post-formats' ),
        'taxonomies'            => array( 'category', 'post_tag' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-nametag',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => 'events',
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'rewrite'               => $rewrite,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
    );

    register_post_type( 'event_post', $args );
}
add_action( 'init', 'event_custom_post_type', 0 );

// meta boxes of events custom post type
class WP_Skills_MetaBox_Events {
    private $screen = array(
        'event_post',
    );

    private $meta_fields = array(
        array(
            'label'   => 'Year of Publish',
            'id'      => 'event_date',
            'type'    => 'date',
            'default' => '',
        ),
        array(
            'label'   => 'Starting Time',
            'id'      => 'event_s_time',
            'type'    => 'text',
            'default' => '',
        ),
        array(
            'label'   => 'Ending Time',
            'id'      => 'event_e_time',
            'type'    => 'text',
            'default' => '',
        )
    );

    public function __construct() {
        add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
        add_action( 'admin_footer', array( $this, 'media_fields' ) );
        add_action( 'save_post', array( $this, 'save_fields' ) );
    }

    public function add_meta_boxes() {
        foreach ( $this->screen as $single_screen ) {
            add_meta_box(
                'Events',
                __( 'Events', 'event' ),
                array( $this, 'meta_box_callback' ),
                $single_screen,
                'normal',
                'default'
            );
        }
    }

    public function meta_box_callback( $post ) {
        wp_nonce_field( 'Events_data', 'Events_nonce' );
        echo '';
        $this->field_generator( $post );
    }

    public function media_fields() { ?>
        <script>
            jQuery(document).ready(function($) {
                if (typeof wp.media !== 'undefined') {
                    var _custom_media = true,
                        _orig_send_attachment = wp.media.editor.send.attachment;
                    $('.new-media').click(function(e) {
                        var send_attachment_bkp = wp.media.editor.send.attachment;
                        var button = $(this);
                        var id = button.attr('id').replace('_button', '');
                        _custom_media = true;
                        wp.media.editor.send.attachment = function(props, attachment) {
                            if (_custom_media) {
                                if ($('input#' + id).data('return') == 'url') {
                                    $('input#' + id).val(attachment.url);
                                } else {
                                    $('input#' + id).val(attachment.id);
                                }
                                $('div#preview' + id).css('background-image', 'url(' + attachment.url + ')');
                            } else {
                                return _orig_send_attachment.apply(this, [props, attachment]);
                            };
                        }
                        wp.media.editor.open(button);
                        return false;
                    });
                    $('.add_media').on('click', function() {
                        _custom_media = false;
                    });
                    $('.remove-media').on('click', function() {
                        var parent = $(this).parents('td');
                        parent.find('input[type="text"]').val('');
                        parent.find('div').css('background-image', 'url()');
                    });
                }
            });
        </script>
    <?php 
    }

    public function field_generator( $post ) {
        $output = '';
        foreach ( $this->meta_fields as $meta_field ) {
            $label = '<label for="' . $meta_field['id'] . '">' . $meta_field['label'] . '</label>';
            $meta_value = get_post_meta( $post->ID, $meta_field['id'], true );
            if ( empty( $meta_value ) ) {
                if ( isset( $meta_field['default'] ) ) {
                    $meta_value = $meta_field['default'];
                }
            }
            switch ( $meta_field['type'] ) {
                case 'text':
                case 'date':
                    $input = sprintf(
                        '<input %s id="%s" name="%s" type="%s" value="%s">',
                        $meta_field['type'] !== 'color' ? 'style="width: 100%"' : '',
                        $meta_field['id'],
                        $meta_field['id'],
                        $meta_field['type'],
                        $meta_value
                    );
                    break;
                default:
                    $input = '';
            }
            $output .= $this->format_rows( $label, $input );
        }
        echo '<table class="form-table"><tbody>' . $output . '</tbody></table>';
    }

    public function format_rows( $label, $input ) {
        return '<tr><th>' . $label . '</th><td>' . $input . '</td></tr>';
    }

    public function save_fields( $post_id ) {
        if ( ! isset( $_POST['Events_nonce'] ) ) {
            return $post_id;
        }
        $nonce = $_POST['Events_nonce'];
        if ( ! wp_verify_nonce( $nonce, 'Events_data' ) ) {
            return $post_id;
        }
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return $post_id;
        }
        foreach ( $this->meta_fields as $meta_field ) {
            if ( isset( $_POST[ $meta_field['id'] ] ) ) {
                switch ( $meta_field['type'] ) {
                    case 'text':
                        $_POST[ $meta_field['id'] ] = sanitize_text_field( $_POST[ $meta_field['id'] ] );
                        break;
                    case 'date':
                        $_POST[ $meta_field['id'] ] = sanitize_text_field( $_POST[ $meta_field['id'] ] );
                        break;
                }
                update_post_meta( $post_id, $meta_field['id'], $_POST[ $meta_field['id'] ] );
            } else if ( $meta_field['type'] === 'checkbox' ) {
                update_post_meta( $post_id, $meta_field['id'], '0' );
            }
        }
    }
}

if ( class_exists( 'WP_Skills_MetaBox_Events' ) ) {
    new WP_Skills_MetaBox_Events;
}




	// adding themem options page -------------------------------------------------------------------------------------------------------------
	// functions.php
    // code for custom menu admin page
    /**
 * Register a custom menu page.
 */

 // setp 1. theme_setting_page() > add_menu_page() > there callback function theme_options_cllback()
 // setp 2. Register settings :
 // step 3. Add field
        function theme_setting_page() {
            add_menu_page(
                __( 'Custom Menu Title', 'textdomain' ),
                'Theme Options', // name display in admin menu
                'manage_options', // who added
                'theme-setting', // slug
                'theme_options_cllback', // callback
                'dashicons-admin-site-alt2', // dashicons from https://developer.wordpress.org/resource/dashicons/#admin-site-alt2
                6
            );
        }
        add_action( 'admin_menu', 'theme_setting_page' );

        function theme_options_cllback() {
            // echo "hello wordpress developer";
            // novalidate="novalidate" :it is used to disable the browser's built-in form validation.
            ?>
            <div class="container">
                <h1>Theme Options Page</h1>
                <h3>Add settings for different options</h3>
                <form action="options.php" method="post" novalidate="novalidate">
                    <?php settings_fields('theme-setting'); // slug of parent function ?>
                    <?php do_settings_fields('theme-setting', 'default'); ?>


                    <?php submit_button();   ?>
                </form>
            </div>
            <?php }

             // setp 2. Register settings
                // notification 
             function theme_register_settings() {
                $args = array(
                        'type'              => 'string',
                        'sanitize_callback' => 'sanitize_text_field',  // default wp function
                        'default'           => NULL,
                );
                // 3 parameters: 1:option-grup > do_settings_fields('theme-setting', 'default') / 2: field name/ 3: argument
                register_setting('theme-setting', 'field_1', $args );

                 // step 3. Add field
                 add_settings_field(    // 4 compulsory option/parameter (id, title, callback, slug/page) and other kips default
                    'field_1',     // $field > id from 
                    esc_html__('Notification text', 'default'),  // title
                    'wp_settings_cllback', // callback
                    'theme-setting' // slug / from settings_fields('theme-setting')
                    
                 );

                 // notification link
                 $argslink = array(
                            'type'              => 'string',
                            'sanitize_callback' => 'sanitize_text_field',  // default wp function
                            'default'           => NULL,
                    );
                    // 3 parameters: 1:option-grup > do_settings_fields('theme-setting', 'default') / 2: field name/ 3: argument
                    register_setting('theme-setting', 'field_2', $argslink );

                    // step 3. Add field
                    add_settings_field(    // 4 compulsory option/parameter (id, title, callback, slug/page) and other kips default
                        'field_2',     // $field > id from 
                        esc_html__('Put Link for Notification', 'default'),  // title
                        'wp_noti_url_cllback', // callback
                        'theme-setting' // slug / from settings_fields('theme-setting')
                    );
                // link/url text
                $args = array(
                    'type'              => 'string',
                    'sanitize_callback' => 'sanitize_text_field',  // default wp function
                    'default'           => NULL,
                    );
                    // 3 parameters: 1:option-grup > do_settings_fields('theme-setting', 'default') / 2: field name/ 3: argument
                    register_setting('theme-setting', 'field_3', $args );

                    // step 3. Add field
                    add_settings_field(    // 4 compulsory option/parameter (id, title, callback, slug/page) and other kips default
                        'field_3',     // $field > id from 
                        esc_html__('Text for your above Link', 'default'),  // title
                        'wp_noti_url_text_cllback', // callback
                        'theme-setting' // slug / from settings_fields('theme-setting')
                    );


                    // Youtube Video Link For popup
                $args = array(
                    'type'              => 'string',
                    'sanitize_callback' => 'sanitize_text_field',  // default wp function
                    'default'           => NULL,
                    );
                    // 3 parameters: 1:option-grup > do_settings_fields('theme-setting', 'default') / 2: field name/ 3: argument
                    register_setting('theme-setting', 'field_4', $args );

                    // step 3. Add field
                    add_settings_field(    // 4 compulsory option/parameter (id, title, callback, slug/page) and other kips default
                        'field_4',     // $field > id from 
                        esc_html__('Youtube Video Link For popup', 'default'),  // title
                        'wp_yt_url_cllback', // callback
                        'theme-setting' // slug / from settings_fields('theme-setting')
                    );

                    // Footer Disclaimer 

                    $args = array(
                        'type'              => 'string',
                        'sanitize_callback' => 'sanitize_text_field',  // default wp function
                         'default'           => NULL,
                        );
                        // 3 parameters: 1:option-grup > do_settings_fields('theme-setting', 'default') / 2: field name/ 3: argument
                        register_setting('theme-setting', 'field_5', $args );
    
                        // step 3. Add field
                        add_settings_field(    // 4 compulsory option/parameter (id, title, callback, slug/page) and other kips default
                            'field_5',     // $field > id from 
                            esc_html__('Footer Disclaimer Notification', 'default'),  // title
                            'wp_footer_disclaimer_callback', // callback
                            'theme-setting' // slug / from settings_fields('theme-setting')
                        );

                        // Tab 1 heading 
                        $args = array(
                            'type'              => 'string',
                            'sanitize_callback' => 'sanitize_text_field',  // default wp function
                             'default'           => NULL,
                            );
                            register_setting('theme-setting', 'field_6', $args );
        
                            // step 3. Add field
                            add_settings_field(    
                                'field_6',     // $field > id from 
                                esc_html__('First Tab Heading', 'default'),  // title
                                'wp_tab1_callback', // callback
                                'theme-setting' 
                            );
                        // Tab 2 heading 
                        $args = array(
                            'type'              => 'string',
                            'sanitize_callback' => 'sanitize_text_field',  // default wp function
                             'default'           => NULL,
                            );
                            register_setting('theme-setting', 'field_7', $args );
        
                            // step 3. Add field
                            add_settings_field(    
                                'field_7',     
                                esc_html__('Second Tab Heading', 'default'),  // title
                                'wp_tab2_callback', // callback
                                'theme-setting'
                            );
                        // Tab 3 heading 
                        $args = array(
                            'type'              => 'string',
                            'sanitize_callback' => 'sanitize_text_field',  // default wp function
                             'default'           => NULL,
                            );
                            register_setting('theme-setting', 'field_8', $args );
        
                            // step 3. Add field
                            add_settings_field(
                                'field_8',     // $field > id from 
                                esc_html__('Third Tab Heading', 'default'),  // title
                                'wp_tab3_callback', 
                                'theme-setting' 
                            );

                         // first tab content 
                         $args = array(
                            'type'              => 'string',
                            'sanitize_callback' => 'sanitize_text_field',  // default wp function
                             'default'           => NULL,
                            );
                            register_setting('theme-setting', 'field_9', $args );
        
                            // step 3. Add field
                            add_settings_field(
                                'field_9',     // $field > id from 
                                esc_html__('First Tab Content', 'default'),  // title
                                'wp_tab1_content_callback', 
                                'theme-setting' 
                            );

                             // Second tab content 
                         $args = array(
                            'type'              => 'string',
                            'sanitize_callback' => 'sanitize_text_field',  // default wp function
                             'default'           => NULL,
                            );
                            register_setting('theme-setting', 'field_10', $args );
        
                            // step 3. Add field
                            add_settings_field(
                                'field_10',     // $field > id from 
                                esc_html__('Second Tab Content', 'default'),  // title
                                'wp_tab2_content_callback', 
                                'theme-setting' 
                            );

                             // Third tab content 
                         $args = array(
                            'type'              => 'string',
                            'sanitize_callback' => 'sanitize_text_field',  // default wp function
                             'default'           => NULL,
                            );
                            register_setting('theme-setting', 'field_11', $args );
        
                            // step 3. Add field
                            add_settings_field(
                                'field_11',     // $field > id from 
                                esc_html__('Third Tab Content', 'default'),  // title
                                'wp_tab3_content_callback', 
                                'theme-setting' 
                            );


             } 

             add_action('admin_init', 'theme_register_settings'); // now setting is registered. Q: who to display on page
?>
        <!-- <style>
            .w-50 {
                width: 50%;
            }
        </style> -->
<?php
             function wp_settings_cllback() {
                // getting data from db register_setting('', '', $);
                $value = get_option('field_1');
                echo "<span class='spacer' style='margin: 0 55px; '></span>";
                echo "<textarea class='w-50' name='field_1' style='width: 50%;'>" . esc_textarea($value) . "</textarea>";
                echo "<br />";
                echo "<br />";

                // this setting are stored into db 
             }

             function wp_noti_url_cllback() {
                $url = get_option('field_2');
                echo "<span class='spacer' style='margin: 0 35px; '></span>";
                echo "<input class='w-50' type='text' name='field_2' value='" . esc_attr($url) . "'  style='width: 50%;'> ";
                echo "<br />";
                echo "<br />";
             }

             function wp_noti_url_text_cllback() {
                $url_text = get_option('field_3');
                echo "<span class='spacer' style='margin: 0 35px; '></span>";
                echo "<input class='w-50' type='text' name='field_3' value='" . esc_attr($url_text) . "'  style='width: 50%;'> ";
                echo "<br />";
                echo "<br />";
                echo "<hr />";
                echo "<h3>Popup Video</h3>";
             }

             function wp_yt_url_cllback() {
                $youtube_video = get_option('field_4');
                echo "<span class='spacer' style='margin: 0 17px; '></span>";
                echo "<input class='w-50' type='text' name='field_4' value='" . esc_attr($youtube_video) . "'  style='width: 50%;'> ";
                echo "<br />";
                echo "<br />";
                echo "<hr />";
                echo "<h3>Footer Disclaimer</h3>";
             }

             function wp_footer_disclaimer_callback() {
                $disclaimer = get_option('field_5');
                echo "<span class='spacer' style='margin: 0 20px; '></span>";
                echo "<textarea class='w-50' name='field_5' style='width: 50%;'>" . esc_textarea($disclaimer) . "</textarea>";
                // echo "<input type='text' class='w-50' name='field_5' value = '" .  esc_html($disclaimer) . "'></input>";
                echo "<br />";
                echo "<br />";
                echo "<hr />";
                echo "<h3> Manage Tabs Content </h3>";
            }

             function wp_tab1_callback() {
                $tab1 = get_option('field_6');
                echo "<span class='spacer' style='margin: 0 17px; '></span>";
                echo "<input type='text' class='w-50' name='field_6' value = '" .  esc_html($tab1) . "'></input>";
                echo "<br />";
                echo "<br />";
            }

            function wp_tab2_callback() {
                $tab2 = get_option('field_7');
                echo "<span class='spacer' style='margin: 0 8px; '></span>";
                echo "<input type='text' class='w-50' name='field_7' value = '" .  esc_html($tab2) . "'></input>";
                echo "<br />";
                echo "<br />";
            }

            function wp_tab3_callback() {
                $tab3 = get_option('field_8');
                echo "<span class='spacer' style='margin: 0 15px; '></span>";
                echo "<input type='text' class='w-50' name='field_8' value = '" .  esc_html($tab3) . "'></input>";
                echo "<br />";
                echo "<br />";
            } 

            function wp_tab1_content_callback() {
                $tab1_content = get_option('field_9');
                echo "<span class='spacer' style='margin: 0 20px; '></span>";
                echo "<textarea class='w-50' name='field_9' style='width: 50%;'>" . esc_textarea($tab1_content) . "</textarea>";
                echo "<br />";
                echo "<br />";
            }

            function wp_tab2_content_callback() {
                $tab2_content = get_option('field_10');
                echo "<span class='spacer' style='margin: 0 12px; '></span>";
                echo "<textarea class='w-50' name='field_10' style='width: 50%;'>" . esc_textarea($tab2_content) . "</textarea>";
                echo "<br />";
                echo "<br />";
            }

            function wp_tab3_content_callback() {
                $tab3_content = get_option('field_11');
                echo "<span class='spacer' style='margin: 0 20px; '></span>";
                echo "<textarea class='w-50' name='field_11' style='width: 50%;'>" . esc_textarea($tab3_content) . "</textarea>";
                echo "<br />";
                echo "<br />";
            }




             
// which data getting form theme options page
// notification text/url/url text
// youtube video link
// footer desclaimer

// * manage the tabs content



function load_events_ajax_handler() {
    $args_post = array(
        'posts_per_page' => 3,
        'post_type'      => 'event_post',
        'orderby'        => 'date',
        'order'          => 'ASC',
        'paged'          => $_POST['page'],
    );

    $query_posts = new WP_Query($args_post);

    if ($query_posts->have_posts()) :
        while ($query_posts->have_posts()) : $query_posts->the_post();
            ?>
            <div class="event-wrapper flex">
                <div class="event-thumbnail">
                    <?php if (has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('thumbnail'); ?>
                        </a>
                    <?php endif; ?>
                </div>

                <div class="event-content flex">
                    <div class="event-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </div>
                    <div class="event-dates ">
                        <div class="event-year">
                            <?php echo get_post_meta(get_the_ID(), 'event_date', true); ?>
                        </div>

                        <span class="event-s-time">
                            <?php echo get_post_meta(get_the_ID(), 'event_s_time', true); ?>
                        </span>

                        <span> - </span>

                        <span class="event-e-time">
                            <?php echo get_post_meta(get_the_ID(), 'event_e_time', true); ?>
                        </span>
                    </div>
                </div>
            </div>
            <?php
        endwhile;

        wp_reset_postdata();
    endif;

    die();
}

add_action('wp_ajax_load_events', 'load_events_ajax_handler');
add_action('wp_ajax_nopriv_load_events', 'load_events_ajax_handler');
