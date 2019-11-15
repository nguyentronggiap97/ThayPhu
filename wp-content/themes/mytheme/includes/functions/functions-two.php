<?php 


function hidden_in_admin_page($page = 'hiden-page-option')
{
	?>
	<script type="text/javascript" src="<?php echo TFT_URL ?>/public/includes/js/jquery.js"></script>
	<script>
		$('#toplevel_page_acf-options-hiden-page-option').remove();			
	</script>
	<style>
		#toplevel_page_acf-options-hiden-page-option{
			display: none;
		}
	</style>
	<?php

	
	$data_page = get_field('list_page_unremove', 'option');
	$data_post = get_field('list_post_unremove', 'option');
	$data_cate = get_field('list_cate_unremove', 'option');
	echo '<script type="text/javascript">
		$( document ).ready(function(){
	';
	foreach ($data_page as $key => $value) {
		echo "\n$('table.pages .post-".$value." span.trash').remove();\n
		if($('#post_ID').val() == ".$value."){\n
			$('#post').find('#delete-action').remove();\n
		}\n
		";
	}
	foreach ($data_post as $key => $value) {
		echo "\n//$('table.posts #post-".$value." span.trash').remove();\n
		if($('#post_ID').val() == ".$value."){\n
			$('#post').find('#delete-action').remove();\n
		}\n
		";
	}
	foreach ($data_cate as $key => $value) {
		echo "
			\n$('table.tags #tag-".$value." span.delete').remove();\n
			if($('#edittag').children('input[name=\"tag_ID\"]').val() == ".$value."){\n
				$('#edittag').find('span#delete-link').remove();\n
			}\n
		";
	}
	echo "
	});
	</script>";

	echo '<style>';
	foreach ($data_page as $key => $value) {
		echo "
		table.pages .post-".$value." span.trash{
			display:none;
		}
		";
	}
	foreach ($data_post as $key => $value) {
		echo "
		table.posts .post-".$value." span.trash{
			display:none;
		}
		";
	}
	foreach ($data_cate as $key => $value) {
		echo "
		table.tags #tag-".$value." span.delete{
			display:none;
		}
		";
	}
	echo "</style>";

}


add_action('admin_enqueue_scripts', 'hidden_in_admin_page');
// hidden_in_admin_page();