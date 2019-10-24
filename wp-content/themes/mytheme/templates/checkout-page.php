<?php
/**
 * Template Name: Cart Page
 */

 $cart = WC()->cart;
 $cart_contents = $cart->get_cart();

 get_header(); ?>
    <div id="cart">
        <div class="banner">
            <div class="container-fruid">
                <div class="banner-wrap"><img src="<?php echo TFT_URL ?>/public/images/news-banner.png" alt=""/>
                  <div class="container">
                      <h1><?php the_title() ?></h1>
                  </div>
                </div>
            </div>
        </div>
        <?php if(count($cart_contents)<=0) {
          echo '<h3 align="center">Bạn chưa có sản phẩm nào trong giỏ hàng.</h3>';
          echo '<div style="text-align:center;margin-bottom: 50px;"><a href="'.home_url().'"><b>Quay lại mua sắm!</b></a></div>';
        } else { ?>
          <div style="padding-top: 0" class="cart cart-page">   
              <div class="container">
                <div class="row">
                  <div class="wf-print-error" id="wf-print-error"></div>
                  <div class="col-sm-4">
                    <?php echo do_shortcode('[woocommerce_checkout]') ?>
                  </div>
                  <div class="col-sm-8">
                    <div class="inner">
                      <?php wf_cart_content() ?>
                    </div>
                  </div>
                  <div class="clear-fix"></div>
                </div>
              </div>
          </div>
          <div id="cart-popup">
              <?php wf_cart_checkout_confirm() ?>
          </div>
        <?php } ?>
    </div>
<?php get_footer(); ?>'