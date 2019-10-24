<?php 

add_action( 'wp_ajax_ajax_contact','ajax_contactx' );
add_action( 'wp_ajax_nopriv_ajax_contact','ajax_contactx' );
add_action( 'wp_ajax_ajax_delete_contact','ajax_delete_contact' );
add_action( 'wp_ajax_nopriv_ajax_delete_contact','ajax_delete_contact' );
add_action( 'wp_ajax_ajax_send_all','ajax_send_all_mail' );
add_action( 'wp_ajax_nopriv_ajax_send_all','ajax_send_all_mail' );
add_action( 'wp_ajax_ajax_send_all_checked','ajax_send_all_mail_checked' );
add_action( 'wp_ajax_nopriv_ajax_send_all_checked','ajax_send_all_mail_checked' );




function send_a_mail($to_mail,$name)
{
	$to=$to_mail;

	$subject ="Dự ";	  	
	$message=get_field('mau_thu_gui','option');
	$message =str_replace( '{{ name }}', $name, $message );

	// $mail_sent = wp_mail( $to, $subject, $mailBody );
	wp_mail( $to, $subject, $message );
}


function send_mail_after_contact($from_mail,$message)
{
	$to='nguyentronggiap97p@gmail.com';
	$subject ="Dự ";
	

	wp_mail( $to, $subject, $message );
}


function ajax_send_all_mail()
{
	$option_key="contact_data";
	$contact =get_option($option_key,false);
	foreach ($contact as $key) {
		send_a_mail($key['email'],$key['name']);
	}
	echo "thành công";
	die();
}



function ajax_send_all_mail_checked()
{
	// session_start();
	$option_key="contact_data";
	$contact =get_option($option_key,false);
	$arr_check=( $_POST['key'] );

	foreach ($arr_check as  $value) {
		send_a_mail($contact[$value]['email'],$contact[$value]['name']);
	}
	echo "thành công";
	die();
}



function ajax_contactx()
{
	$option_key="contact_data";
	$contact =get_option($option_key,false);
	$arr['email']= $_POST['email'];

	foreach ($contact as $value) {
		if($arr['email']===$value['email']){
			echo "thành công";
			die();
		}
	}

	$arr['time'] = current_time( 'H:i - d/m/Y', false );
	if (!$contact) {
		$contact[time()] = $arr;
		add_option( $option_key,$contact );
	}
	else{
		$contact[time()] = $arr;
		update_option( $option_key,$contact);	 
	}
	echo "thành công";
	die();
}



function ajax_delete_contact()
{
	$option_key="contact_data";
	$contact =get_option($option_key,false);
	$arr_check=( $_POST['key'] );



	foreach ($arr_check as  $value) {
		unset($contact[$value]);
	}
	if (empty($contact)) {
			delete_option('contact_data');
		}
	else{
		update_option( $option_key,$contact);
	}

	echo "thành công";
	die();
}


function create_member() 
{ 
	$label = array( 
		'name' => 'Thành viên công ty', //Tên post type dạng số nhiều 
		'singular_name' => 'Thành viên công ty' //Tên post type dạng số ít 
	); 
	$args = array( 
		'labels' => $label, 
		'description' => 'Post type Thành viên công ty',
		'supports' => array( 
			'title',
			'editor',
			'excerpt',
			'thumbnail',
		),
		'taxonomies' => array(),
		'hierarchical' => false,
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_in_admin_bar' => true,
		'menu_position' => 5,
		'menu_icon' => 'dashicons-businessman',
		'can_export' => true,
		'has_archive' => true,
		'exclude_from_search' => false,
		'publicly_queryable' => true,
		'capability_type' => 'post'
	); 
	register_post_type('thanh-vien', $args);
} 


function add_dich_vu() { 
		/* Biến $label chứa các tham số thiết lập tên hiển thị của Taxonomy 
		*/ 
		$labels = array( 
				'name' => 'Chức vụ', 
				'singular' => 'Chức vụ', 
				'menu_name' => 'Chức vụ' 
		); 
		$args = array( 
				'labels' => $labels, 
				'hierarchical' => true,//true giống chuyên mục, false giống thẻ ( tag ) 
				'public' => true,// 
				'show_ui'  => true, 
				'show_admin_column'	 => true, 
				'show_in_nav_menus'  => true, 
				'show_tagcloud'  => true, 
		); 
		register_taxonomy('chuc-vu', 'thanh-vien', $args); 
} 
// Hook into the 'init' action 
add_action('init', 'add_dich_vu', 30); 
add_action('init', 'create_member'); 


if(function_exists('acf_add_options_page')) {
	$parent = acf_add_options_page(array(
		'page_title' 	=> 'Tùy chỉnh thông tin chung',
		'menu_title'	=> 'Tùy chỉnh',
		'position' => '59',
		'redirect' 		=> false,
		'icon_url' => 'dashicons-admin-generic'
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Tùy Chỉnh Liên hệ',
		'menu_title'	=> 'Liên hệ',
		'parent_slug' => $parent['menu_slug'],
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Tùy Chỉnh Trang Giới Thiệu',
		'menu_title'	=> 'Trang giới thiệu',
		'parent_slug' => $parent['menu_slug'],
	));
	
	$parent2 = acf_add_options_page(array(
		'page_title' 	=> 'hiden page option',
		'menu_title'	=> 'hiden-page-option',
		'position' => '59',
		'redirect' 		=> false,
		'icon_url' => 'dashicons-admin-generic'
	));
}

// add_action('admin_menu', 'custom_menu');

new WP_Pages(array(
    'title' => 'Liên Hệ',
    'name' => 'Liên Hệ',
    'slug' => 'contact',
    'icon'=> 'dashicons-phone',
    'order'=> 20
));

// new WP_Pages(array(
//     'title' => 'Tùy chỉnh hệ thống',
//     'name' => 'tùy chỉnh',
//     'slug' => 'hiden-page-option',
//     'icon'=> 'dashicons-phone',
//     'order'=> 20
// ));

