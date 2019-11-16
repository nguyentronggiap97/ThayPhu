<?php

$text_content = get_field('footer_text_content', 'option');
$copy_right = get_field('footer_copy_right', 'option');
$link = get_field('footer_link', 'option');

$arg = [
    'numberposts'      => 3,
    'category'         => 0,
    'orderby'          => 'date',
    'order'            => 'DESC',
    'post_type'        => 'post',
];

$post_recent =  get_posts($arg);
?>
        <div class="outer-footer" style="background-image:url(<?php echo TFT_URL ?>/public/includes/images/footer-bg.jpg)">

            <div id="vw_footer">
                <div id="footer_box" class="darkbox">
                    <div class="container footer-cols">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6">
                                <aside id="text-3" class="widget widget_text">
                                    <div class="textwidget">
                                        <p><img class="alignnone size-full wp-image-56" src="<?php echo TFT_URL ?>/public/includes/images/Logo.png" alt="" width="240" height="66"></p>
                                        <?php echo $text_content ?? "" ?>
                                    </div>
                                </aside>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <aside id="recent-posts-5" class="widget widget_recent_entries">
                                    <h3 class="widget-title">Recent Posts</h3>
                                    <ul>

                                        <?php 
                                        foreach ($post_recent as $key => $data) {
                                        ?>

                                        <li>
                                            <div class="row recent-post-box">
                                                <div class="post-thumb col-md-4 col-sm-4 col-4">
                                                    <img width="370" height="266" src="<?php echo (!empty(get_the_post_thumbnail_url($data->ID)) ? get_the_post_thumbnail_url($data->ID) : (TFT_URL . "/public/includes/images/default-image.jpg")); ?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" sizes="(max-width: 370px) 100vw, 370px"> </div>
                                                <div class="post-content col-md-8 col-sm-8 col-8">
                                                    <a href="<?php echo get_the_permalink($data->ID); ?>"><?php echo $data->post_title ?? "" ?></a>
                                                </div>
                                            </div>
                                        </li>

                                        <?php } ?>
                                    </ul>
                                </aside>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <aside id="meta-4" class="widget widget_meta">
                                    <h3 class="widget-title">Link</h3>
									<?php
									wp_nav_menu(array(                                           //Hàm lấy ra 1 menu
										'theme_location' => 'tw-footer-menu',   //lấy id của menu
										'menu_class' => 'clearfix mobile_nav sf-js-enabled sf-arrows',                 //class của menu
										'menu_id' => 'menu-menu-1',                            //id của menu
										'menu'=> 'tw-footer-menu',// as theme_location
										'container' => false,                      // bỏ div "container "
										'items_wrap'      => '<ul id="menu-menu-1" class="clearfix mobile_nav sf-js-enabled sf-arrows">%3$s</ul>',
									));
									?>
                                </aside>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <aside id="custom_html-3" class="widget_text widget widget_custom_html">
                                    <h3 class="widget-title">Gallery</h3>
                                    <div class="textwidget custom-html-widget">
                                        <div id="sb_instagram" class="sbi sbi_mob_col_auto sbi_col_4" style="width:100%; padding-bottom: 10px; " data-id="4209504059" data-num="8" data-res="auto" data-cols="4" data-options="{&quot;sortby&quot;: &quot;none&quot;, &quot;showbio&quot;: &quot;true&quot;,&quot;feedID&quot;: &quot;4209504059&quot;, &quot;headercolor&quot;: &quot;&quot;, &quot;imagepadding&quot;: &quot;5&quot;,&quot;mid&quot;: &quot;M2E4MWE5Zg==&quot;, &quot;disablecache&quot;: &quot;false&quot;, &quot;sbiCacheExists&quot;: &quot;true&quot;,&quot;callback&quot;: &quot;YTE2NjBlYmFkYzhk.NDBkZjg5NmU5MzZmMzRjM2RhM2E=&quot;, &quot;sbiHeaderCache&quot;: &quot;true&quot;}" data-sbi-index="1">
                                            <div id="sbi_images" style="padding: 5px;">
                                                <div class="sbi_loader"></div>
                                            </div>
                                            <div id="sbi_load" class="sbi_hidden"></div>
                                        </div>
                                    </div>
                                </aside>
                            </div>
                        </div>
                    </div>
                    <!-- .container -->
                </div>
                <!-- #footer_box -->
            </div>
            <div class="vw_copyright">
                <div class="container">
                    <div class="row main_sociobox">
                        <div class="col-md-6 col-sm-12">
                            <p><?php echo $copy_right ?? "" ?><span class="credit-link text-right">  Design &amp; Developed by<a href="https://www.vwthemes.com/" target="_blank" rel="nofollow"> VW Themes</a></span>
                            </p>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="socialbox">
                                <?php 
                                foreach (($link ?? []) as $key => $value) {
                                    $class = $key;
                                    if($key == 'pintrest') $class =  'pinterest-p';
                                    if($key == 'linkedin') $class =  'linkedin-in';
                                    if($key == 'flicker') $class =  'flickr';
                                    if($key == 'tumbler') $class =  'tumblr';
                                     
                                    echo "<a class='" .($key == 'instagram' ? 'insta' : $key). "' href='$value target='_blank'><i class='fab fa-$class align-middle' aria-hidden='true'></i></a>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <script type="text/javascript" src="<?php echo TFT_URL ?>/public/includes/js/jquery.js"></script>
            <script type="text/javascript" src="<?php echo TFT_URL ?>/public/includes/js/SmoothScroll.js"></script>
            <script type="text/javascript" src="<?php echo TFT_URL ?>/public/includes/js/custom.js"></script>
            <script type="text/javascript" src="<?php echo TFT_URL ?>/public/includes/js/bootstrap.min.js"></script>

            <script type="text/javascript">
                var c = document.body.className;
                c = c.replace(/woocommerce-no-js/, 'woocommerce-js');
                document.body.className = c;
            </script>
            <script type="text/javascript" src="<?php echo TFT_URL ?>/public/libs/owlcarousel/js/owl.carousel.js"></script>
            <script type="text/javascript" src="<?php echo TFT_URL ?>/public/includes/js/scripts.js"></script>
            <?php wp_footer() ?>
        </footer>
    </body>
</html>