<?php 

$_ID = get_current_user_id();
if (isset($_POST['btn_submit'])) {
	$arr_post = array(
		'billing_phone' => $_POST['txt_phone'] ,
		'billing_email' => $_POST['txt_emailx'] ,
		'billing_address_1' => $_POST['txt_addres'] ,
		'billing_city' => $_POST['txt_city'] ,
		'billing_state' => $_POST['txt_state'] ,
		'billing_first_name' => $_POST['txt_first_name'] ,
		'billing_last_name' => $_POST['txt_last_name'] 
	);
	foreach ($arr_post as $key => $value) {
		update_user_meta( $_ID, $key, $value );
	}

	global $wp;

	echo '
	<script type="text/javascript">
		alert("Bạn đã thay đổi thông tin thành công!");
		window.location="'.$wp->request.'?act=address";
	</script>
	';
	die();
}



$arr =array(
	'phone' => get_user_meta( $_ID, 'billing_phone',true ),
	'email' => get_user_meta( $_ID, 'billing_email',true ),
	'addres' => get_user_meta( $_ID, 'billing_address_1',true ),
	'city' => get_user_meta( $_ID, 'billing_city',true ),
	'state' => get_user_meta( $_ID, 'billing_state',true ),
	'ho_dem' =>get_user_meta( $_ID, 'billing_first_name',true ),
	'ten' =>get_user_meta( $_ID, 'billing_last_name',true ) 
);

?>
	

<div class="address-detail__title">
	<h4>Địa chỉ này sẽ được sử dụng mặc định để thanh toán</h4>
</div>
<form id="addres-form" action="" method="POST">
	<div class="detail__input first-name dib">                        
		<p class="title">Họ<i class="fas fa-star-of-life"></i></p>
		<input type="text" id="first_name"  name="txt_first_name" value="<?php echo $arr['ho_dem'] ?>" />
	</div>
	<div class="detail__input last-name dib">
		<p class="title">Tên<i class="fas fa-star-of-life"></i></p>
		<input type="text" id="last_name" name="txt_last_name" value="<?php echo $arr['ten'] ?>" />
	</div>
	<div class="detail__input">
		<p class="title">Địa chỉ<i class="fas fa-star-of-life"></i></p>
		<input type="text" id="addres"  name="txt_addres" value="<?php echo $arr['addres'] ?>" />
	</div>
	<div class="detail__input first-name dib">                        
		<p class="title">Tỉnh/Thành<i class="fas fa-star-of-life"></i></p>
		<input type="text" id="city"  name="txt_city" value="<?php echo $arr['city'] ?>" />
	</div>
	<div class="detail__input last-name dib">
		<p class="title">Quận/Huyện<i class="fas fa-star-of-life"></i></p>
		<input type="text" id="state"  name="txt_state" value="<?php echo $arr['state'] ?>" />
	</div>
	<div class="detail__input">
		<p class="title">Số điện thoại<i class="fas fa-star-of-life"></i></p>
		<input type="text" id="phone"  name="txt_phone" value="<?php echo $arr['phone'] ?>" />
	</div>
	<div class="detail__input">
		<p class="title">Email<i class="fas fa-star-of-life"></i></p>
		<input type="text" id="emailx"  name="txt_emailx" value="<?php echo $arr['email'] ?>" />
	</div>
	<div class="detail__act"><input type="submit" name="btn_submit" value="Lưu"></div>
</form>