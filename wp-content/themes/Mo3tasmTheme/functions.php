<?php
if ( ! function_exists( 'Mo3tasmTheme_setup' ) ) :
function Mo3tasmTheme_setup() {
	load_theme_textdomain( 'Mo3tasmTheme' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 9999 );
	register_nav_menus( array(
		'Primary' => __( 'Primary Menu', 'Mo3tasmTheme' ),
		'Social'  => __( 'Social Links Menu', 'Mo3tasmTheme' ),
		'Footer'  => __( 'Footer Links Menu', 'Mo3tasmTheme' ),
	) );
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
     /*
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio',
		'chat',
	) );
     */

	//add_editor_style( array( 'css/editor-style.css', twentysixteen_fonts_url() ) );
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif; // twentysixteen_setup
add_action( 'after_setup_theme', 'Mo3tasmTheme_setup' );
define("TVar","1.0.6");
function load_css() {

	wp_enqueue_style( 'Mo3tasmTheme-bootstrap', get_template_directory_uri().'/css/inc/bootstrap.min.css' , array(), TVar  );
    wp_enqueue_style( 'Mo3tasmTheme-style', get_stylesheet_uri(), array(),TVar  );
	wp_enqueue_style( 'Mo3tasmTheme-style-res', get_template_directory_uri().'/css/style-res.css' , array(),TVar  );
	wp_enqueue_style( 'Mo3tasmTheme_gfonts', 'https://fonts.googleapis.com/css?family=Bentham|PT+Serif:400,700,400italic,700italic' );
	wp_enqueue_style( 'fontawesome', 'https://use.fontawesome.com/releases/v5.0.10/css/all.css' );
}

add_action( 'wp_enqueue_scripts', 'load_css' );
function atg_menu_classes($classes, $item, $args) {
  //if($args->theme_location == 'secondary') {
    $classes[] = 'parent-list';
//  }
  return $classes;
}
add_filter('nav_menu_css_class','atg_menu_classes',1,3);
function add_link_atts($atts) {
  //$atts['class'] = "dropdown-toggle js-activated";
  return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_link_atts');

function Mo3tasmTheme_widgets_init() {
/*
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'Mo3tasmTheme' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'Mo3tasmTheme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
*/
  register_sidebar( array(
		'name'          => __( 'Sidebar', 'Mo3tasmTheme' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'Mo3tasmTheme' ),
		'before_widget' => '<div id="%1$s" class="widgets__widget popularWidget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widgets__widget--head"><i class="flaticon-speech-bubble"></i> <h3>',
		'after_title'   => ' </h3></div>',
	) );

}
add_action( 'widgets_init', 'Mo3tasmTheme_widgets_init' );
require get_template_directory()."/inc/CustomFunction.php";
require get_template_directory()."/inc/popular_post_widget.php";
require get_template_directory()."/inc/about_widget.php";
require get_template_directory()."/inc/WP_Widget_Categories.php";
require get_template_directory()."/inc/WP_Widget_Tag_Cloud.php";
require get_template_directory()."/inc/Main_Nav.php";
//require get_template_directory()."/inc/controller.php";
require get_template_directory()."/inc/Customizer.php";

?>