<?php 

$_ID  = $_GET['id'];
$order = wc_get_order( $_ID );
if(!$order){
    echo"
     <script type='text/javascript'>
 		window.location = '".home_url('/account' )."';
     </script>
    ";
    die();
}
$post = get_post_meta( $_ID, '_customer_user',  true );
if($post != get_current_user_id()){
    echo"
     <script type='text/javascript'>
 		window.location = '".home_url('/account' )."';
     </script>
    ";
    die();
}
$items =$order->get_items();
$data =$order->get_data();
$order_time = $order->get_date_created();
$arr_item = array(
	'ID' =>  $_GET['id'],
	'total' =>  $data['total'],
	'time' =>  $order_time->date('c'),
	'shipping_total' =>  $data['shipping_total'],
	'billing' =>  $data['billing'],
	'shipping' =>  $data['shipping'],
	'payment_method' =>  $data['payment_method'],
	'payment_method_title' =>  $data['payment_method_title'],
	'tax' => '',
);
foreach ($items as $key => $value) {
	$product =$value->get_data();
	$arr_item['items'][$product['product_id']]['name']  =$product['name'];
	$arr_item['items'][$product['product_id']]['quantity']  =$product['quantity'];
	$arr_item['items'][$product['product_id']]['total'] =$product['total'];
}

?>
<div class="make-padding">
	<div class="account-subtitle">
		<h3>Chi tiết đơn hàng</h3>
	</div>
	<p class="product_code">#<?php echo $arr_item['ID'] ?></p>
	<p class="time-order">Đặt vào: <span><?php echo date('d/m/Y H:i',strtotime($arr_item['time'])) ?></span></p>
	<div class="detailtable table-wrap">
		<table>
		<tr>
			<th>Sản phẩm</th>
			<th>Đơn giá</th>
			<th>Số lượng</th>
			<th>Tổng</th>
		</tr>
	<?php foreach ($arr_item['items'] as $key => $value): ?>
		
		
		<tr>
			<td><a href="<?php echo get_post_permalink( $key ); ?>"><?php echo $value['name'] ?></a></td>
			<td><?php echo wc_price($value['total']/$value['quantity']) ?></td>
			<td><?php echo $value['quantity'] ?></td>
			<td><?php echo wc_price($value['total']) ?></td>
		</tr>

	<?php endforeach ?>
		<tr>
			<td colspan="2">Tổng</td>
			<td colspan="2"><?php echo wc_price($arr_item['total'])  ?></td>
		</tr>
		</table>
	</div>
	</div>