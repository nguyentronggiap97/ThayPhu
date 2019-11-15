<?php
/**
 * The template part for displaying Content
 *
 * @package VW Lawyer Attorney 
 * @subpackage vw_lawyer_attorney
 * @since VW Lawyer Attorney 1.0
 */
?>
<?php 
  $archive_year  = get_the_time('Y'); 
  $archive_month = get_the_time('m'); 
  $archive_day   = get_the_time('d'); 
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
  <div class="postbox smallpostimage">
    <?php 
      if(has_post_thumbnail()) { ?>
      <?php the_post_thumbnail();  ?>
    <?php } ?>
      <div class="new-text">
          <div class="box-content">
              <h4 class="section-title"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h4>
              <div class="metabox">
                <?php if(get_theme_mod('vw_lawyer_attorney_toggle_postdate',true)==1){ ?>
                  <span class="entry-date"><i class="fas fa-calendar-alt"></i><a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span>
                <?php } ?>

                <?php if(get_theme_mod('vw_lawyer_attorney_toggle_author',true)==1){ ?>
                  <span class="entry-author"><i class="far fa-user"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span>
                <?php } ?>

                <?php if(get_theme_mod('vw_lawyer_attorney_toggle_comments',true)==1){ ?>
                  <span class="entry-comments"><i class="fas fa-comments"></i><?php comments_number( __('0 Comments','vw-lawyer-attorney'), __('0 Comments','vw-lawyer-attorney'), __('% Comments','vw-lawyer-attorney')); ?></span>
                <?php } ?>
              </div>
              <hr class="big">
              <hr class="small">
              <div class="entry-content"><p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_lawyer_attorney_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_lawyer_attorney_excerpt_number','30')))); ?></p></div>
              <div class ="testbutton">
                <a href="<?php echo esc_url( get_permalink() );?>" class="hvr-sweep-to-right" title="<?php esc_attr_e( 'Read Full', 'vw-lawyer-attorney' ); ?>"><?php esc_html_e('Read Full','vw-lawyer-attorney'); ?><span class="screen-reader-text"><?php esc_html_e( 'Read Full','vw-lawyer-attorney' );?></span></a>
              </div>
          </div>
      </div>
      <div class="clearfix"></div> 
  </div>
</article>