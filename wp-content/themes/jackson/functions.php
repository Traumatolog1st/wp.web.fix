<?php
/**
 * jackson functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package jackson
 */
define('THEME_OPT', 'jackson', true);
if ( ! function_exists( 'jackson_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function jackson_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on jackson, use a find and replace
		 * to change 'jackson' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'jackson', get_template_directory() . '/languages' );

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
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'jackson' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'jackson_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'jackson_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function jackson_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'jackson_content_width', 640 );
}
add_action( 'after_setup_theme', 'jackson_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function jackson_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'jackson' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'jackson' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'jackson_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function jackson_scripts() {
	wp_enqueue_script("jquery");

	wp_enqueue_style( 'jackson-style', get_stylesheet_uri() );

	wp_enqueue_script( 'jackson-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'jackson-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'custom-script', get_template_directory_uri() . '/js/custom.js', array(), '123', true );

	wp_enqueue_script( 'slick-script', get_template_directory_uri() . '/slick/slick.js', array(), '123', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'jackson_scripts' );



function jackson_styles() {

	wp_register_style('fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '1','all');
	wp_enqueue_style('fontawesome');

    wp_register_style('themestyle', get_template_directory_uri() . '/css/custom.css', array(), filemtime(get_template_directory() . '/css/custom.css'), 'all');

    wp_register_style('slickstyle', get_template_directory_uri() . '/slick/slick.css', array(), filemtime(get_template_directory() . '/slick/slick.css'), 'all');

    wp_register_style('slickthemestyle', get_template_directory_uri() . '/slick/slick-theme.css', array(), filemtime(get_template_directory() . '/slick/slick-theme.css'), 'all');

    wp_enqueue_style('slickstyle');
    wp_enqueue_style('slickthemestyle');
    wp_enqueue_style('themestyle');
}

add_action('wp_enqueue_scripts', 'jackson_styles'); // Add Theme Stylesheet

function jackson_prepare_meta( $meta ) {
    if( !$meta ) return array();

    $out = array();

    foreach ($meta as $key => $value) {
        if( !empty($value) ){
            $data = unserialize($value[0]);
            $meta_value = $data? $data : $value[0];
            $out[ $key ] = $meta_value;
        }
    }

    return $out;
}

function reset_editor()
{
     global $_wp_post_type_features;

     $post_type="page";
     $feature = "editor";
     if ( !isset($_wp_post_type_features[$post_type]) )
     {

     }
     elseif ( isset($_wp_post_type_features[$post_type][$feature]) )
     unset($_wp_post_type_features[$post_type][$feature]);
}

add_action("init","reset_editor");

add_action('init', 'create_taxonomy');
function create_taxonomy(){
	// список параметров: http://wp-kama.ru/function/get_taxonomy_labels
	register_taxonomy('taxonomy', array('services'), array(
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => array(
			'name'              => 'Departments',
			'singular_name'     => 'Departament',
			'search_items'      => 'Search Departament',
			'all_items'         => 'All Departament',
			'view_item '        => 'View Departament',
			'parent_item'       => 'Parent Departament',
			'parent_item_colon' => 'Parent Departament:',
			'edit_item'         => 'Edit',
			'update_item'       => 'Update',
			'add_new_item'      => 'Add New',
			'new_item_name'     => 'New',
			'menu_name'         => 'Departaments',
		),
		'description'           => '', // описание таксономии
		'public'                => true,
		'publicly_queryable'    => null, // равен аргументу public
		'show_in_nav_menus'     => true, // равен аргументу public
		'show_ui'               => true, // равен аргументу public
		'show_tagcloud'         => true, // равен аргументу show_ui
		'show_in_rest'          => null, // добавить в REST API
		'rest_base'             => null, // $taxonomy
		'hierarchical'          => false,
		'update_count_callback' => '',
		'rewrite'               => true,
		//'query_var'             => $taxonomy, // название параметра запроса
		'capabilities'          => array(),
		'meta_box_cb'           => 'post_categories_meta_box', // callback функция. Отвечает за html код метабокса (с версии 3.8): post_categories_meta_box или post_tags_meta_box. Если указать false, то метабокс будет отключен вообще
		'show_admin_column'     => false, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
		'_builtin'              => false,
		'show_in_quick_edit'    => null, // по умолчанию значение show_ui
	) );
}



add_action('init', 'register_post_types');
function register_post_types(){
	register_post_type('services', array(
		'label'  => null,
		'labels' => array(
			'name'               => 'Services', // основное название для типа записи
			'singular_name'      => 'service', // название для одной записи этого типа
			'add_new'            => 'Add new', // для добавления новой записи
			'add_new_item'       => 'Add new item', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Edit', // для редактирования типа записи
			'search_items'       => 'Search', // для поиска по этим типам записи
			'not_found'          => 'Not found', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Not found in trash', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Services', // название меню
		),
		'description'         => '',
		'public'              => true,
		'show_in_menu'        => true, // показывать ли в меню адмнки
		'menu_position'       => 25,
		'menu_icon'           => 'dashicons-admin-multisite', 
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => array('title', 'thumbnail'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => array('departaments'),
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	) );
}


add_action('init', 'register_post_types_partners');
function register_post_types_partners(){
	register_post_type('partners', array(
		'label'  => null,
		'labels' => array(
			'name'               => 'Partners', // основное название для типа записи
			'singular_name'      => 'partner', // название для одной записи этого типа
			'add_new'            => 'Add new', // для добавления новой записи
			'add_new_item'       => 'Add new item', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Edit', // для редактирования типа записи
			'search_items'       => 'Search', // для поиска по этим типам записи
			'not_found'          => 'Not found', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Not found in trash', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Partners', // название меню
		),
		'description'         => '',
		'public'              => true,
		'show_in_menu'        => true, // показывать ли в меню адмнки
		'menu_position'       => 25,
		'menu_icon'           => 'dashicons-admin-users', 
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => array('title', 'thumbnail'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => array(),
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	) );
}

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

include_once 'inc/loader.php';