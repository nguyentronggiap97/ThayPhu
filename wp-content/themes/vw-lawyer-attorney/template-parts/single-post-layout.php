<?php
/**
 * The template part for displaying Single Post
 *
 * @package VW Lawyer Attorney
 * @subpackage vw-lawyer-attorney
 * @since VW Lawyer Attorney 1.0
 */
?>
<?php 
  $archive_year  = get_the_time('Y'); 
  $archive_month = get_the_time('m'); 
  $archive_day   = get_the_time('d'); 
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
    <div class="single-post">
        <h1><?php the_title(); ?></h1>
        <div class="content-vw">
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
        </div><!-- metabox -->
            <?php if(has_post_thumbnail()) { ?>
                <div class="feature-box">   
                  <?php the_post_thumbnail(); ?>
                </div>  
                <hr>                 
            <?php } ?> 
            <div class="entry-content">
                <?php the_content(); ?>
                <div class="tags"><?php the_tags(); ?></div>    
            </div> 
            <?php

            // If comments are open or we have at least one comment, load up the comment template
            if ( comments_open() || '0' != get_comments_number() )
            comments_template();

            if ( is_singular( 'attachment' ) ) {
                // Parent post navigation.
                the_post_navigation( array(
                    'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'vw-lawyer-attorney' ),
                ) );
            } elseif ( is_singular( 'post' ) ) {
                // Previous/next post navigation.
                the_post_navigation( array(
                    'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'vw-lawyer-attorney' ) . '</span> ' .
                        '<span class="screen-reader-text">' . __( 'Next post:', 'vw-lawyer-attorney' ) . '</span> ' .
                        '<span class="post-title">%title</span>',
                    'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'vw-lawyer-attorney' ) . '</span> ' .
                        '<span class="screen-reader-text">' . __( 'Previous post:', 'vw-lawyer-attorney' ) . '</span> ' .
                        '<span class="post-title">%title</span>',
                ) );
            }
        ?>
    </div>
</article>