<?php
	
	/*---------------------------First highlight color-------------------*/

	$vw_lawyer_attorney_first_color = get_theme_mod('vw_lawyer_attorney_first_color');

	$custom_css = '';

	if($vw_lawyer_attorney_first_color != false){
		$custom_css .='.slider .carousel-control-next-icon i:hover, .slider .carousel-control-prev-icon i:hover, .hvr-sweep-to-right:before, input[type="submit"], .footer .custom-social-icons i:hover, .sidebar .custom-social-icons i:hover, input[type="submit"]:hover, .scrollup i, nav.woocommerce-MyAccount-navigation ul li, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .sidebar input[type="submit"], h1.entry-title, h1.page-title, .pagination .current, .pagination a:hover, .woocommerce span.onsale, .footer .tagcloud a:hover, .sidebar .tagcloud a:hover, #comments a.comment-reply-link{';
			$custom_css .='background-color: '.esc_html($vw_lawyer_attorney_first_color).';';
		$custom_css .='}';
	}
	if($vw_lawyer_attorney_first_color != false){
		$custom_css .='#comments input[type="submit"].submit, .sidebar ul li::before{';
			$custom_css .='background-color: '.esc_html($vw_lawyer_attorney_first_color).'!important;';
		$custom_css .='}';
	}
	if($vw_lawyer_attorney_first_color != false){
		$custom_css .='a, .contact p.diff-lay, .about h3, .choose h3, .footer h3, .copyright p, .post-navigation a:hover .post-title, .post-navigation a:focus .post-title, .sidebar h3, .postbox h4, .logo h1 a:hover, .entry-content a, .main-navigation a:hover, .main-navigation ul.sub-menu a:hover{';
			$custom_css .='color: '.esc_html($vw_lawyer_attorney_first_color).';';
		$custom_css .='}';
	}
	if($vw_lawyer_attorney_first_color != false){
		$custom_css .='.slider .carousel-control-next-icon i:hover, .slider .carousel-control-prev-icon i:hover, input[type="submit"]{';
			$custom_css .='border-color: '.esc_html($vw_lawyer_attorney_first_color).';';
		$custom_css .='}';
	}
	if($vw_lawyer_attorney_first_color != false){
		$custom_css .='hr.big, .footer-2, .main-navigation ul ul{';
			$custom_css .='border-top-color: '.esc_html($vw_lawyer_attorney_first_color).';';
		$custom_css .='}';
	}
	if($vw_lawyer_attorney_first_color != false){
		$custom_css .='.footer h3, .topbar, .sidebar h3, .main-navigation ul ul{';
			$custom_css .='border-bottom-color: '.esc_html($vw_lawyer_attorney_first_color).';';
		$custom_css .='}';
	}

	/*---------------------------Width Layout -------------------*/

	$theme_lay = get_theme_mod( 'vw_lawyer_attorney_width_option','Full Width');
    if($theme_lay == 'Boxed'){
		$custom_css .='body{';
			$custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$custom_css .='}';
	}else if($theme_lay == 'Wide Width'){
		$custom_css .='body{';
			$custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$custom_css .='}';
	}else if($theme_lay == 'Full Width'){
		$custom_css .='body{';
			$custom_css .='max-width: 100%;';
		$custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/

	$theme_lay = get_theme_mod( 'vw_lawyer_attorney_slider_opacity_color','0.5');
	if($theme_lay == '0'){
		$custom_css .='.slider img{';
			$custom_css .='opacity:0';
		$custom_css .='}';
		}else if($theme_lay == '0.1'){
		$custom_css .='.slider img{';
			$custom_css .='opacity:0.1';
		$custom_css .='}';
		}else if($theme_lay == '0.2'){
		$custom_css .='.slider img{';
			$custom_css .='opacity:0.2';
		$custom_css .='}';
		}else if($theme_lay == '0.3'){
		$custom_css .='.slider img{';
			$custom_css .='opacity:0.3';
		$custom_css .='}';
		}else if($theme_lay == '0.4'){
		$custom_css .='.slider img{';
			$custom_css .='opacity:0.4';
		$custom_css .='}';
		}else if($theme_lay == '0.5'){
		$custom_css .='.slider img{';
			$custom_css .='opacity:0.5';
		$custom_css .='}';
		}else if($theme_lay == '0.6'){
		$custom_css .='.slider img{';
			$custom_css .='opacity:0.6';
		$custom_css .='}';
		}else if($theme_lay == '0.7'){
		$custom_css .='.slider img{';
			$custom_css .='opacity:0.7';
		$custom_css .='}';
		}else if($theme_lay == '0.8'){
		$custom_css .='.slider img{';
			$custom_css .='opacity:0.8';
		$custom_css .='}';
		}else if($theme_lay == '0.9'){
		$custom_css .='.slider img{';
			$custom_css .='opacity:0.9';
		$custom_css .='}';
		}

	/*---------------------------Slider Content Layout -------------------*/

	$theme_lay = get_theme_mod( 'vw_lawyer_attorney_slider_content_option','Left');
    if($theme_lay == 'Left'){
		$custom_css .='.slider .carousel-caption, .slider .inner_carousel, .slider .inner_carousel h2{';
			$custom_css .='text-align:left; left:15%; right:45%;';
		$custom_css .='}';
	}else if($theme_lay == 'Center'){
		$custom_css .='.slider .carousel-caption, .slider .inner_carousel, .slider .inner_carousel h2{';
			$custom_css .='text-align:center; left:20%; right:20%;';
		$custom_css .='}';
	}else if($theme_lay == 'Right'){
		$custom_css .='.slider .carousel-caption, .slider .inner_carousel, .slider .inner_carousel h2{';
			$custom_css .='text-align:right; left:45%; right:15%;';
		$custom_css .='}';
	}