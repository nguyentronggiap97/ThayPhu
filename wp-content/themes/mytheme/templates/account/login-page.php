<?php
/* 
    Template Name: Login page
*/



?>

<?php get_header() ?>

    <?php if(is_user_logged_in()){ ?>



    <?php } else { 
        
        $post_datas = $_POST;
        echo '<pre>'.__FILE__.'::'.__METHOD__.'('.__LINE__.')<br>';
            print_r($post_datas);
        echo '</pre>';
        
        ?>
        <div class="container main_title">
            <h1>My account</h1>
        </div>
        <div class="container">
            <div class="middle-content">
                <div class="woocommerce">
                    <div class="woocommerce-notices-wrapper"></div>
                    <h2>Login</h2>
                    <form class="woocommerce-form woocommerce-form-login login" method="post">
                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                            <label for="username">Username or email address&nbsp;<span class="required">*</span></label>
                            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" autocomplete="username" value="" /> </p>
                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                            <label for="password">Password&nbsp;<span class="required">*</span></label>
                            <input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password" />
                        </p>
                        <p class="form-row">
                            <input type="hidden" id="woocommerce-login-nonce" name="woocommerce-login-nonce" value="6314b7892d" />
                            <input type="hidden" name="_wp_http_referer" value="/vw-lawyer-attorney-pro/my-account/" />
                            <button type="submit" class="woocommerce-Button button" name="login" value="Log in">Log in</button>
                            <label class="woocommerce-form__label woocommerce-form__label-for-checkbox inline">
                                <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span>Remember me</span>
                            </label>
                        </p>
                        <p class="woocommerce-LostPassword lost_password">
                            <a href="">Lost your password?</a>
                        </p>

                    </form>

                </div>
            </div>
            <div class="clear"></div>
        </div>
    <?php } ?>
<?php get_footer() ?>