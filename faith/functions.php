<?php

if ( ! isset( $content_width ) ) $content_width = 780;

/**
 * Define some constats
 */
if( ! defined( 'ILOVEWP_VERSION' ) ) {
	define( 'ILOVEWP_VERSION', '1.3.2' );
}
if( ! defined( 'ILOVEWP_THEME_LITE' ) ) {
	define( 'ILOVEWP_THEME_LITE', true );
}
if( ! defined( 'ILOVEWP_THEME_PRO' ) ) {
	define( 'ILOVEWP_THEME_PRO', false );
}
if( ! defined( 'ILOVEWP_DIR' ) ) {
	define( 'ILOVEWP_DIR', trailingslashit( get_template_directory() ) );
}
if( ! defined( 'ILOVEWP_DIR_URI' ) ) {
	define( 'ILOVEWP_DIR_URI', trailingslashit( get_template_directory_uri() ) );
}

if ( ! function_exists( 'faith_setup' ) ) :

function faith_setup() {

	load_theme_textdomain( 'faith', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'title-tag' );

	add_theme_support( 'post-thumbnails' );

	set_post_thumbnail_size( 200, 125, true );
	
	// Featured Post Main Thumbnail on the front page & single page template
	add_image_size( 'faith-large-thumbnail', 1600, 500, true );
	add_image_size( 'faith-medium-thumbnail', 800, 250, true );
	add_image_size( 'faith-normal-thumbnail', 480, 300, true );

	add_theme_support( 'responsive-embeds' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary'	=> esc_html__( 'Primary Menu', 'faith' ),
		'mobile'	=> esc_html__( 'Mobile Menu', 'faith' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'gallery',
		'caption',
	) );

    add_theme_support( 'custom-logo', array(
	   'height'      => 100,
	   'width'       => 400,
	   'flex-width'  => true,
	   'flex-height' => true,
	) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_action( 'customize_controls_print_styles', 'faith_customizer_stylesheet' );

}
endif; // faith_setup
add_action( 'after_setup_theme', 'faith_setup' );

if ( ! function_exists( 'faith_custom_sizes' ) ) :

	add_filter( 'image_size_names_choose', 'faith_custom_sizes' );
	 
	function faith_custom_sizes( $sizes ) {
		return array_merge( $sizes, array(
			'faith-large-thumbnail'		=> __( 'Featured Image: Large (1600x500)', 'faith' ),
			'faith-medium-thumbnail'	=> __( 'Featured Image: Medium (800x250)', 'faith' ),
			'faith-normal-thumbnail'	=> __( 'Featured Image: Normal (480x300)', 'faith' ),
			'post-thumbnail'			=> __( 'Featured Image: Thumbnail (240x150)', 'faith' ),
		) );
	}

endif;

if ( ! function_exists( 'faith_theme_support_classic_widgets' ) ) :

function faith_theme_support_classic_widgets() {
	remove_theme_support( 'widgets-block-editor' );
}
endif;
add_action( 'after_setup_theme', 'faith_theme_support_classic_widgets' );

/* Custom Excerpt Length
==================================== */

if ( ! function_exists( 'faith_new_excerpt_length' ) ) :

	add_filter( 'excerpt_length', 'faith_new_excerpt_length' );

	function faith_new_excerpt_length( $length ) {
		return is_admin() ? $length : 30;
	}

endif;

if ( ! function_exists( 'faith_widgets_init' ) ) :

	function faith_widgets_init() {
		
		register_sidebar( array(
			'name'          => esc_html__( 'Main Sidebar', 'faith' ),
			'id'            => 'sidebar-main',
			'description'   => esc_html__( 'This is the main sidebar area that appears on all pages.', 'faith' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<p class="widget-title">',
			'after_title'   => '</p>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Homepage: Left Column', 'faith' ),
			'id'            => 'home-col-1',
			'description'   => esc_html__( 'Works best with a standard Text Widget. The widget title will be wrapped in a <h1></h1> tag.', 'faith' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h1 class="site-home-title">',
			'after_title'   => '</h1>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Homepage: Right Column', 'faith' ),
			'id'            => 'home-col-2',
			'description'   => esc_html__( 'Works best with a widget like Recent Posts.', 'faith' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<p class="widget-title">',
			'after_title'   => '</p>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Site Header', 'faith' ),
			'id'            => 'site-header',
			'description'   => esc_html__( 'Works best with a search widget.', 'faith' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<p class="widget-title">',
			'after_title'   => '</p>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Footer: Column 1', 'faith' ),
			'id'            => 'sidebar-footer-1',
			'description'   => esc_html__( 'This is displayed in the footer of the website. By default has a width of 275px.', 'faith' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<p class="widget-title">',
			'after_title'   => '</p>',
		) );
		
		register_sidebar( array(
			'name'          => esc_html__( 'Footer: Column 2', 'faith' ),
			'id'            => 'sidebar-footer-2',
			'description'   => esc_html__( 'This is displayed in the footer of the website. By default has a width of 275px.', 'faith' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<p class="widget-title">',
			'after_title'   => '</p>',
		) );
		
		register_sidebar( array(
			'name'          => esc_html__( 'Footer: Column 3', 'faith' ),
			'id'            => 'sidebar-footer-3',
			'description'   => esc_html__( 'This is displayed in the footer of the website. By default has a width of 275px.', 'faith' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<p class="widget-title">',
			'after_title'   => '</p>',
		) );
		
		register_sidebar( array(
			'name'          => esc_html__( 'Footer: Column 4', 'faith' ),
			'id'            => 'sidebar-footer-4',
			'description'   => esc_html__( 'This is displayed in the footer of the website. By default has a width of 275px.', 'faith' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<p class="widget-title">',
			'after_title'   => '</p>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Footer: Column 5', 'faith' ),
			'id'            => 'sidebar-footer-5',
			'description'   => esc_html__( 'This is displayed in the footer of the website. By default has a width of 275px.', 'faith' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<p class="widget-title">',
			'after_title'   => '</p>',
		) );

	}
	add_action( 'widgets_init', 'faith_widgets_init' );
endif;

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function faith_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", esc_url(get_bloginfo( 'pingback_url' )) );
	}
}
add_action( 'wp_head', 'faith_pingback_header' );

if ( ! function_exists( 'faith_theme_support_classic_widgets' ) ) :

function faith_theme_support_classic_widgets() {
	remove_theme_support( 'widgets-block-editor' );
}
endif;
add_action( 'after_setup_theme', 'faith_theme_support_classic_widgets' );

/**
 * --------------------------------------------
 * Enqueue scripts and styles for the backend.
 *
 * @package Faith
 * --------------------------------------------
 */

if ( ! function_exists( 'faith_scripts_admin' ) ) {
	/**
	 * Enqueue admin styles and scripts
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function faith_scripts_admin( $hook ) {
		// if ( 'widgets.php' !== $hook ) return;

		// Styles
		wp_enqueue_style(
			'faith-style-admin',
			get_template_directory_uri() . '/ilovewp-admin/css/ilovewp_theme_settings.css',
			'', ILOVEWP_VERSION, 'all'
		);
	}
}
add_action( 'admin_enqueue_scripts', 'faith_scripts_admin' );


/**
 * Enqueue scripts and styles.
 */
function faith_scripts() {

	$theme_version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style( 'faith-style', get_stylesheet_uri(), array(), $theme_version );

	wp_enqueue_script(
		'jquery-superfish',
		get_template_directory_uri() . '/js/superfish.min.js',
		array('jquery'),
		true
	);

	wp_enqueue_script(
		'jquery-flexslider',
		get_template_directory_uri() . '/js/jquery.flexslider-min.js',
		array('jquery'),
		true
	);

	wp_register_script( 'faith-scripts', get_template_directory_uri() . '/js/faith.js', array( 'jquery' ), $theme_version, true );
	wp_enqueue_script( 'faith-scripts' );

	/* Icomoon */
	wp_enqueue_style('ilovewp-icomoon', get_template_directory_uri() . '/css/icomoon.css', null, $theme_version);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'faith_scripts' );

if ( ! function_exists( 'faith_comment' ) ) :
/**
 * Template for comments and pingbacks.
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
function faith_comment( $comment, $args, $depth ) {

	if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
		<div class="comment-body">
			<?php esc_html_e( 'Pingback:', 'faith' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( esc_html__( 'Edit', 'faith' ), '<span class="edit-link">', '</span>' ); ?>
		</div>

	<?php else : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
		<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">

			<div class="comment-author vcard">
				<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
			</div><!-- .comment-author -->

			<header class="comment-meta">
				<?php printf( '<cite class="fn">%s</cite>', get_comment_author_link() ); ?>

				<div class="comment-metadata">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
						<time datetime="<?php comment_time( 'c' ); ?>">
							<?php /* translators: 1: date, 2:time */ printf( esc_html_x( '%1$s at %2$s', '1: date, 2: time', 'faith' ), get_comment_date(), get_comment_time() ); ?>
						</time>
					</a>
				</div><!-- .comment-metadata -->

				<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'faith' ); ?></p>
				<?php endif; ?>

				<div class="comment-tools">
					<?php edit_comment_link( esc_html__( 'Edit', 'faith' ), '<span class="edit-link">', '</span>' ); ?>

					<?php
						comment_reply_link( array_merge( $args, array(
							'add_below' => 'div-comment',
							'depth'     => $depth,
							'max_depth' => $args['max_depth'],
							'before'    => '<span class="reply">',
							'after'     => '</span>',
						) ) );
					?>
				</div><!-- .comment-tools -->
			</header><!-- .comment-meta -->

			<div class="comment-content">
				<?php comment_text(); ?>
			</div><!-- .comment-content -->
		</article><!-- .comment-body -->

	<?php
	endif;
}
endif; // ends check for faith_comment()

if ( ! function_exists( 'faith_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 * @since Faith 1.0.2
 */
function faith_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		
		// We don't use the default the_custom_logo() function because of its automatic addition of itemprop attributes (they fail the ARIA tests)
		
		$site = get_bloginfo('name');
		$custom_logo_id = get_theme_mod( 'custom_logo' );

		if ( $custom_logo_id ) {
		$html = sprintf( '<a href="%1$s" class="custom-logo-link" rel="home">%2$s</a>', 
			esc_url( home_url( '/' ) ),
			wp_get_attachment_image( $custom_logo_id, 'full', false, array(
				'class'    => 'custom-logo',
				'alt' => __('Logo for ','faith') . esc_attr($site),
				) )
			);
		}

		echo $html;

	}

}
endif;

if ( ! function_exists( 'wp_body_open' ) ) {
    function wp_body_open() {
        do_action( 'wp_body_open' );
    }
}

// Add custom CSS to first featured image on a page
if ( ! function_exists( 'faith_add_featured_image_class' ) ) :
	function faith_add_featured_image_class($attr) {
		if ( $attr['class'] === 'custom-logo' ) {
			return $attr; 
		}
		remove_filter('wp_get_attachment_image_attributes','faith_add_featured_image_class');
		$attr['class'] .= ' faith-first-image skip-lazy';
		$attr['loading'] = 'eager';
		return $attr;
	}
endif;
add_filter('wp_get_attachment_image_attributes','faith_add_featured_image_class'); 

/**
 * Adds custom classes to the array of body classes.
 *
 * @since Faith 1.0.8
 *
 * @param array $classes Classes for the body element.
 * @return array (Maybe) filtered body classes.
 */

function faith_body_classes( $classes ) {

    if ( ilovewp_helper_get_page_layout() != '' ) { $classes[] = ilovewp_helper_get_page_layout(); }
    $classes[] = ilovewp_helper_get_header_style();
    $classes[] = ilovewp_helper_get_slideshow_status();

	return $classes;
}

add_filter( 'body_class', 'faith_body_classes' );

/**
 * Implement the Custom Header feature.
 */
require get_parent_theme_file_path( '/inc/custom-header.php' );

/**
 * Customizer additions.
 */
require get_parent_theme_file_path() . '/inc/customizer.php';

/* Include Additional Options and Components
================================== */

require_once( get_template_directory() . '/ilovewp-admin/helper-functions.php');

//require only in admin!
if(is_admin()){	
	require_once('ilovewp-admin/ilovewp-theme-settings.php');

	if (current_user_can( 'manage_options' ) ) {
		require_once(get_template_directory() . '/ilovewp-admin/admin-notices/ilovewp-notices.php');
		require_once(get_template_directory() . '/ilovewp-admin/admin-notices/ilovewp-notice-welcome.php');
		require_once(get_template_directory() . '/ilovewp-admin/admin-notices/ilovewp-notice-review.php');
		require_once(get_template_directory() . '/ilovewp-admin/admin-notices/ilovewp-notice-magma.php');

		// Remove theme data from database when theme is deactivated.
		add_action('switch_theme', 'faith_db_data_remove');

		if ( ! function_exists( 'faith_db_data_remove' ) ) {
			function faith_db_data_remove() {

				delete_option( 'faith_admin_notices');
				delete_option( 'faith_theme_installed_time');

			}
		}

	}

}