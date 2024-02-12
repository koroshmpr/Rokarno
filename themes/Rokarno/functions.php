<?php
/**
 * Enqueue scripts and styles.
 */
// Define a global variable to store the current language
global $cur_lan;
$cur_lan = apply_filters('wpml_current_language', NULL);

function houger_scripts()
{
//    wp_enqueue_style('Ravi', get_template_directory_uri() . '/public/fonts/Ravi/fontface.css', array());
    wp_enqueue_style('Yekan', get_template_directory_uri() . '/public/fonts/YekanBakh/fontface.css', array());
    wp_enqueue_style('Play', get_template_directory_uri() . '/public/fonts/Play/fontface.css', array());
    wp_enqueue_style('style', get_stylesheet_directory_uri() . '/public/css/style.css', array());
    wp_enqueue_style('editor-style', get_stylesheet_directory_uri() . '/public/css/editor.css', array());

    wp_enqueue_script('main-js', get_template_directory_uri() . '/public/js/app.js', array(), null, true);
    global $cur_lan;
    $cur_lan = apply_filters('wpml_current_language', NULL);
    // Localize directly in main-js
    wp_localize_script('main-js', 'currentLanguage', array(
        'language' => $cur_lan,
    ));
    if (is_page_template('customize.php')) {
        // Enqueue the JavaScript file
        wp_enqueue_script('customize-js', get_template_directory_uri() . '/public/js/costomize.js', array(), true);
        wp_localize_script('customize-js', 'currentLanguage', array(
            'language' => $cur_lan,
        ));
    }
}

add_action( 'wp_enqueue_scripts', 'houger_scripts' );
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function baloochy_setup() {

	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
	register_nav_menu( 'headerMenuLocation', 'منوی اصلی' );
	register_nav_menu( 'footerLocationOne', 'منوی اول فوتر' );
	register_nav_menu( 'footerLocationTwo', 'منوی دوم فوتر' );
}

add_action( 'after_setup_theme', 'baloochy_setup' );


if ( function_exists( 'acf_add_options_page' ) ) {

	acf_add_options_page( array(
		'page_title' => 'تنظیمات پوسته',
		'menu_title' => 'تنظیمات پوسته',
		'menu_slug'  => 'theme-general-settings',
		'capability' => 'edit_posts',
		'redirect'   => false
	) );
}


function add_menu_link_class( $classes, $item, $args ) {
	if ( isset( $args->link_class ) ) {
		$classes['class'] = $args->link_class;
	}
	return $classes;
}
add_filter( 'nav_menu_link_attributes', 'add_menu_link_class', 1, 3 );

// helper function to find a menu item in an array of items
function wpd_get_menu_item( $field, $object_id, $items ) {
	foreach ( $items as $item ) {
		if ( $item->$field == $object_id ) {
			return $item;
		}
	}
	return false;
}

/**
 * Disable the emoji's
 */
function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
	add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
}

add_action( 'init', 'disable_emojis' );

/**
 * Filter function used to remove the tinymce emoji plugin.
 *
 * @param array $plugins
 *
 * @return array Difference betwen the two arrays
 */
function disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}

/**
 * Remove emoji CDN hostname from DNS prefetching hints.
 *
 * @param array $urls URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed for.
 *
 * @return array Difference betwen the two arrays.
 */
function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
	if ( 'dns-prefetch' == $relation_type ) {
		/** This filter is documented in wp-includes/formatting.php */
		$emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );

		$urls = array_diff( $urls, array( $emoji_svg_url ) );
	}

	return $urls;
}
function custom_menu_item_classes($classes, $item, $args) {
    // Check if the current page is a product, category, or single product page
    if (is_product() || is_product_category() || is_singular('product')) {
        // Check if the menu item is the "Shop" page
        if ($item->title == 'Shop' or $item->title == 'Products' or  $item->title == 'محصولات') {
            // Add your custom class to the classes array
            $classes[] = 'current-menu-item';
        }
    }

    return $classes;
}

add_filter('nav_menu_css_class', 'custom_menu_item_classes', 10, 3);
//function custom_post_type_args( $args, $post_type ) {
//    // Change 'project' to the slug of your custom post type
//    if ( 'portfolio' === $post_type ) {
//        // Set the with_front parameter to false
//        $args['rewrite']['with_front'] = false;
//    }
//    if ( 'services' === $post_type ) {
//        // Set the with_front parameter to false
//        $args['rewrite']['with_front'] = false;
//    }
//    if ( 'clients' === $post_type ) {
//        // Set the with_front parameter to false
//        $args['rewrite']['with_front'] = false;
//    }
//    return $args;
//}
//add_filter( 'register_post_type_args', 'custom_post_type_args', 10, 2 );