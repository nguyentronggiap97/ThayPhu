<?php 
?>

<!DOCTYPE html>
 <html>
 <head>
	<title></title>
 </head>
 <body>
	<?php
	$data =get_option( 'contact_data');	?>
	<div class="wrap">
		<table class="wp-list-table widefat fixed striped pages">
			<thead>
				<tr>
					<td style="width: 5%;">
						STT
					</td>
					<td>
						Email
					</td>
					<td>
						Thời gian gửi
					</td>
					<td style="width: 5%;">
						<input type="checkbox" id="check_all" name="">
					</td>
				</tr>
			</thead>
			<tbody>
				<?php 
				$stt =1;
				if(!empty($data)){
					foreach ( $data as $key => $value) {
					?>
						<tr id="key-<?php echo $key ?>">
							<td hidden ><input type="" name="id" id="id" value="<?php echo $key ?>"></td>
							<td><?php echo $stt ?></td>
							<td><?php echo $value['email'] ?></td>
							<td><?php echo $value['time'] ?></td>
							<td><input style="margin-left: 8px;" type="checkbox" id="<?php echo $key ?>" class="checkxxx" name=""></td>
						</tr>
					<?php	
					$stt++;
					} 
				}?>
				
				
			</tbody>
			<tfoot>
				<tr>
					<td colspan="4">
						<button class="button button-primary button-large btn_send_all" >Gửi đến tất cả</button>
						<button class="button button-primary button-large btn_send_all_checked" >Gửi đến những người đã chọn</button>
						<button class="button button-primary button-large btn_delete" style="float: right;" >Xóa những thông tin đã chọn</button>
						<div style="clear: both;"></div>
					</td>
				</tr>
			</tfoot>
			<script type="text/javascript">
					jQuery(document).ready(function($) {

						

						$('.btn_delete').click(function(event) {
							event.preventDefault();
							//var keyx=$(this).attr('id');
							var val = [];
							$('tbody :checkbox:checked').each(function(i){
								val[i] = $(this).attr('id');
							});
							console.log(val);
							console.log( JSON.stringify(val) );
							var res =JSON.stringify(val);

							var vld=confirm("Bạn chắc chắn muốn xóa chứ!");
							if (vld == true ) {
								$.ajax({
									url: '<?php echo admin_url( 'admin-ajax.php' ) ?>',
									type: 'POST',
									dataType: 'text',
									data: {
										key: val,
										action: 'ajax_delete_contact'
									 },
									success: function(data) {
										val.forEach(function(element) {
											$('#key-'+element).remove();
										});
										
										console.log(data);
									},
									error:function(data) {
										console.log("Thất bại: "+data);
										console.log(data);
									}
								});
							}
						});
						$('.btn_send_all_checked').click(function(event) {
							event.preventDefault();
							var vld=confirm("Bạn chắc chắn muốn gửi đến những người đã được chọn chứ!");
							var val = [];
							$('tbody :checkbox:checked').each(function(i){
								val[i] = $(this).attr('id');
							});
							console.log(val);
							if (vld == true ) {
								$.ajax({
									url: '<?php echo admin_url( 'admin-ajax.php' ) ?>',
									type: 'POST',
									dataType: 'html',
									data: {
										key: val,
										action: 'ajax_send_all_checked'
									 },
									success: function(data) {
										alert("Gửi mail thành công");
										console.log(data);
									},
									error:function(data) {
										console.log("Thất bại: "+data);
									}
								});
							}
						});
						$('.btn_send_all').click(function(event) {
							//event.preventDefault();
							var vld=confirm("Bạn chắc chắn muốn gửi chứ!");
							if (vld == true ) {
								$.ajax({
									url: '<?php echo admin_url( 'admin-ajax.php' ) ?>',
									type: 'POST',
									dataType: 'json',
									data: {
										action: 'ajax_send_all'
									 },
									success: function(data) {
										alert("Gửi mail thành công");
										console.log(data);
									},
									error:function(data) {
										console.log("Thất bại: "+data);
									}
								});
							}
						});

						$('#check_all').click(function(event) {
							if (!check_all) {
								console.log('true');
								$( "tbody tr td .checkxxx" ).prop( "checked", false );
							}
							else{
								console.log('flase');
								$( "tbody tr td .checkxxx" ).prop( "checked", true );
							}
							check_all=(!check_all);
						});
					});
				</script>
		</table>
	</div>
 </body>
</html>