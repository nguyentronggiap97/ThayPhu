<?php 
/* 
    Template Name: Blog Page
*/

$arg = [
    'post_type' => 'post',
];

$posts = new WP_Query($arg);
?>

<?php get_header() ?>
    <div class="container main_title">
        <h1>Blog</h1>
    </div>

    <div id="blog-right-sidebar">
        <div class="container">
            <div class="middle-align">
                <div class="row">
                    <div class="col-lg-8 col-md-12 content_page">
                        <div class="row">
                            <?php 
                                while( $posts->have_posts()){
                                    $posts->the_post();
                            ?>
                            <div class="postbox smallpostimage col-lg-12 col-md-12 col-sm-12">
                                <div class="post-featured">
                                    <img width="370" height="266" src="<?php echo (!empty(get_the_post_thumbnail_url($post->ID)) ? get_the_post_thumbnail_url($post->ID) : (TFT_URL . "/public/includes/images/default-image.jpg")); ?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt=""  sizes="(max-width: 370px) 100vw, 370px">
                                    <div class="inner-sbox align-items-center">
                                        <h4><?php echo get_the_title(); ?></h4>
                                        <div class="metabox">
                                            <span class="entry-date"><?php echo date("M ,d ,Y", strtotime($post->post_date)); ?></span>
                                            <span class="entry-author"><?php echo (get_author_name($post->post_author) ?? "admin"); ?></span>
                                            <span class="entry-comments"><?php echo (get_comments_number($post->ID) ?? 0); ?> Comments</span>
                                        </div>
                                        <p><?php echo ($post->post_excerpt ?? ""); ?></p>
                                        <a href="<?php echo get_the_permalink(); ?>" class="post-readmore">Read Full<i class="fas fa-long-arrow-alt-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-5" id="vw-sidebar">
                        <?php do_action('wf_sidebar_hook1'); ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>

<?php get_footer() ?>