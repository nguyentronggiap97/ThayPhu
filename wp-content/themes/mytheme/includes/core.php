<?php

if( !function_exists( 'tw_pages_dropdown' ) ):
    function tw_pages_dropdown() {
        $tw_pages = get_pages( array( 'hide_empty' => 0 ) );
        $tw_pages_dropdown['0'] = __( 'Chọn một trang', 'twtheme');
        foreach ( $tw_pages as $tw_page ) {
            $tw_pages_dropdown[$tw_page->ID] = $tw_page->post_title;
        }
        return $tw_pages_dropdown;
    }
endif;


if( !function_exists( 'tw_term_dropdown' ) ):
    function tw_term_dropdown($term) {
        $tw_terms = get_terms( array( 'hide_empty' => false , 'taxonomy' => $term) );
        $tw_terms_dropdown['0'] = __( 'Mời chọn', 'twtheme');
        foreach ( $tw_terms as $tw_term ) {
            $tw_terms_dropdown[$tw_term->term_id] = $tw_term->name;
        }
        return $tw_terms_dropdown;
    }
endif;

if( !function_exists( 'tw_sanitize_text_field' ) ):
    function tw_sanitize_text_field( $input ) {
        return $input;
    }
endif;

/**
 * Sanitize number
 */
if( !function_exists( 'tw_sanitize_number' ) ):
    function tw_sanitize_number( $input ) {
        $output = intval($input);
        return $output;
    }
endif;

// the function to check plugin is active
if(!function_exists('tw_is_plugin_active')) {
    function tw_is_plugin_active($plugin) {
        include_once(ABSPATH.'wp-admin/includes/plugin.php');
        return is_plugin_active($plugin);
    } 
}

// the function to check a folder is exitst
if(!function_exists('tw_folder_exists')) {
    function tw_folder_exists($path) {
        if(!file_exists($path)) {
            die('<b>ERROR:</b> Thư mục <b>'.$path.'</b> không tồn tại, vui lòng tạo thư mục trước khi sử dụng.');
        }
    } 
}

// the function to check a file is exitst
if(!function_exists('tw_file_exists')) {
    function tw_file_exists($path) {
        if(!file_exists($path)) {
            die('<b>ERROR:</b> File <b>'.$path.'</b> không tồn tại, vui lòng tạo file này trước khi sử dụng.');
        }
    } 
}

// the function to check a file is exitst
if(!function_exists('tw_post_pagination')) {
    function post_pagination($args = array()) {

        $args = wp_parse_args( $args, array(
            'container_class' => 'pagination',
            'number_class' => 'page-numbers',
            'current_class' => 'current',
            'prev_text' => 'Trang Trước',
            'next_text' => 'Trang Sau',
        ));

        extract($args);

        $html = strip_tags(get_the_posts_pagination( array(
            'mid_size'  => 2,
            'prev_text' => $prev_text,
            'next_text' => $next_text,
            'screen_reader_text' => ' '
        )),'<nav><a><span>');

        if($container_class !== 'pagination') {
            $html = str_replace('navigation pagination', $container_class, $html);
        }

        if($number_class !== 'page-numbers') {
            $html = str_replace('page-numbers', $number_class, $html);
        }

        if($current_class !== 'page-numbers') {
            $html = str_replace('current', $current_class, $html);
        }

        return $html;
    }
}

// the function to check a file is exitst
if(!function_exists('get_option')) {
    function get_option($name, $default) {
        return get_theme_mod( $name, $default );
    }
}

// the function to check a file is exitst
if(!function_exists('get_option_image')) {
    function get_option_image($name, $default) {
        $image_id =  get_theme_mod( $name, $default );
        $image = wp_get_attachment_image_src( $image_id , 'full' );
        return $image[0];
    }
}


if(!function_exists('get_logo')) {
    function get_logo() {
         $custom_logo_id = get_theme_mod( 'custom_logo' );
         $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
         return $logo[0];
    } 
 }
 
 if(!function_exists('tw_the_breadcrumb')) {
     function tw_the_breadcrumb() {
         echo '<ul id="crumbs">';
         if (!is_home()) {
             echo '<li><a href="';
             echo get_option('home');
             echo '">';
             echo '<i class="fa fa-home" aria-hidden="true"></i> ' . __('Trang chủ','twtheme');
             echo "</a></li>";
             if (is_category() || is_single()) {
                     echo '<li><a href="'.home_url('news').'">'.__('Tin tức', 'twtheme').'</a></li><li>';
                     the_category(' </li><li> ');
                     if (is_single()) {
                             echo "</li><li>";
                             the_title();
                             echo '</li>';
                     }
             } elseif (is_page()) {
                     echo '<li>';
                     echo the_title();
                     echo '</li>';
             }
         }
         elseif (is_tag()) {single_tag_title();}
         elseif (is_day()) {echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';}
         elseif (is_month()) {echo"<li>Archive for "; the_time('F, Y'); echo'</li>';}
         elseif (is_year()) {echo"<li>Archive for "; the_time('Y'); echo'</li>';}
         elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}
         elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
         elseif (is_search()) {echo"<li>Search Results"; echo'</li>';}
         echo '</ul>';
     }
 }