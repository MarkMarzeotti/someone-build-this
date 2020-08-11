<?php
/**
 * Marzeotti Base functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Marzeotti_Base
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function marz_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Marzeotti Base, use a find and replace
	 * to change 'marzeotti-base' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'marzeotti-base', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head.
	 */
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable the title tag controlled by WordPress.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	/*
	 * Register menu locations.
	 *
	 * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
	 */
	register_nav_menus(
		array(
			'primary-menu' => esc_html__( 'Primary Menu', 'marzeotti-base' ),
			'button-menu'  => esc_html__( 'Button Menu', 'marzeotti-base' ),
			'footer-menu'  => esc_html__( 'Footer Menu', 'marzeotti-base' ),
		)
	);

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

	/**
	 * Add support for wide and full width blocks.
	 */
	add_theme_support( 'align-wide' );

	/**
	 * Add a custom color pallete
	 */
	add_theme_support(
		'editor-color-palette',
		array(
			array(
				'name'  => __( 'Black', 'marzeotti-base' ),
				'slug'  => 'black',
				'color' => '#000000',
			),
			array(
				'name'  => __( 'White', 'marzeotti-base' ),
				'slug'  => 'white',
				'color' => '#ffffff',
			),
			array(
				'name'  => __( 'Gallery', 'marzeotti-base' ),
				'slug'  => 'gallery',
				'color' => '#eeeeee',
			),
		)
	);
}
add_action( 'after_setup_theme', 'marz_setup' );

/**
 * Enqueue scripts and styles.
 */
function marz_scripts() {
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap', array(), '1' );
	wp_enqueue_style( 'marzeotti-base-style', get_stylesheet_directory_uri() . '/dist/css/style.css', array(), wp_get_theme()->get( 'Version' ) );
	wp_enqueue_script( 'marzeotti-base-script', get_stylesheet_directory_uri() . '/dist/js/app.js', array( 'jquery' ), wp_get_theme()->get( 'Version' ), true );
	wp_localize_script(
		'marzeotti-base-script',
		'marzeottiBaseGlobal',
		array(
			'ajaxUrl' => admin_url( 'admin-ajax.php' ),
			'nonce'   => wp_create_nonce( 'marz_more_post_ajax_nonce' ),
		)
	);
}
add_action( 'wp_enqueue_scripts', 'marz_scripts' );

/**
 * Enqueue admin scripts and styles.
 */
function marz_admin_scripts() {
	wp_enqueue_style( 'admin-styles', get_stylesheet_directory_uri() . '/dist/css/admin.css', array(), wp_get_theme()->get( 'Version' ) );
	wp_enqueue_script( 'admin-script', get_stylesheet_directory_uri() . '/dist/js/admin.js', array( 'jquery' ), wp_get_theme()->get( 'Version' ), true );
}
add_action( 'admin_enqueue_scripts', 'marz_admin_scripts' );

/**
 * Remove WordPress base menu classes.
 *
 * @param array  $classes An array of classes for this menu item.
 * @param object $item    The post object for the menu item.
 */
function marz_discard_menu_classes( $classes, $item ) {
	return (array) get_post_meta( $item->ID, '_menu_item_classes', true );
}
add_filter( 'marz_nav_menu_css_class', 'marz_discard_menu_classes', 10, 2 );

/**
 * Set number of words to show in the excerpt.
 *
 * @param int $length Allowed length of the excerpt.
 */
function marz_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'marz_excerpt_length', 999 );

/**
 * Set characters to show after excerpt.
 *
 * @param string $more The text to display at the end of a generated excerpt.
 */
function marz_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'marz_excerpt_more' );

/**
 * Only allow certain blocks to begin with.
 *
 * @param array $allowed_blocks The list of all allowed Gutenberg blocks.
 */
function marz_allowed_block_types( $allowed_blocks ) {
	return array(
		'core/image',
		'core/paragraph',
		'core/heading',
		'core/list',
		'core/gallery',
		'core/quote',
		'core/table',
		'core/button',
		'core/columns',
		'core/separator',
		'core/video',
		'core-embed/youtube',
		'core-embed/twitter',
		'core-embed/instagram',
		'core-embed/vimeo'
	);
}
add_filter( 'allowed_block_types', 'marz_allowed_block_types' );

/**
 * Do not allow user to change font size.
 */
function marz_disable_font_sizes() {
    // removes the text box where users can enter custom pixel sizes
    add_theme_support( 'disable-custom-font-sizes' );
    // forces the dropdown for font sizes to only contain "normal"
    add_theme_support( 'editor-font-sizes', array(
        array(
            'name' => 'Normal',
            'size' => 16,
            'slug' => 'normal'
        )
    ) );
}
add_action( 'after_setup_theme', 'marz_disable_font_sizes' );

/**
 * Add Tailwind CSS classes to HTML tags in the content.
 *
 * @param string $content The post content.
 */
function marz_add_classes_to_content_tags( $content ) {
	$content = preg_replace( '/<[pP][\s\S]*?>/', '<p class="my-2 text-md leading-relaxed font-normal text-gray-700">', $content );
	$content = preg_replace( '/<[hH]1[\s\S]*?>/', '<h2 class="my-3 text-2xl leading-normal font-medium text-gray-800">', $content );
	$content = preg_replace( '/<\/[hH]1[\s\S]*?>/', '</h2>', $content );
	$content = preg_replace( '/<[hH]2[\s\S]*?>/', '<h2 class="my-3 text-2xl leading-normal font-medium text-gray-800">', $content );
	$content = preg_replace( '/<[hH]3[\s\S]*?>/', '<h3 class="my-3 text-xl leading-normal font-medium text-gray-800">', $content );
	$content = preg_replace( '/<[hH]4[\s\S]*?>/', '<h4 class="my-3 text-lg leading-normal font-medium text-gray-800">', $content );
	$content = preg_replace( '/<[hH]5[\s\S]*?>/', '<h5 class="my-2 text-md leading-normal font-medium text-gray-800">', $content );
	$content = preg_replace( '/<[hH]6[\s\S]*?>/', '<h6 class="my-2 text-md leading-normal font-medium text-gray-800">', $content );
	return $content;
}
add_filter( 'the_content', 'marz_add_classes_to_content_tags' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Additional custom post types and custom taxonomies.
 */
require get_template_directory() . '/inc/post-types-taxonomies.php';

/**
 * A custom walker class to modify the comment list markup.
 */
require get_template_directory() . '/inc/url-structure.php';

/**
 * A custom walker class to modify the navigation markup.
 */
require get_template_directory() . '/inc/class-marz-walker-nav-menu.php';

/**
 * A custom walker class to modify the comment list markup.
 */
require get_template_directory() . '/inc/class-marz-walker-comment.php';

function additional_fields () {
	?>
  	<label for="category" class="block text-gray-700 font-medium mb-3">Category</label>
    <select id="category" name="category" class="appearance-none block w-full bg-gray-100 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none">
        <option value="idea">Idea</option>
        <option value="branding">Branding</option>
        <option value="design">Design</option>
        <option value="engineering">Engineering</option>
    </select>
	<?php
}
add_action( 'comment_form_logged_in_after', 'additional_fields' );
add_action( 'comment_form_after_fields', 'additional_fields' );

function save_comment_meta_data( $comment_id ) {
  	if ( isset( $_POST['category'] ) && ! empty( $_POST['category'] ) ) {
	  	$category = wp_filter_nohtml_kses($_POST['category']);
		add_comment_meta( $comment_id, 'category', $category );
	}
}
add_action( 'comment_post', 'save_comment_meta_data' );
