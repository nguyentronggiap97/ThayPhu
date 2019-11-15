<?php 
/**
 * Comment file, the file show a post
 * called by comments_template() function
 * @author Nguyen Trong Giap
 * @link https://fb.com/nguyentronggiap.5
 */
?>

<!-- <?php comment_form(); ?>
<ol class="commentlist">
    <?php wp_list_comments(); ?>
</ol> -->


<div id="comments" class="comments-area">
    <?php comment_form(); ?>
    <!-- <div id="respond" class="comment-respond">
        <h2 id="reply-title" class="comment-reply-title">Leave a Reply <small><a rel="nofollow" id="cancel-comment-reply-link" href="/vw-lawyer-attorney-pro/2019/06/06/about-clients/#respond" style="display:none;">Cancel reply</a></small></h2>
        <form action="https://www.vwthemesdemo.com/vw-lawyer-attorney-pro/wp-comments-post.php" method="post" id="commentform" class="comment-form">
            <p class="comment-notes"><span id="email-notes">Your email address will not be published.</span> Required fields are marked <span class="required">*</span></p>
            <p class="comment-form-comment">
                <label for="comment">Comment</label>
                <textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525" required="required"></textarea>
            </p>
            <p class="comment-form-author">
                <label for="author">Name <span class="required">*</span></label>
                <input id="author" name="author" type="text" value="" size="30" maxlength="245" required='required' />
            </p>
            <p class="comment-form-email">
                <label for="email">Email <span class="required">*</span></label>
                <input id="email" name="email" type="text" value="" size="30" maxlength="100" aria-describedby="email-notes" required='required' />
            </p>
            <p class="comment-form-url">
                <label for="url">Website</label>
                <input id="url" name="url" type="text" value="" size="30" maxlength="200" />
            </p>
            <p class="form-submit">
                <input name="submit" type="submit" id="submit" class="submit" value="Post Comment" />
                <input type='hidden' name='comment_post_ID' value='261' id='comment_post_ID' />
                <input type='hidden' name='comment_parent' id='comment_parent' value='0' />
            </p>
        </form>
    </div> -->
    <!-- #respond -->
    <?php echo wp_list_comments(); ?>
</div>

