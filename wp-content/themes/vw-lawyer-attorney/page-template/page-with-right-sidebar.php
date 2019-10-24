<?php
/**
 * Template Name:Page with Right Sidebar
 */

get_header(); ?>

<?php do_action( 'vw_lawyer_attorney_header_pageright' ); ?>

<div class="container">
    <div class="middle-align row">       
		<div class="col-lg-8 col-md-8" id="content-vw" >
			<?php while ( have_posts() ) : the_post(); ?>
                <h3><?php the_title(); ?></h3>
                <img src="<?php the_post_thumbnail_url(); ?>">
                <p><?php the_content();?></p>
            <?php endwhile; // end of the loop. ?>
            <?php
                //If comments are open or we have at least one comment, load up the comment template
                if ( comments_open() || '0' != get_comments_number() )
                    comments_template();
            ?>
        </div>
        <div class="col-lg-4 col-md-4 sidebar">
			<?php dynamic_sidebar('sidebar-2'); ?>
		</div>
        <div class="clear"></div>    
    </div>
</div>

<?php do_action( 'vw_lawyer_attorney_footer_pageright' ); ?>

<?php get_footer(); ?>