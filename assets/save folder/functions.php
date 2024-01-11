<?php
// Menu Register 
register_nav_menus( array(
    'primary'   => __( 'Primary Menu', 'adidas' ),
) );

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

    wp_enqueue_script('script-file', get_template_directory_uri().'/assets/js/script.js', array(), 1.0, true);
	// FancyBox
    wp_enqueue_script('script-file', get_template_directory_uri().'/assets/js/script.js', array('jQuery'), 1.0, true);
    wp_enqueue_script('script-file', get_template_directory_uri().'/assets/js/script.js', array('jQuery'), 1.0, true);
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
}
add_action( 'widgets_init', 'adidas_widgets_init' );

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

register_sidebar(
	array(
		'name' => 'sidebar location',
		'id' => 'sidebar'
	)
);

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


	// adding themem options page -------------------------------------------------------------------------------------------------------------
	// first  create menu page
	add_action('admin_menu', 'themeoptions');

	function themeoptions() {
		add_menu_page(
			'theme-options',         // this shows at the end of the URL
			'Theme Options Page',    // this name shows in the left menu bar
			'manage_options',        // use a valid capability here, e.g., 'manage_options'
			'theme-options',         // slug
			'themecustom_options',   // callback function
			'dashicons-admin-generic' // icon from https://developer.wordpress.org/resource/dashicons/#admin-generic 
		);
	}

function themecustom_options() {
    // link our custom setting ?>
	<h1> Theme Option Panel </h1>
	<form action="options.php" method="post">
		<?php
			 settings_fields("section");		// id or section
			 do_settings_sections("theme-options");	// page or slug
			 submit_button();
		?>
	</form>

<?php }

// theme options settings page
function theme_options_setting(){
     
	// Step#1 this code basically provides an area where you can register your fields
	add_settings_section(
		"section", // id of settings section
	 "For All page", // title
	 null, // callback function
	 "theme-options" // page 
	);
	
	// Step#2
	add_settings_field(
	"channel_name",
	"Notification C Name",
	"display_channel_name",
	"theme-options",
	"section"
	);
	
	add_settings_field(
	"facebook_url",
	"YouTube fb URL",
	"display_fb_url",
	"theme-options",
	"section"
	);
	
	 add_settings_field(
	"twitter_url",
	"Twitter URL",
	"display_twitter_url",
	"theme-options",
	"section"
	);
	
	// step #3 We need to add this(channel_name) setting to area
	
	register_setting("section","channel_name");
	register_setting("section","facebook_url");
	register_setting("section","twitter_url");
	
  }
  
  add_action("admin_init","theme_options_setting");
  
  function display_twitter_url(){
	// twitter input box for admin
	?>
	<input type="text" name="twitterurl" id="twitterurl" value="">

	<?php }
  
  function display_channel_name(){
	 // channel input box for admin
	 ?>
	 <input type="text" name="name" id="name" value="">

	 <?php }
  
  function display_fb_url(){
	// facebook url input box for admin
	?>
	<input type="text" name="fburl" id="fburl" value="">

	<?php }

	



// which data getting form theme options page
// notification text/url/url text
// youtube video link
// footer desclaimer

// * manage the tabs content


//	===== second slider =====
