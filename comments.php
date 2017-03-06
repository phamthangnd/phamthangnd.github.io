<?php if(comments_open( ) || have_comments()) : ?>
<div class="comments-area light-grey-background comments-block">
	<?php if ( post_password_required() ) : ?>
				<p><?php _e( 'This post is password protected. Enter the password to view any comments ', 'cuisinier' ); ?></p>
			</div>

		<?php
		/* Stop the rest of comments.php from being processed,
		 * but don't kill the script entirely -- we still have
		 * to fully load the template.
		 */
		return;
		endif;?>

		<?php if(!(is_page( ) && get_comments_number( ) == 0)) : ?>
			<h4 class="entry-title padding-double-top"><?php comments_number( '0', '1', '%' ) ?> <?php _ex('Comments','blog','cuisinier') ?></h4>
		<?php endif; ?>

		<?php if ( have_comments() && comments_open()) : ?>
            <ul class="comment-list clean-list">
				<?php wp_list_comments( array( 'callback' => 'tt_custom_comments' , 'avatar_size'=>'64','style'=>'ul') ); ?>
			</ul>
			<div class="comments_navigation">
				<?php paginate_comments_links(); ?>
			</div>
		<?php
		/* If there are no comments and comments are closed, let's leave a little note, shall we?
		 * But we don't want the note on pages or post types that do not support comments.
		 */
		elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) && have_comments()) :?>
			<div class="comments_navigation">
				<?php paginate_comments_links(); ?>
			</div>
            <ul class="comment-list">
				<?php wp_list_comments( array( 'callback' => 'tt_custom_comments_closed' , 'avatar_size'=>'64','style'=>'ul') ); ?>
			</ul>
		<?php endif; ?>

		<?php
		$args = array(
			'fields' => apply_filters( 'comment_form_default_fields', array(
				'author' => '<div class="row"><div class="col-md-6"><input class="comments-line comments-line-1" id="author" name="author" type="text" placeholder="Name" value="' . esc_attr( $commenter[ 'comment_author' ] ) . '" aria-required="true"></div>',
				'email' => '<div class="col-md-6"><input class="comments-line comments-line-2" name="email" id="e-mail" type="text" placeholder="E-mail" value="' . esc_attr( $commenter[ 'comment_author_email' ] ) . '" aria-required="true"></div></div>',
				'url' => '<div class="row"><div class="col-md-12"><input class="comments-line comments-line-3" name="website" id="website" type="text" placeholder="Website" value="' . esc_attr( $commenter[ 'comment_author_url' ] ) . '" ></div></div>'
				)
			),
			'comment_notes_after' => '',
			'comment_notes_before' => '',
			'title_reply' => '<span class="comment-reply-title entry-title margin-top-60">'._x('Leave a reply','comment-form','cuisinier').'</span>',
			'comment_field' => '<span class="line-limit"><textarea name="comment" class="comments-textarea" rows="6">'._x('Message','comment-form','cuisinier').'</textarea></span>',
			'label_submit' => _x('Submit Comment','comment-form','cuisinier')
		); ?>
		<?php comment_form( $args );?>
		
</div><!-- .comments area -->
<?php endif; ?>