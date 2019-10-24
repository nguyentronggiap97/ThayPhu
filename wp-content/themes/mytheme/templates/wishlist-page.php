<?php 
/**
 * Template Name: Wishlist Page
 */
 get_header(); ?>
    <div id="favorite-product">
			<div class="banner">
					<div class="container-fruid">
							<div class="banner-wrap"><img src="<?php echo TFT_URL ?>/public/images/news-banner.png" alt=""/>
							<div class="container">
									<h1><?php the_title() ?></h1>
							</div>
							</div>
							<!--.banner-wrap-->
					</div>
			</div>
			<div style="padding-top:0" class="favorite-product">
				<div class="container">
					<div class="row">
					<?php  echo do_shortcode('[yith_wcwl_wishlist]'); ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer();