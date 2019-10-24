<?php
/**
 * Template Name: Custom Home
 */

get_header(); ?>

<?php do_action( 'vw_lawyer_attorney_above_slider' ); ?>

<?php if( get_theme_mod('vw_lawyer_attorney_slider_hide_show') != ''){ ?>
  	<section class="slider">
	    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
	      <?php $pages = array();
	        for ( $count = 1; $count <= 4; $count++ ) {
	          $mod = intval( get_theme_mod( 'vw_lawyer_attorney_slider_page' . $count ));
	          if ( 'page-none-selected' != $mod ) {
	            $pages[] = $mod;
	          }
	        }
	        if( !empty($pages) ) :
	          $args = array(
	            'post_type' => 'page',
	            'post__in' => $pages,
	            'orderby' => 'post__in'
	          );
	          $query = new WP_Query( $args );
	          if ( $query->have_posts() ) :
	            $i = 1;
	      ?>     
	      <div class="carousel-inner" role="listbox">
	        <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
	          <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
	            <img src="<?php the_post_thumbnail_url('full'); ?>"/>
	            <div class="carousel-caption">
	              <div class="inner_carousel">
	                <h2><?php the_title(); ?></h2>
	                <p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_lawyer_attorney_string_limit_words( $excerpt,40 ) ); ?></p>
	                <div class ="testbutton">
		                <a class="hvr-sweep-to-right" href="<?php the_permalink(); ?>"><?php esc_html_e('KNOW MORE','vw-lawyer-attorney'); ?></a>
		            </div>
	              </div>
	            </div>
	          </div>
	        <?php $i++; endwhile; 
	        wp_reset_postdata();?>
	      </div>
	      <?php else : ?>
	          <div class="no-postfound"></div>
	        <?php endif;
	      endif;?>
	      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
	        <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-arrow-left"></i></span>
	      </a>
	      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
	        <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-arrow-right"></i></span>
	      </a>
	    </div>  
    	<div class="clearfix"></div>
  	</section> 
<?php }?>

<?php do_action( 'vw_lawyer_attorney_below_slider' ); ?>

<?php if( get_theme_mod( 'vw_lawyer_attorney_about_setting') != '' || get_theme_mod( 'vw_lawyer_attorney_main_title' )!= '' || get_theme_mod( 'vw_lawyer_attorney_blogcategory_setting' )!= '' || get_theme_mod( 'vw_lawyer_attorney_about_name' )!= ''){ ?>
	<div class="container">
		<div class="row m-0">
			<div class="about col-lg-6 col-md-6">
			    <?php
			    $postData1=  get_theme_mod('vw_lawyer_attorney_about_setting');
	        	if($postData1){
			      $args = array( 'name' => esc_html($postData1 ,'vw-lawyer-attorney'));
			      $query = new WP_Query( $args );
			      if ( $query->have_posts() ) :
			        while ( $query->have_posts() ) : $query->the_post(); ?>
			            <h3><?php the_title(); ?></h3>
			            <p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_lawyer_attorney_string_limit_words( $excerpt,40 ) ); ?></p>
			            <?php if( get_theme_mod('vw_lawyer_attorney_about_name') != ''){ ?>
			            <div class ="testbutton">
			              <a class="hvr-sweep-to-right" href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('vw_lawyer_attorney_about_name','')); ?></a>
			            </div>
			            <?php }?>
			        <?php endwhile; 
			        wp_reset_postdata();?>
			        <?php else : ?>
			           <div class="no-postfound"></div>
			        <?php
			    endif; }?>
			</div>
			<div id="" class="col-lg-6 col-md-6 choose" >
				<?php if( get_theme_mod('vw_lawyer_attorney_main_title') != ''){ ?>
				    <div class="heading-line">
				      <h3><?php echo esc_html(get_theme_mod('vw_lawyer_attorney_main_title','')); ?> </h3>
				    </div>
			    <?php } ?>
				<?php 
					$catData1=  get_theme_mod('vw_lawyer_attorney_blogcategory_setting');
		              			if($catData1){ 
				    $page_query = new WP_Query(array( 'category_name' => esc_html($catData1 ,'vw-lawyer-attorney')));?>
			  		<?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
			  			<div class="why-box">
				  			<div class="row m-0">
						    	<div class="col-lg-3 col-md-3">
						    		<div class="abt-img-box"><?php if(has_post_thumbnail()) { ?><?php the_post_thumbnail(); ?><?php } ?></div>
						    	</div>
						    	<div class="col-lg-9 col-md-9">
						    		<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
						    		<p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_lawyer_attorney_string_limit_words( $excerpt,15) ); ?></p>
						    	</div>
						    </div>
						</div>
				    	<div class="clearfix"></div>
				    <?php endwhile;
				    wp_reset_postdata();
				}?>
			</div>
		</div>
	</div>
<?php }?>

<?php do_action( 'vw_lawyer_attorney_below_about' ); ?>

<div id="content-vw" class="container">
    <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
    <?php endwhile; // end of the loop. ?>
</div>

<?php get_footer(); ?>