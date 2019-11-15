<?php
/**
* @author Nguyen Trong Giap
* @project: 3F Wordpress
* @text: twtheme
* @link: https://fb.com/nguyentronggiap.5
*
* Description: this is a primary file of WP theme
*/


//define the theme URL constant, use it to add public files such as js, css, imgaes, ect.
if(!defined('TFT_URL'))
    define( 'TFT_URL', get_template_directory_uri());
    
//define the theme PATH constant, use it to include or requied the PHP files.
if(!defined('TFT_PATH'))
    define( 'TFT_PATH', get_stylesheet_directory());

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
add_action( 'after_setup_theme',function() {
    /**
    * Make theme available for translation.
    * Translations can be filed in the /languages/ directory.
    * @link: https://codex.wordpress.org/Function_Reference/load_theme_textdomain
    */
    load_theme_textdomain( 'twtheme', get_template_directory() . '/languages' ); 


    add_theme_support( 'woocommerce' );
    
    /**  ADD THEME SUPPORT
     * Registers theme support for a given feature.
     * @link: https://developer.wordpress.org/reference/functions/add_theme_support/
     * 
     */

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
    * Let WordPress manage the document title.
    * By adding theme support, we declare that this theme does not use a
    * hard-coded <title> tag in the document head, and expect WordPress to
    * provide it for us.
    */
    add_theme_support( 'title-tag' );

    /**
     * Enable support for custom logo.
     */
    add_theme_support( 'custom-logo', array(
        'height'      => 50,
        'width'       => 240,
        'flex-height' => true,
        'flex-width' => true,		
    ) );

    /*
     * Enable support for Post Thumbnails on posts and pages.
     */
    add_theme_support( 'post-thumbnails' );

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

    //<-------------------------END ADD THEME SUPORT-------------------->

    /**
     * Define custom image size
     * @link: https://developer.wordpress.org/reference/functions/add_image_size/
     */
    add_image_size( 'tw_post_sidebar', 135, 135, true );
    add_image_size( 'tw_post_thumbnail', 306, 220, true );
    add_image_size( 'tw_product_gallery', 600, 630, true );

    //remove default images size
    add_filter('intermediate_image_sizes_advanced', function($sizes){
        unset( $sizes['thumbnail']);
        unset( $sizes['medium']);
        unset( $sizes['medium_large']);
        unset( $sizes['large']);
        return $sizes;
    });

    /**
    * Rigister side bar menus
    * This theme uses wp_nav_menu() in one location.
    * @link: https://codex.wordpress.org/Function_Reference/register_nav_menus
    */

    register_nav_menus( array(
        'primary-menu' => esc_html__( 'Menu Chính', 'twtheme' ),
        // 'tw-footer-menu' => esc_html__( 'Menu Chân', 'twtheme' ),
        // 'tw-siderbar' => esc_html__( 'Menu Sidebar', 'twtheme' ),
    ));
});


//change more text in excerpt, default is "[...]"
add_filter( 'excerpt_more', function( $more ) {
    return '...';
});

// if(function_exists('acf_add_options_page')) {
//     $parent = acf_add_options_page(array(
//        'page_title' 	=> 'Tùy Chỉnh Giao Diện',
//        'menu_title'	=> 'Tùy chỉnh',
//        'position' => '59',
//        'redirect' 		=> false,
//        'icon_url' => 'dashicons-admin-generic'
//    ));

//    acf_add_options_sub_page(array(
//     'page_title' 	=> 'Tùy Chỉnh Trang Giới Thiệu',
//     'menu_title'	=> 'Trang giới thiệu',
//     'parent_slug' => $parent['menu_slug'],
// ));
// }


function scan_dir($dir, $pattern) {
	//get all files in the folder
	if ($dir==null||empty($dir || !file_exists($dir))) {
		return;
	}
	@$files = scandir($dir);

	$files_get = null;

	if (!empty($files)) {
		foreach($files as $f) {
			if(preg_match($pattern, $f))
				$files_get[] = $dir.$f;
		}
	}

	return $files_get;
}



$include_files = array(
    scan_dir(TFT_PATH.'/includes/', '/^[a-zA-Z-]{2,}.php$/'),
    scan_dir(TFT_PATH.'/includes/hooks/', '/^[a-zA-Z-]{2,}.php$/'),
    scan_dir(TFT_PATH.'/includes/class/', '/^[a-zA-Z-]{2,}.php$/'),
    scan_dir(TFT_PATH.'/includes/functions/', '/^[a-zA-Z-]{2,}.php$/'),
    scan_dir(TFT_PATH.'/includes/incfiles/', '/^[a-zA-Z-]{2,}.php$/'),
    scan_dir(TFT_PATH.'/components/', '/^[a-zA-Z-]{2,}.php$/')
); 

foreach($include_files as $files) {
    if($files == NULL)  continue;
    foreach($files as $f) {
        include $f;
    }
}

get_template_part( 'account' ); 