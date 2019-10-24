<?php
/* 
		Template Name: Contact Page
*/
?>

<?php get_header(  ) ?>
<?php 

$address1 = get_field('contact_addres_1','option');
$address2 = get_field('contact_addres_2','option');
$website = get_field('wf_contact_website','option');
$mail = get_field('contact_mail','option');
$phone = get_field('contact_phone','option');
$time1 = get_field('contact_time_1','option');
$time2 = get_field('contact_time_2','option');
$map = get_field('google_map','option');
?>
<div class="contact-box">
    <div class="container">
        <div class="contact-info m-4">
            <div class="row">
                <div class="col-md-4 col-sm-6 contact-address ">
                    <div class="inner-cont row m-0">
                        <div class="col-lg-3 col-md-4 col-sm-4 col-3 p-0">
                            <i class="fas fa-location-arrow"></i>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-8 col-9 p-0 media-small">
                            <span class="font-weight-bold text-uppercase">Address Title</span>
                            <p class="m-0"><?php echo ($address1 ?? ""); ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 contact-email">
                    <div class="inner-cont row m-0">
                        <div class="col-lg-3 col-md-4 col-sm-4 col-3 p-0">
                            <i class="far fa-envelope-open"></i>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-8 col-9 p-0 media-small">
                            <span class="w-100 font-weight-bold text-uppercase">Email: </span>
                            <p class="m-0"><?php echo ($mail ?? ""); ?></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 contact-phone">
                    <div class="inner-cont row m-0">
                        <div class="col-lg-3 col-md-4 col-sm-4 col-3 p-0 ">
                            <i class="fas fa-phone-volume"></i>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-8 col-9 p-0 media-small">
                            <span class="font-weight-bold text-uppercase">Phone</span>
                            <p class="m-0"><?php echo ($phone ?? ""); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="google-map text-center" id="map">
		<embed width="100%" height="450" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="<?php echo ($map ?? ""); ?>">
    </section>
    <div class="container">
        <?php echo do_shortcode('[contact-form-7 id="140" title="Contact form 1"]'); ?>
    </div>
</div>
		
<?php get_footer(  ) ?>