<!DOCTYPE html>

<html lang="en-US">

<head>
	<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, shrink-to-fit=no, user-scalable=no"/>
	<script src="<?php echo TFT_URL ?>/public/includes/js/wp-emoji-release.min.js" type="text/javascript" defer=""></script>
	<style type="text/css">
		img.wp-smiley,
		img.emoji {
			display: inline !important;
			border: none !important;
			box-shadow: none !important;
			height: 1em !important;
			width: 1em !important;
			margin: 0 .07em !important;
			vertical-align: -0.1em !important;
			background: none !important;
			padding: 0 !important;
		}
	</style>
	<link rel="stylesheet" href="<?php echo TFT_URL ?>/public/includes/css/googlefont.css" type="text/css" media="all">
	<link rel="stylesheet" href="<?php echo TFT_URL ?>/public/includes/css/customizer.css" type="text/css" media="all">
	<link rel="stylesheet" href="<?php echo TFT_URL ?>/public/includes/css/animate.css" type="text/css" media="all">
	<link rel="stylesheet" href="<?php echo TFT_URL ?>/public/includes/css/effect.css" type="text/css" media="all">
	<link rel="stylesheet" href="<?php echo TFT_URL ?>/public/includes/fontawesome/fontawesome.min.css" type="text/css" media="all">
	<link rel="stylesheet" href="<?php echo TFT_URL ?>/public/includes/fontawesome/brands.min.css" type="text/css" media="all">
	<link rel="stylesheet" href="<?php echo TFT_URL ?>/public/includes/fontawesome/solid.min.css" type="text/css" media="all">
	<link rel="stylesheet" href="<?php echo TFT_URL ?>/public/includes/fontawesome/regular.css" type="text/css" media="all">
	<link rel="stylesheet" href="<?php echo TFT_URL ?>/public/includes/css/bootstrap.min.css" type="text/css" media="all">
	<link rel="stylesheet" href="<?php echo TFT_URL ?>/public/includes/css/style.min.css" type="text/css" media="all">
	<!-- <link rel="stylesheet" href="<?php echo TFT_URL ?>/public/includes/css/owl.carousel.css" type="text/css" media="all"> -->
	<link rel="stylesheet" href="<?php echo TFT_URL ?>/public/includes/css/styles.css" type="text/css" media="all">
    <link rel="stylesheet" href="<?php echo TFT_URL ?>/public/libs/owlcarousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo TFT_URL ?>/public/libs/owlcarousel/css/owl.theme.default.min.css">
	<style id="woocommerce-inline-inline-css" type="text/css">
		.woocommerce form .form-row .required {
			visibility: visible;
		}
	</style>
	<link rel="stylesheet" href="<?php echo TFT_URL ?>/public/includes/css/vw-style.css" type="text/css" media="all">
	<link rel="stylesheet" href="<?php echo TFT_URL ?>/public/includes/css/bootstrap.css" type="text/css" media="all">

	<noscript>
		<style>
			.woocommerce-product-gallery {
				opacity: 1 !important;
			}
		</style>
	</noscript>
	<style type="text/css">
		.recentcomments a {
			display: inline !important;
			padding: 0 !important;
			margin: 0 !important;
		}
	</style>
	<style type="text/css" id="wp-custom-css">
		li.buy_now {
			background-color: #c29965;
		}
		
		li.buy_now:hover a {
			color: #fff;
		}
	</style>
	<?php wp_head() ?>
