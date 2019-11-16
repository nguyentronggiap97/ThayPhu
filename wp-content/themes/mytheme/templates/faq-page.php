<?php 
/*
* Template Name: Faq page
*/

$dataList = get_field('list_question', 127);
$count = 1;
?>
<?php get_header(); ?>
<div class="title-box">
    <div class="container">
        <div class="above_title ">
            <h1>Faq</h1>
        </div>
    </div>
    <img src="<?php echo TFT_URL ?>/public/images/about-us.jpg">
</div>
<div class="container main_title" style="display:none;">
    <h1>Faq</h1>
</div>
<div class="container">
    <div class="middle-content">
        <div id="accordion" class="row">
            <?php foreach($dataList as $key => $value){ ?>
                <div class="panel-group col-md-6 w-100 mb-3">
                    <div class="panel">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a href="#panelBody<?php echo ++$count; ?>" class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion"><i class="fas fa-plus"></i><?php echo ($value['title'] ?? ""); ?></a>
                            </h4>
                        </div>
                        <div id="panelBody<?php echo $count; ?>" class="panel-collapse collapse in">
                            <div class="panel-body">
                                    <p><?php echo ($value['content'] ?? ""); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="clear"></div>
</div>
<?php get_footer(); ?>