<?php
	$current_user = wp_get_current_user();
	$current_user_ID = $current_user->ID;

	$current_user_first_name = get_user_meta( $current_user_ID, 'billing_first_name',true );
	$current_user_last_name = get_user_meta( $current_user_ID, 'billing_last_name',true );

	if($_SERVER['REQUEST_METHOD']=='POST') {
		$current_user_pwd = $current_user->data->user_pass;

		if($current_user_first_name != trim($_POST['user_first_name']) && !empty($_POST['user_first_name'])) {
			update_user_meta($current_user_ID, 'billing_first_name', $_POST['user_first_name']);
		}

		if($current_user_first_name != trim($_POST['user_first_name']) && !empty($_POST['user_last_name'])) {
			update_user_meta($current_user_ID, 'billing_last_name', $_POST['user_last_name']);
		}

		if(!empty($_POST['current_password']) && !empty($_POST['new_password']) && !empty($_POST['retype_password'])) {
			if($_POST['new_password'] != $_POST['retype_password']) {
				echo '<script>alert("Mật khẩu mới không trùng nhau!");</script>';
			} else if(wp_check_password( $_POST['current_password'], $current_user_pwd, $current_user_ID)) {
				wp_set_password($_POST['new_password'], $current_user_ID);
				echo '<script>alert("Bạn đã thay đổi mật khẩu thành công! Vui lòng đăng nhập lại.");window.location="'.home_url().'";</script>';
			} else {
				echo '<script>alert("Mật khẩu cũ không chính xác!");</script>';
			}
		}
		echo '<script>window.location="'.$wp->request.'?act=detail"</script>';
		die();
	}

?>
<form action="" method="POST">
	<div class="detail__input first-name dib">                        
		<p class="title">Họ<i class="fas fa-star-of-life"></i></p>
		<input type="text" value="<?php echo $current_user_first_name ?>" name="user_first_name"/>
	</div>
	<div class="detail__input last-name dib">
		<p class="title">Tên<i class="fas fa-star-of-life"></i></p>
		<input type="text" value="<?php echo $current_user_last_name ?>" name="user_last_name"/>
	</div>
	<div class="detail__email">
		<p class="title">Email<i class="fas fa-star-of-life"></i></p>
		<p><?php echo $current_user->data->user_email ?></p>
	</div>
	<div class="change-pass">
		<div class="change-pass__title">
			<p>Thay đổi mật khẩu</p>
		</div>
		<div class="detail__input">
			<p class="title">Mật khẩu hiện tại</p>
			<input type="password" name="current_password"/>
		</div>
		<div class="detail__input">
			<p class="title">Mật khẩu mới</p>
			<input type="password"  name="new_password"/>
		</div>
		<div class="detail__input">
			<p class="title">Nhập lại mật khẩu mới</p>
			<input type="password"  name="retype_password"/>
		</div>
	</div>
	<div class="detail__act">
		<button type="submit">Lưu thay đổi</button>
	</div>
</form>