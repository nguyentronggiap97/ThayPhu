<?php

$_ID = get_current_user_id();

$customer_orders = get_posts( array(
    'numberposts' => -1,
    'meta_key'    => '_customer_user',
    'meta_value'  => get_current_user_id(),
    'post_type'   => wc_get_order_types(),
    'post_status' => array_keys( wc_get_order_statuses() ),
) );

?>
<div class="make-padding">
	<div class="account-subtitle">
		<h3>Lịch sử đơn hàng</h3>
	</div>
	<div class="historytable table-wrap">
	<?php if (!empty($customer_orders)){ ?>
		<table>
		<tr>
			<th>Đơn hàng</th>
			<th>Ngày</th>
			<th>Tình trạng thanh toán</th>
			<th>Tình trạng hoàn thành</th>
			<th>Tổng</th>
		</tr>
	<?php foreach ($customer_orders as $value): ?>
		<?php 
		$order = new WC_Order($value->ID);
		$dates = $order->get_date_created(); 
		$data =$order->get_data();
		?>

		<tr id="<?php echo $data['id'] ?>">
			<td><a href="<?php echo home_url().'/account?act=order-detail&&id='.$data['id'] ?>">#<?php echo $data['id'] ?></a></td>
			<td><span class="historytable_date"><?php echo date("d/m/Y H:i",strtotime($dates->date( 'c' ))) ?></span></td>
			<td><?php echo wc_get_order_status_name($data['status']) ?></td>
			<td>Chưa hoàn thành</td>
			<td><?php echo wc_price($data['total']); ?></td>
		</tr>
	<?php endforeach ?>
		</table>
	<?php }else{ ?>
		<h3>Hiện tại không có đơn hàng nào!</h3>
	<?php } ?>
	</div>
</div>