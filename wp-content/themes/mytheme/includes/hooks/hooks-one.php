<?php 
/*
* @author : Nguyen Trong Giap
*/

// add_action( 'wf_home_hook','wf_home_page_banner', 10 );
// add_action( 'wf_home_hook','wf_home_page_banner', 15 );
add_action( 'wf_home_hook','wf_home_page_why_us_me', 20 );
add_action( 'wf_home_hook','wf_home_page_our_service', 25 );
add_action( 'wf_home_hook','wf_home_page_practice', 30 );
add_action( 'wf_home_hook', 'wf_home_page_how_work', 35);
add_action( 'wf_home_hook', 'wf_home_page_attorney', 40);
add_action( 'wf_home_hook', 'wf_home_page_key_to_success', 40);
add_action( 'wf_home_hook', 'wf_home_page_testimonials', 45);
add_action( 'wf_home_hook', 'wf_home_page_our_clients', 50);
add_action( 'wf_home_hook', 'wf_home_page_our_latest_post', 55);
add_action( 'wf_home_hook', 'wf_home_page_our_newsletter', 60);
add_action( 'wf_home_hook', 'wf_home_page_our_faq', 65);
// add_action( 'wf_before_single_product','wf_before_single_product_banner', 10);
// add_action( 'wf_single_product_left', 'wf_single_product_left_product',10 );
// add_action( 'wf_single_product_right','wf_single_product_right_categories', 20);
// add_action( 'wf_single_product_right','wf_single_product_right_find_the_most', 30);


// add_action( 'wf_archive_single_product','wf_archive_single_product_banner',10);
// add_action( 'wf_archive_product_left','wf_single_product_right_categories', 10);
// add_action( 'wf_archive_product_left','wf_single_product_right_find_the_most', 15);



