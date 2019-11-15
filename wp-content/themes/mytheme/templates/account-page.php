<?php 
/**
 * Template Name: Account Page
 */

if(!is_user_logged_in()) {
	wp_redirect(home_url());
	die();
}

$current_act = isset($_GET['act']) && !empty($_GET['act']) ? $_GET['act'] : 'order';

if($current_act=='logout') {
	wp_logout();
    echo '<script>window.location="'.home_url().'"</script>';
    die();
}

$nav_array = array(
	'order' => 'Đơn hàng',
	'detail' => 'Chi tiết tài khoản',
	'address' => 'Địa chỉ',
);


get_header(); ?>
	<h2>templates - account</h2>
<?php get_footer();