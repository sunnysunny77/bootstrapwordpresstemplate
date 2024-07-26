 <ul>
	<li>Comments
		<ul>
			<?php if (have_comments()) {

				wp_list_comments();

			} else { ?>

				<li>
					none
				</li>

			<?php } ?>
		</ul>
	</li>
 </ul>

 <?php comment_form($args = array(
	'id_form'           => 'commentform',
	'id_submit'         => 'commentsubmit',
	'title_reply_before'   => '<h2 id="reply-title" class="comment-reply-title">',
	'title_reply_after'    => '</h2>',
	'title_reply'       => 'Leave a Comment',
	'title_reply_to'    => 'Leave a Comment to %s',
	'cancel_reply_link' => 'Cancel Comment',
	'fields' => array(
        'author' => '<p class="comment-form-author"><input id="author" name="author" aria-required="true" placeholder="Name"></p>',
        'email' => '<p class="comment-form-email"><input id="email" name="email" placeholder="E-Mail"></p>',
        'url' => '<p class="comment-form-url"><input id="url" name="url" placeholder="Website"></p>',
        'cookies' => '<input type="checkbox" required> Save my name, email, and website in this browser for the next time I comment.' ,
    ),
	'comment_field' =>  '<p><label for="comment" class="d-none">Comments</label><textarea placeholder="Start typing..." id="comment" name="comment" rows="8" aria-required="true"></textarea></p>',
	'comment_notes_after' => '<p class="form-allowed-tags">' .
	'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes:' .
	'</p><p class="alert alert-info">' . allowed_tags() . '</p>'
	)
);?>