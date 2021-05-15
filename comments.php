<?php

if ( post_password_required() ) {
	return;
}



/**
 * comment form
 */


$comment_args = array(
	'class_submit' => 'btn btn-primary submit',
	'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label> <textarea id="comment" name="comment" class="form-control" cols="45" rows="8" aria-required="true" required="required"></textarea></p>',
	'fields' => array(
		'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
		'<input id="author" name="author" class="form-control" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . $html_req . ' /></p>',
		'email'  => '<p class="comment-form-email"><label for="email">' . __( 'Email' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
		'<input id="email" name="email" class="form-control" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-describedby="email-notes"' . $aria_req . $html_req  . ' /></p>',
		'url'    => '<p class="comment-form-url"><label for="url">' . __( 'Website' ) . '</label> ' .
		'<input id="url" name="url" class="form-control" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>',
	)
);
comment_form($comment_args);

/**
 * comment list
 */
$args = array(
    'post_ID'=>get_the_ID()
);
 
$comments = get_comments( $args );

if(count($comments) > 0 ){
	echo '<h3>Comments</h3><hr>';
	foreach ( $comments as $comment ) {
		$date = date('M, d Y H:m', strtotime($comment->comment_date));
		echo '<b>'.$comment->comment_author.'</b> <small class="text-muted">'.$date.'</small>';
		echo '<p>'.$comment->comment_content.'</p>';
	}
}else{

}

?>

