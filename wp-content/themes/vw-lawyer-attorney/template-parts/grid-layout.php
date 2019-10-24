<?php
/**
 * The template part for displaying Grid Layout
 *
 * @package VW Lawyer Attorney
 * @subpackage vw-lawyer-attorney
 * @since VW Lawyer Attorney 1.0
 */
?>
<div class="col-lg-4 col-md-4">
	<div class="postbox smallpostimage">
  	<div class="box-image ">
        <?php the_post_thumbnail();  ?>
  	</div>
    <div class="new-text">
    	<div class="box-content">
        <h4><?php the_title();?></h4>
        <div class="metabox">
        	<span class="entry-date"><?php the_date(); ?></span>
        	<span class="entry-author"><?php the_author(); ?></span>
        	<span class="entry-comments"><?php comments_number( __('0 Comments','vw-lawyer-attorney'), __('0 Comments','vw-lawyer-attorney'), __('% Comments','vw-lawyer-attorney') ); ?></span>
        </div>
      	<hr class="big">
      	<hr class="small">
      	<p><?php echo the_excerpt(); ?></p>
      	<div class ="testbutton">
          <a href="<?php echo esc_url( get_permalink() );?>" class="hvr-sweep-to-right" title="<?php esc_attr_e( 'Read Full', 'vw-lawyer-attorney' ); ?>"><?php esc_html_e('Read Full','vw-lawyer-attorney'); ?></a>
        </div>
    	</div>
    </div>
    <div class="clearfix"></div> 
  </div>
</div>