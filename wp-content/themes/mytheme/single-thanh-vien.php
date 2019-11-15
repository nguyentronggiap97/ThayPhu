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
    $more_infor = get_field('info-members', $post->ID);
?>
    <div class="container main_title">
        <h1><?php echo ($data->post_title ?? ""); ?></h1>
    </div>
    <div class="container">
        <div id="attorney_prop">
            <div class="row m-0">
                <div class="col-md-4">
                    <div class="attorney_feature-box">
                        <img src="<?php echo (!empty(get_the_post_thumbnail_url()) ? get_the_post_thumbnail_url() : (TFT_URL . "/public/includes/images/default-image.jpg")); ?>">
                    </div>
                </div>
                <div class="col-md-8 attorney_desc_box">
                    <p><?php echo ($data->post_content ?? ""); ?></p>
                    <div class="attorneys-desig"><strong>Call: </strong><?php echo $more_infor['phone'] ?? "" ?></div>
                    <div class="about-socialbox">
                        <?php 
                        $_count = 0;
                        foreach (($more_infor['link'] ?? []) as $key => $value) {
                            echo "<a style='margin-right: 5px;' class='chef_social' href='$value target='_blank'><i class='fab fa-$key'></i></a>";
                            ++$_count;
                            if($_count == 6) break;
                        }
                        ?>
                    </div>

                    <div id="comments" class="comments-area"><?php echo comment_form($data->ID); ?></div>
                    <div class="clearfix"></div>

                    <nav class="navigation post-navigation" role="navigation">
                        <h2 class="screen-reader-text">Post navigation</h2>
                        <div class="nav-links">
                            <div class="nav-next"><a href="https://www.vwthemesdemo.com/vw-lawyer-attorney-pro/attorney/robert-joseph/" rel="next"><span class="meta-nav" aria-hidden="true">Next</span> <span class="screen-reader-text">Next post:</span> <span class="post-title">Robert Joseph</span></a></div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
<?php } ?>
<?php get_footer(); ?>