<?php
/**
 * TuyenMinh functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package TuyenMinh
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}
/**
 *khai bao gia tri
 * THEME_URL = Lay duong dan thuu muc theme
 * CORE = Lay duong dan thu muc core

 */
 define('THEME_URL', get_stylesheet_directory());
 
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function tuyenminh_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on TuyenMinh, use a find and replace
		* to change 'tuyenminh' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'tuyenminh', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('woocommerce');

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
			'tuyenminh_custom_background_args',
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
add_action( 'after_setup_theme', 'tuyenminh_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function tuyenminh_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'tuyenminh_content_width', 640 );
}
add_action( 'after_setup_theme', 'tuyenminh_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function tuyenminh_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'tuyenminh' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'tuyenminh' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'footer', 'tuyenminh' ),
			'id'            => 'footer',
			'description'   => esc_html__( 'Add widgets here.', 'tuyenminh' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'footer1', 'tuyenminh' ),
			'id'            => 'footer1',
			'description'   => esc_html__( 'Add widgets here.', 'tuyenminh' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'footer2', 'tuyenminh' ),
			'id'            => 'footer2',
			'description'   => esc_html__( 'Add widgets here.', 'tuyenminh' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'footer3', 'tuyenminh' ),
			'id'            => 'footer3',
			'description'   => esc_html__( 'Add widgets here.', 'tuyenminh' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'footer4', 'tuyenminh' ),
			'id'            => 'footer4',
			'description'   => esc_html__( 'Add widgets here.', 'tuyenminh' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'sidebarbot', 'tuyenminh' ),
			'id'            => 'sidebarbot',
			'description'   => esc_html__( 'Add widgets here.', 'tuyenminh' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar( array(
        'name'          => __( 'Horizontal Widget Area', 'text-domain' ),
        'id'            => 'horizontal-widget-area',
        'description'   => __( 'Widget area for horizontal sidebar.', 'text-domain' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
	register_sidebar( array(
        'name'          => __( 'top', 'text-domain' ),
        'id'            => 'top',
        'description'   => __( 'top sidebar.', 'text-domain' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
	register_sidebar( array(
        'name'          => __( 'top1', 'text-domain' ),
        'id'            => 'top1',
        'description'   => __( 'top sidebar.', 'text-domain' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
	register_sidebar( array(
        'name'          => __( 'top2', 'text-domain' ),
        'id'            => 'top2',
        'description'   => __( 'top sidebar.', 'text-domain' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
	register_sidebar( array(
        'name'          => __( 'footer5', 'text-domain' ),
        'id'            => 'footer5',
        'description'   => __( 'top sidebar.', 'text-domain' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
	register_sidebar( array(
        'name'          => __( 'product', 'text-domain' ),
        'id'            => 'product',
        'description'   => __( 'right sidebar.', 'text-domain' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'tuyenminh_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function tuyenminh_scripts() {
	wp_enqueue_style( 'tuyenminh-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'tuyenminh-style', 'rtl', 'replace' );

	wp_enqueue_script( 'tuyenminh-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'tuyenminh_scripts' );

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
/**postyoe add */


/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
// This theme uses wp_nav_menu() in one location.
register_nav_menu('primary-menu', __('primary','tuyenminh'));
//thiet lap menu
if(!function_exists('tuyenminh_menu')){
	function tuyenminh_menu($menu){
			$menu = array(
				'theme_location' => $menu,
				'container' => 'categorybar' ,
				'container_class'=> $menu,
				'item_wrap'=> '<ul id="%1$s" class="%2$s sf-menu">%3$s</ul>'
			);
			wp_nav_menu($menu);
	}
}
// nhung css
function tuyenminh_style(){
	wp_enqueue_style('product_style', get_template_directory_uri() . '/css/product.css');
	wp_enqueue_style('category_style', get_template_directory_uri() . '/css/category.css');
	wp_enqueue_style('menu-style',get_stylesheet_directory_uri()."/css/menu.css");
	wp_enqueue_style('cart-style',get_stylesheet_directory_uri().'/css/cart.css');
	wp_enqueue_style('checkout-style',get_stylesheet_directory_uri().'/css/checkout.css');
	
	wp_enqueue_style('header-style',get_stylesheet_directory_uri().'/css/header.css');

	
	wp_enqueue_style('footer-style',get_stylesheet_directory_uri().'/css/footer.css');
	
	wp_enqueue_style('font-page-style', get_stylesheet_directory_uri()."/css/font-page.css");
	wp_enqueue_style('font-style','https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro&display=swap');
	// <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js" integrity="sha512-eP8DK17a+MOcKHXC5Yrqzd8WI5WKh6F1TIk5QZ/8Lbv+8ssblcz7oGC8ZmQ/ZSAPa7ZmsCU4e/hcovqR8jfJqA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	// <script src=""></script>
	// <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	// wp_register_style('superfish-style', get_stylesheet_directory_uri()."/superfish.css",array(),'all');
	// wp_enqueue_style('superfish-style');

	// wp_register_script('superfish-script',get_stylesheet_directory_uri().'/js/superfish.js',array('jquery') );
	// wp_enqueue_script('superfish-script');
	//wp_enqueue_script('jquery','https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js');
	wp_enqueue_script('slick','https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js',['jquery']);

	wp_register_script('slick-script',get_stylesheet_directory_uri().'/js/slickk.js',array('jquery') );
	wp_enqueue_script('slick-script');
}
add_action( 'wp_enqueue_scripts', 'tuyenminh_style' );
add_filter( 'gutenberg_use_widgets_block_editor', '__return_false', 100 );
add_filter( 'use_widgets_block_editor', '__return_false' );
//CUSTOMER
add_action('customize_register', 'themename_customize_register');
function themename_customize_register($wp_customize){
    
    $wp_customize->add_section('themename_color_scheme', array(
        'title'    => __('Settting footer', 'themename'),
        'description' => '',
        'priority' => 220,
    ));
$wp_customize->add_setting( 'logo_white' );
	 
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'logo_white',
			array(
				'label' => 'Logo white',
				'section' => 'themename_color_scheme',
				'settings' => 'logo_white'
			)
		)
	);	
	$wp_customize->add_setting( 'content_footer' );
	$wp_customize->add_control(
		'content_footer', 
		array(
			'label'    => __( 'Content Footer', 'aptosoft' ),
			'section'  => 'themename_color_scheme',
			'settings' => 'content_footer',
			'type'     => 'textarea',
		)
	);
	$wp_customize->add_setting( 'copyright' );
	$wp_customize->add_control(
		'copyright', 
		array(
			'label'    => __( 'Copyright Footer', 'aptosoft' ),
			'section'  => 'themename_color_scheme',
			'settings' => 'copyright',
			'type'     => 'textarea',
		)
	);}
	// Lấy danh mục sản phẩm từ WooCommerce
function get_product_categories() {
    $args = array(
        'taxonomy'     => 'product_cat', // Taxonomy của danh mục sản phẩm
		'orderby'      => 'name','count',
        'hide_empty'   => false,
		'number' => 8,
    );
    
    $categories = get_terms( $args );

    return $categories;
}
add_filter('get_search_form','filter_get_search_form', 10, 2 );

/**
 * Filters the HTML output of the search form.
 *
 * @param string $form The search form HTML output.
 * @param array  $args The array of arguments for building the search form. See get_search_form() for information on accepted arguments.
 * @return string The search form HTML output.
 */
function filter_get_search_form( string $form, array $args ) : string {
	ob_start();
	?>
	<form  method="get"  action="<?php wc_get_page_permalink('shop') ?>" style="width: 500px; height: 45px; padding-top: 4px; padding-bottom: 4px; padding-left: 16px; padding-right: 4px; border-radius: 6px; border: 1px #EAEAEA solid; justify-content: flex-start; align-items: center; gap: 10px; display: inline-flex">
 		 <input  name ="s" placeholder="Bạn cần tìm sản phẩm gì ?"style="flex: 1 1 0; color: #C9C9C9; font-size: 14px; font-family: Be Vietnam Pro; font-weight: 400; line-height: 18.90px; word-wrap: break-word;height:100%;border:none;">
		<button type="submit" style="width: 119px; align-self: stretch; padding-left: 16px; padding-right: 16px; padding-top: 8px; padding-bottom: 8px; background: #33B44A; border-radius: 4px; justify-content: flex-start; align-items: center; gap: 8px; display: flex">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
					<path fill-rule="evenodd" clip-rule="evenodd" d="M11.1816 11.1953C11.4419 10.9349 11.864 10.9349 12.1244 11.1953L15.1244 14.1953C15.3847 14.4556 15.3847 14.8777 15.1244 15.1381C14.864 15.3984 14.4419 15.3984 14.1816 15.1381L11.1816 12.1381C10.9212 11.8777 10.9212 11.4556 11.1816 11.1953Z" fill="white"/>
					<path fill-rule="evenodd" clip-rule="evenodd" d="M0.652344 7.33317C0.652344 3.65127 3.63711 0.666504 7.31901 0.666504C11.0009 0.666504 13.9857 3.65127 13.9857 7.33317C13.9857 11.0151 11.0009 13.9998 7.31901 13.9998C3.63711 13.9998 0.652344 11.0151 0.652344 7.33317ZM7.31901 1.99984C4.37349 1.99984 1.98568 4.38765 1.98568 7.33317C1.98568 10.2787 4.37349 12.6665 7.31901 12.6665C10.2645 12.6665 12.6523 10.2787 12.6523 7.33317C12.6523 4.38765 10.2645 1.99984 7.31901 1.99984Z" fill="white"/>
				</svg>
				<div style="color: white; font-size: 14px; font-family: Be Vietnam Pro; font-weight: 600; line-height: 16.80px; word-wrap: break-word">Tìm kiếm</div>
		</button>
	</form>
	<?php
	return ob_get_clean();
}
//
add_action('after_setup_theme','action_after_setup_theme' );

/**
 * Fires after the theme is loaded.
 *
 */
function action_after_setup_theme() : void {
	add_theme_support('woocommerce');
}
/**xoa style mac dinh woocomerce */
		add_filter('woocommerce_enqueue_styles','__return_empty_array');
	
	