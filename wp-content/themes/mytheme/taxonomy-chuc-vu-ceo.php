<?php 
/**
 * Archive file, the file show all post in a category
 * @author Nguyen Trong Giap
 * @link https://fb.com/nguyentronggiap.5
 */
?>

<?php get_header() ?>


    <div class="container main_title">
        <h1>Testimonial</h1>
    </div>
    <div class="container">
        <div class="middle-content">
            <div class="row">


            <?php 
                while( have_posts()){
                    the_post();
                    $data = $post;
            ?>
                <div class="col-md-6 col-sm-12">
                    <div class=" testimonial_box w-100 mb-3">
                        <div class="content_box w-100">
                            <div class="short_text pt-3">
                                <p><?php echo ($data->post_excerpt ?? ""); ?></p>
                            </div>
                        </div>
                        <div class="image-box media">
                            <img class="testi-img w-100 d-flex align-self-center mr-3" src="<?php echo (!empty(get_the_post_thumbnail_url($data->ID)) ? get_the_post_thumbnail_url($data->ID) : (TFT_URL . "/public/includes/images/default-image.jpg")); ?>" alt="testimonial-thumbnail" />
                            <div class="testimonial-box media-body">
                                <h4 class="testimonial_name mt-0"><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } ?>
            </div>
        </div>
        <div class="clear"></div>
    </div>


<?php get_footer() ?>