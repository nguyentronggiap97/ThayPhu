<?php 
/*
* @author : Nguyen Trong Giap
*/

// add_action( 'wf_home_hook','wf_home_page_banner', 10 );
add_action( 'wf_sidebar_hook1','sidebar_search', 15 );
add_action( 'wf_sidebar_hook1','sidebar_recent_ports', 20 );
add_action( 'wf_sidebar_hook1','sidebar_categories', 25 );
add_action( 'wf_sidebar_hook1','sidebar_get_a_qoute', 30 );



add_action( 'wf_sidebar_hook2','sidebar_search', 15 );
add_action( 'wf_sidebar_hook2','sidebar_recent_ports', 20 );
add_action( 'wf_sidebar_hook2','sidebar_categories2', 35 );
// add_action( 'wf_sidebar_hook2','sidebar_get_a_qoute', 30 );
add_action( 'wf_sidebar_hook2','sidebar_comments', 25 );



function sidebar_search() { 
	?>
		<aside id="search-2" class="widget widget_search">
			<form role="search" method="get" class="search-form" action="<?php echo home_url() ?>">
				<label>
					<input type="search" class="search-field" placeholder="Search" value="" name="s">
				</label>
				<input type="submit" class="search-submit" value="Search">
			</form>
		</aside>
	<?php
}

function sidebar_recent_ports() {
	$list_posts = get_posts(['numberposts' => 5]);
	?>
	<aside id="recent-posts-2" class="widget widget_recent_entries">
        <h3 class="widget-title">Recent Posts</h3>
        <ul>
			<?php foreach($list_posts as $key => $value){ ?>
				<li>
					<div class="row recent-post-box">
						<div class="post-thumb col-md-4 col-sm-4 col-4">
							<img width="370" height="266" src="<?php echo (!empty(get_the_post_thumbnail_url($value->ID)) ? get_the_post_thumbnail_url($value->ID) : (TFT_URL . "/public/includes/images/default-image.jpg")); ?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" sizes="(max-width: 370px) 100vw, 370px"> </div>
						<div class="post-content col-md-8 col-sm-8 col-8">
							<a href="<?php echo get_permalink($value->ID); ?>"><?php echo ($value->post_title ?? ""); ?></a>
						</div>
					</div>
				</li>
			<?php } ?>
        </ul>
    </aside>
	<?php
}

function sidebar_categories() {
	$list_cates = get_categories();
	$count = 0;
	?>
	<aside id="categories-2" class="widget widget_categories">
        <h3 class="widget-title">Categories</h3>
        <ul>
			<?php foreach($list_cates as $key => $value){ ?>
            	<li class="cat-item cat-item-19"><a href="<?php echo get_category_link($value->term_id); ?>"><?php echo $value->name; ?></a></li>
			<?php } ?>
        </ul>
    </aside>
	<?php
}

function sidebar_categories2() {
	$list_cates = get_the_category(get_the_ID());
	?>
	<aside id="categories-2" class="widget widget_categories">
        <h3 class="widget-title">Categories</h3>
        <ul>
			<?php foreach($list_cates as $key => $value){ ?>
            <li class="cat-item cat-item-19"><a href="<?php echo get_category_link($value->term_id); ?>"><?php echo $value->name; ?></a>
            </li>
			<?php } ?>
        </ul>
    </aside>
	<?php
}

function sidebar_get_a_qoute() {
	?>
	<aside id="custom_html-2" class="widget_text widget widget_custom_html">
		<h3 class="widget-title">Get A Qoute</h3>
		<div class="textwidget custom-html-widget">
			<div role="form" class="wpcf7" id="wpcf7-f93-p235-o1" lang="en-US" dir="ltr">
				<div class="screen-reader-response"></div>
				<form action="#" method="post" class="wpcf7-form" novalidate="novalidate">
					<div style="display: none;">
						<input type="hidden" name="_wpcf7" value="93" />
						<input type="hidden" name="_wpcf7_version" value="5.1.4" />
						<input type="hidden" name="_wpcf7_locale" value="en_US" />
						<input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f93-p235-o1" />
						<input type="hidden" name="_wpcf7_container_post" value="235" />
					</div>
					<p>
						<label> Your Name (*)<br />
							<span class="wpcf7-form-control-wrap your-name">
								<input type="text" name="your-name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" />
							</span> 
						</label>
					</p>
					<p>
						<label> Your Email (*)<br />
							<span class="wpcf7-form-control-wrap your-email">
								<input type="email" name="your-email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" />
							</span> 
						</label>
					</p>
					<p>
						<label> Subject<br />
							<span class="wpcf7-form-control-wrap your-subject">
								<input type="text" name="your-subject" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" />
							</span> 
						</label>
					</p>
					<p>
						<input type="submit" value="Send" class="wpcf7-form-control wpcf7-submit" />
					</p>
					<div class="wpcf7-response-output wpcf7-display-none">
					</div>
				</form>
			</div>
		</div>
	</aside>
	<?php
}

function sidebar_comments() {
	$list_comments = get_comments(['ID' => get_the_ID()]);
	?>
		<aside id="recent-comments-2" class="widget widget_recent_comments">
			<h3 class="widget-title">Recent Comments</h3>
			<ul id="recentcomments">
				<?php foreach($list_comments as $key => $value){ ?>
				<li style="margin-bottom: 20px;">
				 	<div class="row recent-post-box">
						<div class="post-thumb col-md-4 col-sm-4 col-4">
							<img width="370" height="266" src="<?php echo (!empty(get_avatar_url($value->user_id)) ? get_avatar_url($value->user_id) : (TFT_URL . "/public/includes/images/default-image.jpg")); ?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" sizes="(max-width: 370px) 100vw, 370px"> </div>
						<div class="post-content col-md-8 col-sm-8 col-8" title="<?php echo ($value->comment_content ?? ""); ?>">
							<a href="" alt="<?php echo ($value->comment_content ?? ""); ?>"><?php echo (strlen($value->comment_content) > 85 ? (substr($value->comment_content, 1, 85)."...") : $value->comment_content); ?></a>
						</div>
					</div>
				</li>
				<?php } ?>
			</ul>
		</aside>
	<?php
}