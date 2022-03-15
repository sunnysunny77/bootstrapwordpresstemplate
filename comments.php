 <ul>
   <li>Comments
     <ul>
       <?php if (have_comments()) {

          wp_list_comments();
        } else { ?>

         <li>none</li>

       <?php } ?>
     </ul>
   </li>
 </ul>

 <?php comment_form(

    $args = array(
      'id_form'           => 'commentform',
      'id_submit'         => 'commentsubmit',
      'title_reply_before'   => '<h2 id="reply-title" class="comment-reply-title">',
      'title_reply_after'    => '</h2>',
      'title_reply'       => 'Leave a Comment',
      'title_reply_to'    => 'Leave a Comment to %s',
      'cancel_reply_link' => 'Cancel Commnet',
      'comment_field' =>  '<p><textarea placeholder="Start typing..." id="comment" class="form-control" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
      'comment_notes_after' => '<p class="form-allowed-tags">' .
        'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes:' .
        '</p><p class="alert alert-info">' . allowed_tags() . '</p>'
    )
  );
  ?>