function wf_home_page_banner() { 
	$data = get_field_object('home_banner', 9);
	$_value = $data['value'];
	?>
	<section id="slider">
		<div id="carouselExampleIndicators" class="carousel slide carousel-fade " data-ride="carousel">
			<div class="carousel-innerx" role="listbox">
			
				<?php foreach ($_value as $key => $value) { ?>
					<div class="item-x">
						<img src="<?php echo ($value['image']['url'] ?? "") ?>" alt="1" title="#slidecaption1">
						<div class="carousel-caption d-none d-md-block">
							<div class="inner_carousel">
								<h5 class="font-weight-bold"><?php echo $value['title'] ?></h5>
								<div class="font-weight-bold prop_desc"><?php echo $value['content'] ?></p></div>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
			<!-- <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-long-arrow-alt-left"></i></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-long-arrow-alt-right"></i></span>
				<span class="sr-only">Next</span>
			</a> -->
		</div>
		<div class="clearfix"></div>
	</section>

	<?php 
}

function wf_home_page_why_us_me(){
	$title = get_field("about_us_title", 9);
	$content = get_field("about_us_content", 9);
	$newTitle = str_replace(["{{", "}}"], ['<span class="heightlight_color">','</span>'], $title);

	$dataList = get_field("about_us_items", 9);
	// echo '<pre>'.__FILE__.'::'.__METHOD__.'('.__LINE__.')<br>';
	// 	print_r($dataList);
	// echo '</pre>';
	?>
	<!-- <section id="sec_consultation" class="darkbox" style="">
		<div class="sec_innerbox pt-3 pb-3">
			<div class="container">
				<div class="row">
					<div class="media col-lg-10 col-md-8">
						<img class="d-flex align-self-center mr-3" src="<?php echo TFT_URL ?>/public/includes/images/why-choose-us-icon-2.png" alt="Image">
						<div class="media-body">
							<h3 class="mt-0">If you have any legal problem in your life.... We are Available</h3>
						</div>
					</div>
					<div class="col-lg-2 col-md-4 d-flex align-self-center custom_btn">
						<a class="btn btn-outline-secondary vw_lawyer_free_consultation text-sm-center" href="vw-lawyer-attorney-pro/#">Free Consultation</a>
					</div>
				</div>
			</div>
		</div>
	</section> -->
	<section id="about" style="">
		<div class="inner_sec">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="about-inner">
							<h2><?php echo $newTitle ?></h2>
							<div class="about-editor"><?php echo $content ?></div>
							<a class="btn btn-outline-secondary dis_more" href="#">Tư vấn miễn phí</a>
						</div>
					</div>
					<div class="col-md-6 whychoose_us" style="background-image: url(<?php echo TFT_URL ?>/public/includes/images/why-choose-us-bgimg.jpg); height: 492px; overflow-y: scroll;">
						<h6>Title</h6>

						<h2>Tại sao chọn chúng tôi</h2>
						<div class="why_choose_us">
						<?php foreach ((array)$dataList as $key => $value) { ?>
							<div class="why_inner">
								<div class="counter_wrapper row">
									<div class="col-md-3">
										<img class="feature-img" src="<?php echo ($value['image']['url'] ?? "") ?>" alt="Image">
									</div>
									<div class="why_para col-md-9 pl-0">
										<h4 class="pt-0"><?php echo $value['title'] ?></h4>
										<p><?php echo $value['content'] ?></p>
									</div>
								</div>
							</div>
						<?php } ?>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</section>
	<?php
}

function wf_home_page_our_service(){
	$service = get_category(2);
	$list_services = get_posts(['category' => 2]);
	
	?>
	<section id="our_services" style="background-image:url(<?php echo TFT_URL ?>/public/includes/images/services-bg.jpg)">
		<div class="innerbox">
			<div class="container">
				<h2><span class="heading2"><?php echo ($wp_foreach->name ?? "Our Services"); ?></span></h2>
				<div class="row">
					<?php foreach($list_services as $key => $value){ 
					$icon = get_field('post_services', $value->ID);
					?>
					<div class="our_services_outer col-lg-4 col-md-6 col-sm-6">
						<div class="services_inner">
							<a href="<?php echo get_permalink($value->ID); ?>">
								<div class="row hover_border">
									<div class="col-md-3 no-pad">
										<img class="" src="<?php echo ($icon['url'] ?? (TFT_URL."/public/includes/images/services9.png")); ?>
										">
									</div>
									<div class="col-md-9">
										<p class="mt-0"><?php echo ($value->post_title ?? ""); ?></p>
									</div>
								</div>
							</a>
						</div>
					</div>
					<?php } ?>

					<div class="view-more">
						<a class="btn btn-outline-secondary" href="<?php echo get_permalink($value->ID) ?>">View More Services</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<?php
}


function wf_home_page_practice() {
	$title = get_field("practice_big_title", 9);
	$dataList = get_field("practice_items", 9);
	?>
	<section id="practice" style="">
		<div class="inner_sec">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<div class="about-inner">
							<h2><span class="heading2"><?= $title ?? "Khu vực hoạt động" ?></span></h2>
							<ul class="nav nav-pills nav-justified">
							<? $stt = 0; ?>
							<?php foreach ((array)$dataList as $key => $value) { ?>
								<li class="nav-item">
									<a class="nav-link <?php echo ($stt == 0 ? "active" : "") ?>" href="#practice_area<?php echo ++$stt ?>" role="tab" data-toggle="tab"><?php echo $value['title'] ?></a>
								</li>
							<?php } ?>
							</ul>
							<div class="tab-content">
							<? $stt1 = 0; ?>
								<?php foreach ((array)$dataList as $key => $value) { ?>
								<div role="tabpanel" class="outer_tab mt-4 tab-pane fade <?php echo ($stt1 == 0 ? "active show" : "") ?>" id="practice_area<?php echo ++$stt1 ?>">
									<div class="practice-editor">
										<?php echo $value['content'] ?>
									</div>
								</div>
								<?php } ?>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="consultation p-3 pt-4 pb-4" style="background-image:url(<?php echo TFT_URL ?>/public/includes/images/Free-case-consultation.jpg)">
							<h5>Free Case Consultation</h5>
							<div role="form" class="wpcf7" id="wpcf7-f93-o1" lang="en-US" dir="ltr">
								<div class="screen-reader-response"></div>
								<div>
									<p>
										<label> Name (*)
										<br>
										<span class="wpcf7-form-control-wrap your-name"><input type="text" name="your-name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false"></span> </label>
									</p>
									<p>
										<label> Email (*)
										<br>
										<span class="wpcf7-form-control-wrap your-email"><input type="email" name="your-email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false"></span> </label>
									</p>
									<p>
										<label> Subject
										<br>
										<span class="wpcf7-form-control-wrap your-subject"><input type="text" name="your-subject" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false"></span> </label>
									</p>
									<p>
										<input type="submit" value="Gửi" class="wpcf7-form-control wpcf7-submit"><span class="ajax-loader"></span></p>
									<div class="wpcf7-response-output wpcf7-display-none"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</section>
	<?php
}


function wf_home_page_how_work(){ 
	$title = get_field("how_work_big_title", 9);
	$dataList = get_field("how_work_items", 9);
	
	?>
	<section id="how_it_work" style="background-image:url(<?php echo TFT_URL ?>/public/includes/images/why-choose-us-bgimg.jpg)">
		<div class="">
			<div class="container">
				<div class="row how_inner">
					<div class="col-md-4 how_box_outer">
						<div class="how_box  mt-4 mb-4">
							<div class="col-md-4 how_title">
								<div class="mid-content">
									<h2><span class="heading2"><?php echo ($title ?? "How it work"); ?></span></h2>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-8">
						<div class="how_content owl-carousel mt-4 mb-4">						
							<?php foreach ((array)$dataList as $key => $value) { ?>
							<div class="how_inner">
								<div class="how_wrapper">
									<img class="feature-img mt-3 mb-3" src="<?php echo ($value['image']['url'] ?? "") ?>" alt="Image"/>
									<h6 class="pt-0 mt-3 mb-3 text-uppercase"><?php echo ($value['title'] ?? "") ?></h6>
									<p class="mt-3 mb-3"><?php echo ($value['content'] ?? "") ?></p>
									<!-- <a class="btn btn-outline-secondary dis_more" href="#">Read More</a> -->
								</div>
								<span id="itwork-loop">true</span>
							</div>							
							<?php } ?>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</section>
	<?php
}


function wf_home_page_attorney(){ 

	
	
	$list_member = new WP_Query([
		'post_type' => 'thanh-vien',
		'tax_query' => array(                 
			'relation' => 'AND',                  
			  array(
				'taxonomy' => 'chuc-vu',            
				'field' => 'slug',            
				'terms' => array( 'luat-su' ),
				'include_children' => true,       
				'operator' => 'IN'                
			  )
			),
	]);
	?>
	<section id="attorney" style="">
		<div class="innerbox">
			<div class="container">
				<h2><span class="heading2">Our Attorneys</span></h2>
				<div class="owl-carousel owl-loaded owl-drag">
					<div class="owl-stage-outer">
						<div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1120px;">
						
							<?php 
							while( $list_member->have_posts()){
								$list_member->the_post();
								$data = $post;
								$terms = get_the_terms($post->ID, 'chuc-vu');
								$name_terms = "";
								foreach ($terms as $key => $value) {
									$name_terms .= $value->name . ($key != count($terms)-1 ? ', ': '');
								}
								$more_infor = get_field('info-members', $post->ID);
							?>
							<div class="owl-item active" style="width: 363.333px; margin-right: 10px;">
								<div class="">
									<div class="attorneys_box">
										<div class="image-box ">
											<img width="370" height="370" src="<?php echo (!empty(get_the_post_thumbnail_url($data->ID)) ? get_the_post_thumbnail_url($data->ID) : (TFT_URL . "/public/includes/images/default-image.jpg")); ?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" sizes="(max-width: 370px) 100vw, 370px">
											<div class="attorneys-box w-100 float-left">
											<h4 class="attorney_name"><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
											<p><?php echo $name_terms ?? "" ?></p>
											</div>
										</div>
										<div class="content_box w-100 float-left">
											<div class="short_text pt-3"><?php echo get_the_excerpt() ?? "" ?></div>
											<div class="about-socialbox pt-3">
												<?php echo "<p>" . $more_infor['phone'] . "</p>" ?? "" ?>
												<div class="att_socialbox">
													<?php 
													$_count = 0;
													foreach (($more_infor['link'] ?? []) as $key => $value) {
														if(empty($value)) continue;
														echo "<a class='' href='$value target='_blank'><i class='fab fa-$key'></i></a>";
														++$_count;
														if($_count == 5) echo "</br>";
													}
													?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php } ?>
						</div>
					</div>
					<div class="owl-nav disabled">
						<button type="button" role="presentation" class="owl-prev disabled"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
						<button type="button" role="presentation" class="owl-next disabled"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
					</div>
					<div class="owl-dots disabled">
						<button role="button" class="owl-dot active"><span></span></button>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php
}


function wf_home_page_key_to_success(){ 
	
	$dataList = get_field('key_to_success', 9);
	$count = 1;
	?>
	<section id="key_to_success" style="background-image:url(<?php echo TFT_URL ?>/public/includes/images/why-choose-us-bgimg.jpg)">
    <div class="">
        <div class="container">
            <div class="row key_inner">
                <div class="col-md-4 key_box_outer">
                    <div class="how_box  mt-4 mb-4">
                        <div class="col-md-4 key_title">
                            <div class="mid-content">
                                <h2><span class="heading2">Key To Success</span></h2>
                                <p>Lorem Ipsum is simply dummy text of the printing</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="how_content owl-carousel row mt-4 mb-4">
						<?php foreach($dataList as $key => $value){ ?>
							<div class="how_inner">
								<div class="key_wrapper">
									<img class="feature-img mt-3 mb-3" src="<?php echo ($value['dashicon']['url'] ?? ""); ?>" alt="Image" />
									<h2 class="pt-0 mt-3 mb-3 text-uppercase"><?php echo ($value['number'] ?? ""); ?></h2>
									<p class="mt-3 mb-3"><?php echo ($value['title'] ?? ""); ?></p>
								</div>
							</div>
						<?php } ?>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</section>
	<?php
}


function wf_home_page_testimonials(){ 
	
	$args = array(
		'post_type' => 'thanh-vien',
		'tax_query' => array(
			array(
			'taxonomy' => 'chuc-vu',
			'field' => 'term_id',
			'terms' => 3
				)
			)
		);
		$query = new WP_Query( $args );
		$list_posts = $query->posts;
	?>
	<section id="testimonials" style="">
		<div class="innerbox">
			<div class="container">
				<h2><span class="heading2">Our Testimonials</span></h2>
				<div class="owl-carousel">
					<?php foreach($list_posts as $key => $value){ ?>
						<div class="active">
							<div class="testimonial_box w-100 mb-3">
								<div class="content_box w-100">
									<div class="short_text pt-3">
										<p>Te obtinuit ut adepto satis somno. Aliisque institoribus iter deliciae vivet vita. Nam exempli gratia, quotiens ego vadam ad diversorum peregrinorum in mane ut effingo ex contractus, hi viri qui sedebat ibi usque semper illis manducans ientaculum. Solum cum bulla ut debui; EGO youd adepto a macula proiciendiSed quis scit si forte quod esset optima res pro me. </p>
									</div>
								</div>
								<div class="image-box media">
									<img class="d-flex align-self-center mr-3" src="<?php echo (!empty(get_the_post_thumbnail_url($value->ID)) ? get_the_post_thumbnail_url($value->ID) : (TFT_URL . "/public/includes/images/default-image.jpg")); ?>">
									<div class="testimonial-box media-body">
										<h4 class="testimonial_name mt-0"><a href="<?php echo get_permalink($value->ID); ?>"><?php echo $value->post_title ?? "" ?></a></h4>
										<p></p>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
		</div>
	</section>
	<?php
}


function wf_home_page_our_clients(){ 
	$title = get_field("home_our_clients_title", 9);
	$content = get_field("home_our_clients_content", 9);
	$dataList = get_field("home_our_clients", 9);
	?>
	<section id="our_clients" style="background-image:url(<?php echo TFT_URL ?>/public/includes/images/why-choose-us-bgimg.jpg)">
		<div class="">
			<div class="container">
				<div class="row client_inner">
					<div class="col-md-4 client_box_outer">
						<div class="how_box  mt-4 mb-t mb-4">
							<div class="col-md-4 client_title">
								<div class="mid-content">
									<h2><span class="heading2"><?php echo $title ?? ""; ?></span></h2>
									<p><?php echo $content ?? ""; ?></p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-8">
						<div class="how_content owl-carousel row mt-5 mb-5">
							<?php foreach ((array)$dataList as $key => $value) { ?>
								<div class="how_inner">
									<div class="how_wrapper">
										<img class="feature-img mt-3 mb-3" src="<?php echo ($value['image']['url'] ?? "") ?>" alt="Image" />
										<p class="mt-3 mb-3"><?php echo $value['title'] ?? ""; ?></p>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</section>
	<?php
}


function wf_home_page_our_latest_post(){ 
	
	$list_posts = get_posts(['numberposts' => 5]);
	?>
	<section id="latest_post" style="">
		<div class="innerbox">
			<div class="container">
				<h2><span class="heading2">Latest Post</span></h2>
				<div class="owl-carousel owl-loaded owl-drag">

					<div class="owl-stage-outer">
						<div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1120px;">
							<?php foreach($list_posts as $key => $value){ ?>
								<div class="owl-item active" style="width: 363.333px; margin-right: 10px;">
									<div class="active">
										<div class="latest_post_box">
											<div class="image-box">
												<img width="370" height="266" src="<?php echo (!empty(get_the_post_thumbnail_url($value->ID)) ? get_the_post_thumbnail_url($value->ID) : (TFT_URL . "/public/includes/images/default-image.jpg")); ?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" sizes="(max-width: 370px) 100vw, 370px">
												<div class="alatest_post-box w-100 float-left">
													<h4 class="latest_post_name"><a href="<?php echo get_permalink($value->ID); ?>"><?php echo $value->post_title ?? "" ?></a></h4>
													<div class="row m-0 border_box">
														<div class="col-lg-4 col-md-4 col-3 p-0">
															<span class="entry-date datebox"><i class="fa fa-calendar" aria-hidden="true"></i><?php echo date("M ,d ,Y", strtotime($value->post_date)); ?></span>
														</div>
														<div class="col-lg-3 col-md-3 col-4 p-0">
															<span class="main-box">
																<div class="entry-author"><i class="fas fa-user" aria-hidden="true"></i><?php echo (get_author_name($value->post_author) ?? "admin"); ?></div>
															</span>
														</div>
														<div class="col-lg-5 col-md-5 col-5 p-0">
															<span class="main-box">
																<div class="entry-comments"><i class="fa fa-comment" aria-hidden="true"></i><?php echo (get_comments_number($value->ID) ?? 0); ?> comments</div>
															</span>
														</div>
													</div>
												</div>
											</div>

											<div class="content_box w-100 float-left">
												<div class="short_text pt-3"><?php echo ($value->post_excerpt ?? ""); ?></div>
												<a href="<?php echo get_permalink($value->ID); ?>">Read More<i class="ml-2 mt-3 fas fa-long-arrow-alt-right"></i></a>
											</div>

										</div>
									</div>
								</div>
							<?php } ?>

						</div>
					</div>
					<div class="owl-nav disabled">
						<button type="button" role="presentation" class="owl-prev disabled"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
						<button type="button" role="presentation" class="owl-next disabled"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
					</div>
					<div class="owl-dots disabled">
						<button role="button" class="owl-dot active"><span></span></button>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php
}


function wf_home_page_our_newsletter(){ 
	?>
	<section id="newsletter" style="background-image:url(<?php echo TFT_URL ?>/public/includes/images/why-choose-us-bgimg.jpg)">
		<div class="">
			<div class="container">
				<div class="row news_inner">
					<div class="col-md-4 news_box_outer">
						<div class="how_box  mt-4 mb-4">
							<div class="col-md-4 news_title">
								<div class="mid-content">
									<h2><span class="heading2">Newsletter</span></h2>
									<p>Te obtinuit ut adepto satis somno.</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-8">
						<div class="news_content mt-4 mb-4">
							<div role="form" class="wpcf7" id="wpcf7-f152-o2" lang="en-US" dir="ltr">
								<div class="screen-reader-response"></div>
								<form action="vw-lawyer-attorney-pro/#wpcf7-f152-o2" method="post" class="wpcf7-form" novalidate="novalidate">
									<div style="display: none;">
										<input type="hidden" name="_wpcf7" value="152">
										<input type="hidden" name="_wpcf7_version" value="5.1.1">
										<input type="hidden" name="_wpcf7_locale" value="en_US">
										<input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f152-o2">
										<input type="hidden" name="_wpcf7_container_post" value="0">
										<input type="hidden" name="g-recaptcha-response" value="">
									</div>
									<p>
										<label> Your Email (required)
											<br>
											<span class="wpcf7-form-control-wrap your-email"><input type="email" name="your-email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false"></span> </label>
										<br>
										<input type="submit" value="Send" class="wpcf7-form-control wpcf7-submit"><span class="ajax-loader"></span></p>
									<div class="wpcf7-response-output wpcf7-display-none"></div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</section>
	<?php
}


function wf_home_page_our_faq(){ 
	$dataList = get_field('list_question', 127);
	$count = 1;
	?>
	<section id="testimonials" style="">
		<div class="innerbox">
			<div class="container">
				<h2><span class="heading2">Our Faq</span></h2>
				<div id="accordion" class="row">
					<?php foreach($dataList as $key => $value){ ?>
					<div class="panel-group col-md-6 w-100 mb-3">
						<div class="panel">
							<div class="panel-heading">
								<h4 class="panel-title">
								<a href="#panelBody<?php echo ++$count; ?>" class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion"><i class="fas fa-plus"></i><?php echo ($value['title'] ?? ""); ?></a>
								</h4>
							</div>
							<div id="panelBody<?php echo $count; ?>" class="panel-collapse collapse in">
								<div class="panel-body">
									<p>
										<p><?php echo ($value['content'] ?? ""); ?></p>
									</p>
								</div>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
		</div>
	</section>
	<?php
}

function wf_single_product_left_product(){
	
	?>
	<?php
}


function wf_single_product_right_categories() {	
	$terms = get_terms( 'product_cat', array(
	    'hide_empty' => false,
	) );
    $parent=array();
    foreach ($terms as $value) {
    	if($value->parent==0){
    		$parent[$value->term_id]['name']=$value->name;
    		$parent[$value->term_id]['slug']=$value->slug;
    	}else{
    		$parent[$value->parent]['children'][$value->term_id]=$value;
    	}
    }
	?>

	<div class="col-sm-3 float-left">
		<div class="filter">
			<div class="filter__title">
				<h1 class="title--default">Danh mục</h1>
			</div>

			

			<ul class="filter__choose">

			<?php foreach ($parent as $key => $value): ?>
				<li><a href="<?php echo get_term_link( $key,'product_cat' ) ?>"> <span><?php echo $value['name'] ?></span><i class="fas fa-caret-left float-right"></i></a>
				<?php  if (isset($value['children'])) { ?>
					<ul class="menu2">
					<?php foreach ($value['children'] as $child) { ?>	
						<li ><a href="<?php echo get_term_link( $child->term_id,'product_cat' ) ?>"><?php echo $child->name ?></a></li>
					
					<?php } ?>
					</ul>
				<?php } ?>
				</li>
			<?php endforeach ?>
			</ul>
		</div>		
	<?php
}


function wf_single_product_right_find_the_most(){
	$query_args = array(
        'post_type' => 'product',
        'post_status' => 'publish',
        'ignore_sticky_posts' => 1,
        'posts_per_page' => 4,
        'columns' => '4',
        'fields' => 'ids',
        'meta_key' => 'total_sales',
        'orderby' => 'meta_value_num',
        'meta_query' => WC()->query->get_meta_query()
    );

	$best_sell_products_query = get_posts($query_args);	?>

			<div class="find-more">
				<div class="find-more__title">
					<h1 class="title--default">Tìm nhiều nhất</h1>
				</div>
				<div class="find-more__porduct">
					<?php foreach ($best_sell_products_query as $prd):
						$_product = wc_get_product($prd);?>
						<div class="lated-item">
							<div class="lated-item__thumbnail"><img src="<?php echo get_the_post_thumbnail_url($prd, 'tw_post_sidebar') ?>" alt="" /></div>
							<div class="lated-item__intro">
								<p><a href="<?php echo $_product->get_permalink() ?>" title="<?php echo $_product->get_name() ?>"><b><?php echo $_product->get_name() ?></b></a></p><span class="price"><?php echo wc_price($_product->get_price())  ?></span>
							</div>
							<div class="clearfix"></div>
						</div>
					<?php endforeach ?>
				</div>
			</div>
		</div>

	<?php
}