</head>
<body data-rsssl="1" class="home page-template page-template-page-template page-template-home-page page-template-page-templatehome-page-php page page-id-217 wp-custom-logo woocommerce-js">
	<header id="masthead" class="site-header">
		<!-- before header hook -->
		<div id="header">
			<div class="container">
				<div class="row pt-1 pb-1">
					<div class="logo col-md-4 col-sm-12 col-12 text-sm-center text-md-left">
						<a href="vw-lawyer-attorney-pro/" class="custom-logo-link" rel="home" itemprop="url"><img width="240" height="66" src="includes/images/Logo.png" class="custom-logo" alt="Lawyer WordPress Theme" itemprop="logo"></a>
					</div>
					<?php
						$address1 = get_field('contact_addres_1','option');
						$address2 = get_field('contact_addres_2','option');
						$website = get_field('wf_contact_website','option');
						$mail = get_field('contact_mail','option');
						$phone = get_field('contact_phone','option');
						$time1 = get_field('contact_time_1','option');
						$time2 = get_field('contact_time_2','option');
						$map = get_field('google_map','option');
					?>
					<div class="contact_details col-md-8">
						<div class="row float-right w-100">
							<div class="col-lg-4 col-md-6 col-sm-6 small_media p-0">
								<div class="address media">
									<i class="fa fa-phone d-flex align-self-start" aria-hidden="true"></i>
									<div class="media-body">
										<p class="font-weight-bold hi_bold"><?php echo ($phone ?? ""); ?></p>
										<p class="hi_normal"><?php echo ($mail ?? ""); ?></p>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-6 col-sm-6 small_media">
								<div class="address media">
									<i class="fa fa-home d-flex align-self-start" aria-hidden="true"></i>
									<div class="media-body">
										<p class="font-weight-bold hi_bold"><?php echo ($address1 ?? ""); ?></p>
										<p class="hi_normal"><?php echo ($address2 ?? ""); ?></p>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-12 col-sm-12 small_media p-sm-0 pt-sm-3 pb-sm-3">
								<div class="address media">
									<i class="fas fa-clock d-flex align-self-start" aria-hidden="true"></i>
									<div class="media-body">
										<p class="font-weight-bold hi_bold"><?php echo ($time1 ?? ""); ?></p>
										<p class="hi_normal"><?php echo ($time2 ?? ""); ?></p>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
		<div class="menubar">
			<div class="container">
				<div class="row bg-media">
					<div class="innermenubox col-lg-8 col-md-6 col-2 p-md-0">
						<div class="vw_toggle-nav mobile-menu">
							<span onclick="openNav()"><i class="fas fa-bars"></i></span>
						</div>
						<div id="vw_mySidenav" class="vw_lawyer_pro_plugin_nav vw_lawyer_pro_plugin_sidenav">
							<nav id="vw_lawyer_pro_plugin_site-navigation" class="vw_lawyer_pro_plugin_main-navigation">
								<a href="javascript:void(0)" class="closebtn mobile-menu" onclick="closeNav()"><i class="fas fa-times"></i></a>
								<div class="menu clearfix">
									<?php
									wp_nav_menu(array(                                           //Hàm lấy ra 1 menu
										'theme_location' => 'primary-menu',   //lấy id của menu
										'menu_class' => 'clearfix mobile_nav sf-js-enabled sf-arrows',                 //class của menu
										'menu_id' => 'menu-menu-1',                            //id của menu
										'menu'=> 'primary-menu',// as theme_location
										'container' => false,                      // bỏ div "container "
										'items_wrap'      => '<ul id="menu-menu-1" class="clearfix mobile_nav sf-js-enabled sf-arrows">%3$s</ul>',
									));
									?>
								</div>
							</nav>
							<!-- #site-navigation -->
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="col-lg-4 col-md-6 col-10">
						<ul class="search-consult">
							<li class="vw_search-box">
								<span><i class="fas fa-search"></i></span>
							</li>
							<li class="consultation">
								<a href="vw-lawyer-attorney-pro/#"><i class="fas fa-headphones"></i><span>Tư vấn miễn phí</span></a>
							</li>
						</ul>
					</div>
				</div>
				<div class="vw_serach_outer">
					<div class="closepop"><i class="far fa-window-close"></i></div>
					<div class="vw_serach_inner">
						<form role="search" method="get" class="vw-search-form" action="<?php echo home_url()?? ""; ?>">
							<input type="search" id="" class="vw-search-field" placeholder="Type to search.." value="" name="s">
							<button type="submit" class="vw-search-submit"><span class="vw-screen-reader-text">Tìm kiếm</span>
								<span><i class="fas fa-search"></i></span></button>
							<input type="hidden" name="post_type" value="properties">
						</form>
					</div>
				</div>
			</div>
		</div>
	</header>
	