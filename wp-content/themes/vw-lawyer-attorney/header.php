<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content-vw">
 *
 * @package VW Lawyer Attorney
 */

?><!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <link rel="profile" href="<?php echo esc_url( __( 'http://gmpg.org/xfn/11', 'vw-lawyer-attorney' ) ); ?>">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <?php
    $vw_lawyer_attorney_search_hide_show = get_theme_mod( 'vw_lawyer_attorney_search_hide_show' );

      if ( 'Disable' == $vw_lawyer_attorney_search_hide_show ) {
        $colmd = 'col-lg-12 col-md-12';
      } else { 
        $colmd = 'col-lg-11 col-md-10 col-6';
      } 
  ?>

<header role="banner">
  <a class="screen-reader-text skip-link" href="#maincontent"><?php esc_html_e( 'Skip to content', 'vw-lawyer-attorney' ); ?></a>
  <div class="topbar">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-3">
          <div class="logo">        
            <?php if( has_custom_logo() ){ vw_lawyer_attorney_the_custom_logo();
               }else{ ?>
              <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
              <?php $description = get_bloginfo( 'description', 'display' );
              if ( $description || is_customize_preview() ) : ?> 
                <p class="site-description"><?php echo esc_html($description); ?></p>       
            <?php endif; }?>
          </div>
        </div>        
        <div class="col-lg-9 col-md-9">
          <div class="contact">
            <div class="row">
              <div class="col-lg-4 col-md-4 ">
                <?php if( get_theme_mod( 'vw_lawyer_attorney_call','' ) != '') { ?>
                  <div class="row m-0">
                    <div class="col-lg-3 col-md-3 p-0">
                      <img src="<?php echo esc_attr( get_template_directory_uri()) ?>/images/icon2.png" alt="Call Image" role="img">
                    </div>
                    <div class="col-lg-9 col-md-9 call-add">
                      <p class="diff-lay"><?php echo esc_html( get_theme_mod('vw_lawyer_attorney_call','') ); ?></p>
                      <p><?php echo esc_html( get_theme_mod('vw_lawyer_attorney_call1','') ); ?></p>         
                    </div>
                  </div>
                <?php }?>
              </div>
              <div class="col-lg-4 col-md-4">
                <?php if( get_theme_mod( 'vw_lawyer_attorney_location','' ) != '') { ?>
                  <div class="row m-0">
                    <div class="col-lg-3 col-md-3 p-0">
                        <img src="<?php echo esc_attr( get_template_directory_uri() ) ?>/images/icon1.png" alt="Location Image" role="img">
                    </div>
                    <div class="col-lg-9 col-md-9 call-add">              
                      <p class="diff-lay"><?php echo esc_html( get_theme_mod('vw_lawyer_attorney_location','') ); ?></p>
                      <p><?php echo esc_html( get_theme_mod('vw_lawyer_attorney_location1','') ); ?></p>             
                    </div>
                  </div>
                <?php }?>
              </div>
              <div class="col-lg-4 col-md-4 p-0">
                <?php if( get_theme_mod( 'vw_lawyer_attorney_time','' ) != '') { ?>
                  <div class="row m-0">
                    <div class="col-lg-3 col-md-3 p-0">
                        <img src="<?php echo esc_attr( get_template_directory_uri() ) ?>/images/icon3.png" alt="Time Image" role="img">
                    </div>
                    <div class="col-lg-9 col-md-9">            
                      <p class="diff-lay"><?php echo esc_html( get_theme_mod('vw_lawyer_attorney_time','') ); ?></p>
                      <p><?php echo esc_html( get_theme_mod('vw_lawyer_attorney_time1','') ); ?></p>
                    </div>
                  </div>
                <?php }?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>
  </div>
  <div class="header <?php if( get_theme_mod( 'vw_lawyer_attorney_sticky_header') != '') { ?> header-sticky"<?php } else { ?>close-sticky <?php } ?>">
    <div class="container">
      <div class="row m-0">
        <div class="<?php echo esc_html( $colmd ); ?>">
          <div class="toggle-nav mobile-menu">
            <button onclick="menu_openNav()"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Button','vw-lawyer-attorney'); ?></span></button>
          </div> 
          <div id="mySidenav" class="nav sidenav">
            <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'vw-lawyer-attorney' ); ?>">
              <a href="javascript:void(0)" class="closebtn mobile-menu" onclick="menu_closeNav()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Button','vw-lawyer-attorney'); ?></span></a>
              <?php 
                wp_nav_menu( array( 
                  'theme_location' => 'primary',
                  'container_class' => 'main-menu clearfix' ,
                  'menu_class' => 'clearfix',
                  'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
                  'fallback_cb' => 'wp_page_menu',
                ) ); 
              ?>
            </nav>
          </div>
        </div>
        <?php if ( 'Disable' != $vw_lawyer_attorney_search_hide_show ) {?>
        <div class="col-lg-1 col-md-2 col-6 p-0">
          <div class="search-box">
            <i class="fas fa-search"></i>
          </div>
        <?php } ?>
        </div>
        <div class="serach_outer">
          <div class="closepop"><i class="far fa-window-close"></i></div>
          <div class="serach_inner">
            <?php get_search_form(); ?>
          </div>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>
  </div>
</header>

<?php if(get_theme_mod('vw_lawyer_attorney_loader_enable',true)==1){ ?>
    <div id="preloader">
      <div id="status">
        <?php $theme_lay = get_theme_mod( 'vw_lawyer_attorney_loader_icon','Two Way');
          if($theme_lay == 'Two Way'){ ?>
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/two-way.gif" alt="" role="img"/>
        <?php }else if($theme_lay == 'Dots'){ ?>
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/dots.gif" alt="" role="img"/>
        <?php }else if($theme_lay == 'Rotate'){ ?>
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/rotate.gif" alt="" role="img"/>          
        <?php } ?>
      </div>
    </div>
  <?php } ?>