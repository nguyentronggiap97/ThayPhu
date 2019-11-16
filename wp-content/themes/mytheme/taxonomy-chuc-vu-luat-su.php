<?php 
/**
 * Archive file, the file show all post in a category
 * @author Nguyen Trong Giap
 * @link https://fb.com/nguyentronggiap.5
 */

?>

<?php get_header() ?>
    <div class="title-box">
        <div class="container">
            <div class="above_title ">
                <h1>Attorney</h1>
            </div>
        </div>
        <img src="<?php echo TFT_URL ?>/public/images/Attorneys-img.jpg">
    </div>
    <div class="container main_title" style=display:none;>
        <h1>Attorney</h1>
    </div>

    <div class="container">
        <div class="middle-content">
            <div class="row">
                <?php 
                while( have_posts()){
                    the_post();
                    $data = $post;
                    $terms = get_the_terms($post->ID, 'chuc-vu');
                    $name_terms = "";
                    foreach ($terms as $key => $value) {
                        $name_terms .= $value->name . ($key != count($terms)-1 ? ',': '');
                    }
                    $more_infor = get_field('info-members', $post->ID);
                ?>
                    <div class="attorneys_box col-lg-4 col-md-6 col-sm-6">
                        <?php if (has_post_thumbnail()){ ?>
                            <div class="image-box ">
                                <img class="client-img" src="<?php echo (!empty(get_the_post_thumbnail_url($data->ID)) ? get_the_post_thumbnail_url($data->ID) : (TFT_URL . "/public/includes/images/default-image.jpg")); ?>" alt="attorney-thumbnail" />
                                <div class="attorneys-box w-100 float-left">
                                    <h4 class="attorney_name"><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
                                    <p><?php echo $name_terms ?? "" ?></p>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="content_box w-100 float-left">
                            <div class="short_text pt-3"><?php echo $post->post_excerpt ?? "" ?></div>
                            <div class="about-socialbox pt-3">
                                <p><?php echo $more_infor['phone'] ?? "" ?></p>
                                <div class="att_socialbox">
                                    <?php 
                                    $_count = 0;
                                    foreach (($more_infor['link'] ?? []) as $key => $value) {
                                        if($value == null) continue;
                                        echo "<a class='' href='$value target='_blank'><i class='fab fa-$key'></i></a>";
                                        ++$_count;
                                        if($_count == 6) echo "<br>";
                                    }
                                    ?>
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