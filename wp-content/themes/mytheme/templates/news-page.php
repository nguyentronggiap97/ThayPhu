<?php 
/* 
    Template Name: News Page
*/
$page_url = get_the_permalink();

$news = new WP_Query(array(
    'category__in'=> 21,
    'posts_per_page'=>5,
    'paged' => isset($_GET['pg'])?$_GET['pg']:0
));
?>
<?php get_header() ?>
<div class="main">
   <div id="news">
      <div class="banner">
         <div class="container-fruid">
            <div class="banner-wrap">
               <img src="<?php echo TFT_URL ?>/public/images/news-banner.png" alt=""/>
               <div class="container">
                  <h1>Tin tức</h1>
               </div>
            </div>
            <!--.banner-wrap-->
         </div>
         <div class="news">
            <div class="container">
               <div class="row">
                    <div class="col-sm-8">
                        <?php 
                        while ($news->have_posts() ) {
                        $news->the_post(); ?>  
                        <div class="news__product">
                            <div class="newsitem-wrap">
                            <div class="newsitem__thumbnail"><img src="<?php the_post_thumbnail_url( 'tw_post_thumbnail' ) ?>" alt=""/></div>
                            <div class="newsitem__content">
                                <h5><a href = "<?php echo get_the_permalink() ?>"><?php the_title() ?></a></h5>
                                <p><?php echo get_the_excerpt() ?></p>
                                <div class="newsitem__content--control">
                                    <time><?php echo get_the_date('d/m/y') ?></time><a href="<?php echo get_permalink() ?>">Xem thêm</a>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            </div>
                            <!--.news-item-->
                        </div>
                        <?php } ?>
                        <?php worldfood_post_navigate(0,$news,$page_url.'?pg=') ?> 
                    </div>
                    <?php sidebar_new() ?>
                    <div class="clear-fix"></div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php get_footer() ?>