<?php
/**
 * The template part for displaying Content
 *
 * @package VW Lawyer Attorney 
 * @subpackage vw_lawyer_attorney
 * @since VW Lawyer Attorney 1.0
 */
?>
<div id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
  <div class="postbox smallpostimage">
      <div class="new-text">
          <div class="box-content">
              <h4><?php the_title();?></h4>
              <div class="metabox">
                  <span class="entry-date"><i class="fas fa-calendar-alt"></i><?php echo get_the_date(); ?></span>
                  <span class="entry-author"><i class="far fa-user"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
                  <span class="entry-comments"><i class="fas fa-comments"></i><?php comments_number( __('0 Comments','vw-lawyer-attorney'), __('0 Comments','vw-lawyer-attorney'), __('% Comments','vw-lawyer-attorney')); ?></span>
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