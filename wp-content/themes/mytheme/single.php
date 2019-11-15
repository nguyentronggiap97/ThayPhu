<?php 
/**
 * Page file, the file show a single page
 * @author Nguyen Trong Giap
 * @link http://fb.com/nguyentronggiap.5
 */
?>
<?php get_header(); ?>
<?php while(have_posts()){ the_post(); ?>
<?php 
    $data = get_post();

?>
    <div class="container main_title">
        <h1><?php echo ($data->post_title ?? ""); ?></h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="content_page col-lg-8 col-md-7">
                <div class="content_boxes">
                    <div class="feature-box">
                        <img src="<?php echo (!empty(get_the_post_thumbnail_url()) ? get_the_post_thumbnail_url() : (TFT_URL . "/public/includes/images/default-image.jpg")); ?>">
                    </div>
                    <div class="metabox" style="display: block">
                        <span class="entry-date"><?php echo date("M ,d ,Y", strtotime($data->post_date)); ?></span>

                        </i><span class="entry-author"><a href="#"><?php echo (get_author_name() ?? "admin"); ?></a></span>

                        <span class="entry-comments"><?php echo (get_comments_number($data->ID) ?? 0); ?> Comments</span>
                    </div>
                    <p>
                        <p><?php echo ($data->post_content ?? ""); ?></p>
                    </p>
                    <?php $list_cates = get_the_category(get_the_ID()); ?>
                    <div class="post_ctg font-weight-bold"><span>Categories: </span>
                        <ul class="post-categories">
			                <?php foreach($list_cates as $key => $value){ ?>
                                <li><a href="<?php echo get_category_link($value->term_id); ?>"><?php echo $value->name; ?></a>
			                <?php } ?> 
                        </ul>
                    </div>
                    <?php echo comment_form() ?>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="col-lg-4 col-md-5" id="vw-sidebar">
                <?php do_action('wf_sidebar_hook2'); ?>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
<?php } ?>
<?php get_footer(); ?>