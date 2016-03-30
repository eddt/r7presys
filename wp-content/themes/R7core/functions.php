<?php
/**
 * R7core functions and definitions
 *
 * @package R7core
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 750; /* pixels */

if ( ! function_exists( 'R7core_setup' ) ) :
/**
 * Set up theme defaults and register support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function R7core_setup() {
    global $cap, $content_width;

    // This theme styles the visual editor with editor-style.css to match the theme style.
    add_editor_style();

    if ( function_exists( 'add_theme_support' ) ) {

		/**
		 * Add default posts and comments RSS feed links to head
		*/
		add_theme_support( 'automatic-feed-links' );
		
		/**
		 * Enable support for Post Thumbnails on posts and pages
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		*/
		add_theme_support( 'post-thumbnails' );
		
		/**
		 * Enable support for Post Formats
		*/
		add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );
		
		/**
		 * Setup the WordPress core custom background feature.
		*/
		//add_theme_support( 'custom-background', apply_filters( 'R7core_custom_background_args', array(
		//	'default-color' => 'ffffff',
		//	'default-image' => '',
		//) ) );
	
    }

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on R7core, use a find and replace
	 * to change '_tk' to the name of your theme in all the template files
	*/
	load_theme_textdomain( 'R7core', get_template_directory() . '/languages' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	*/ 
    register_nav_menus( array(
        'primary'  => __( 'Header bottom menu', 'R7core' ),
    ) );

}
endif; // R7core_setup
add_action( 'after_setup_theme', 'R7core_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function R7core_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'R7core' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'R7core_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function R7core_scripts() {
	wp_enqueue_style( 'R7core-style', get_stylesheet_uri() );

	// load bootstrap css
	wp_enqueue_style( 'R7core-bootstrap', get_template_directory_uri() . '/includes/resources/bootstrap/css/bootstrap.min.css' );
	
	// load bootstrap js
	wp_enqueue_script('R7core-bootstrapjs', get_template_directory_uri().'/includes/resources/bootstrap/js/bootstrap.min.js', array('jquery') );

	// load the glyphicons
	wp_enqueue_style( 'R7core-glyphicons', get_template_directory_uri() . '/includes/resources/glyphicons/css/bootstrap-glyphicons.css' );
		
	// load bootstrap wp js
	wp_enqueue_script( 'R7core-bootstrapwp', get_template_directory_uri() . '/includes/js/bootstrap-wp.js', array('jquery') );

	wp_enqueue_script( 'R7core-skip-link-focus-fix', get_template_directory_uri() . '/includes/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'R7core-keyboard-image-navigation', get_template_directory_uri() . '/includes/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'R7core_scripts' );

/**
 * Custom Post View Password Entry for this theme.
 */
function my_password_form() {
    global $post;
    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
    $o = '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
    ' . __( "To view this page, please enter the password below:" ) . '<br /><br />
    <label for="' . $label . '">' . __( "Password:" ) . ' </label>&nbsp;<input name="post_password" id="' . $label . '" type="password" size="20" maxlength="20" /><input type="submit" name="Submit" value="' . esc_attr__( "Submit" ) . '" />
    </form>
    ';
    return $o;
}
add_filter( 'the_password_form', 'my_password_form' );

/**
 * Alter Title message text for single and custom post type
 */
function the_title_trim($title) {
    $title = esc_attr($title);
    $findthese = array(
        '#Protected:#',
        '#Private:#'
    );
    $replacewith = array(
        '', // What to replace "Protected:" with
        '' // What to replace "Private:" with
    );
    $title = preg_replace($findthese, $replacewith, $title);
    return $title;
}
add_filter('the_title', 'the_title_trim');


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/includes/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/includes/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/includes/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/includes/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/includes/jetpack.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/includes/bootstrap-wp-navwalker.php';

/**
 * Add Categories to attachments.
 */
function wptp_add_categories_to_attachments() {
	register_taxonomy_for_object_type( 'category', 'attachment' );
}
add_action( 'init' , 'wptp_add_categories_to_attachments' );

/**
 * Add Tags to attachments.
 */
function wptp_add_tags_to_attachments() {
	register_taxonomy_for_object_type( 'post_tag', 'attachment' );
}
add_action( 'init' , 'wptp_add_tags_to_attachments' );


add_filter('manage_media_columns', 'posts_columns_attachment_cat', 1);
add_action('manage_media_custom_column', 'posts_custom_columns_attachment_cat', 1, 2);
function posts_columns_attachment_cat($defaults){
	$defaults['wps_post_attachments_id'] = __('ID');
	return $defaults;
}
function posts_custom_columns_attachment_cat($column_name, $id){
	if($column_name === 'wps_post_attachments_id'){
		echo $id;
	}
}




/**
 * Duplicate Slugs for Different Post Types Fix - Alisa Herr
 * http://cuberis.com/blog/wordpress-duplicate-slugs-for-different-post-types/
 * versus
 * http://core.trac.wordpress.org/attachment/ticket/18962/wp-includes_post.diff
 */
function wp_cpt_unique_post_slug($slug, $post_ID, $post_status, $post_type, $post_parent, $original_slug) {
    if ( in_array( $post_status, array( 'draft', 'pending', 'auto-draft' ) ) )
        return $slug;

    global $wpdb, $wp_rewrite;

    // store slug made by original function
    $wp_slug = $slug;

    // reset slug to original slug
    $slug = $original_slug;

    $feeds = $wp_rewrite->feeds;
    if ( ! is_array( $feeds ) )
        $feeds = array();

    $hierarchical_post_types = get_post_types( array('hierarchical' => true) );
    if ( 'attachment' == $post_type ) {
        // Attachment slugs must be unique across all types.
        $check_sql = "SELECT post_name FROM $wpdb->posts WHERE post_name = %s AND ID != %d LIMIT 1";
        $post_name_check = $wpdb->get_var( $wpdb->prepare( $check_sql, $slug, $post_ID ) );

        if ( $post_name_check || in_array( $slug, $feeds ) || apply_filters( 'wp_unique_post_slug_is_bad_attachment_slug', false, $slug ) ) {
            $suffix = 2;
            do {
                $alt_post_name = substr ($slug, 0, 200 - ( strlen( $suffix ) + 1 ) ) . "-$suffix";
                $post_name_check = $wpdb->get_var( $wpdb->prepare($check_sql, $alt_post_name, $post_ID ) );
                $suffix++;
            } while ( $post_name_check );
            $slug = $alt_post_name;
        }
    } elseif ( in_array( $post_type, $hierarchical_post_types ) ) {
        if ( 'nav_menu_item' == $post_type )
            return $slug;
        // Page slugs must be unique within their own trees. Pages are in a separate
        // namespace than posts so page slugs are allowed to overlap post slugs.
        $check_sql = "SELECT post_name FROM $wpdb->posts WHERE post_name = %s AND post_type = %s AND ID != %d AND post_parent = %d LIMIT 1";
        $post_name_check = $wpdb->get_var( $wpdb->prepare( $check_sql, $slug, $post_type, $post_ID, $post_parent ) );

        if ( $post_name_check || in_array( $slug, $feeds ) || preg_match( "@^($wp_rewrite->pagination_base)?\d+$@", $slug ) || apply_filters( 'wp_unique_post_slug_is_bad_hierarchical_slug', false, $slug, $post_type, $post_parent ) ) {
            $suffix = 2;
            do {
                $alt_post_name = substr( $slug, 0, 200 - ( strlen( $suffix ) + 1 ) ) . "-$suffix";
                $post_name_check = $wpdb->get_var( $wpdb->prepare( $check_sql, $alt_post_name, $post_type, $post_ID, $post_parent ) );
                $suffix++;
            } while ( $post_name_check );
            $slug = $alt_post_name;
        }
    } else {
        // Post slugs must be unique across all posts.
        $check_sql = "SELECT post_name FROM $wpdb->posts WHERE post_name = %s AND post_type = %s AND ID != %d LIMIT 1";
        $post_name_check = $wpdb->get_var( $wpdb->prepare( $check_sql, $slug, $post_type, $post_ID ) );

        if ( $post_name_check || in_array( $slug, $feeds ) || apply_filters( 'wp_unique_post_slug_is_bad_flat_slug', false, $slug, $post_type ) ) {
            $suffix = 2;
            do {
                $alt_post_name = substr( $slug, 0, (200 - ( strlen( $suffix ) + 1 )) ) . "-$suffix";
                $post_name_check = $wpdb->get_var( $wpdb->prepare( $check_sql, $alt_post_name, $post_type, $post_ID ) );
                $suffix++;
            } while ( $post_name_check );
            $slug = $alt_post_name;
        }
    }

    return $slug;
}
add_filter('wp_unique_post_slug', 'wp_cpt_unique_post_slug', 10, 6);
