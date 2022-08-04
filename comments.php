<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
 
/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
    return;
?>
 
<div id="comments" class="comments-area">
 
    <?php if ( have_comments() ) : ?>
        <?php 
					function custom_comment_template($comment, $args, $depth) { ?>
						<div <?php comment_class('mb-5'); ?>>
							<div id="comment-<?php echo get_comment_ID(); ?>">
								<div class="comment_content mb-2">
									<span class="comment_name pr-4"><?php echo get_comment_author(); ?></span>
									<span class="comment_text"><?php comment_text(); ?></span>
								</div>
								<div class="comment_bottom">
									<div class="comment_answer mr-4"><?php
										comment_reply_link(
											array(
												'depth'     => 1,
												'max_depth' => 5,
												'reply_text' => __('Ответить', 'restx'),
												'respond_id' => 'respond',
											)
										); 
									?></div>
									<div><?php echo get_comment_date('j F'); ?> | <?php echo get_comment_time(); ?></div>
								</div>
							</div>
							
					<?php }
				?>
				<?php function custom_comment_template_end( $comment, $args, $depth ){	
					echo '</div>';
				} ?>

				<?php 
					$list_comments_args = array(
						'callback' => 'custom_comment_template',
						'end-callback' => 'custom_comment_template_end' 
					);
					$args = array(
						'post__in' => get_the_ID(),
						'status' => 'approve'
					);

					$comments = get_comments( $args );
					
				?>
				<?php wp_list_comments($list_comments_args, $comments); ?>

        
 
        <?php
            // Are there comments to navigate through?
            if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
        ?>
        <nav class="navigation comment-navigation" role="navigation">
            <h1 class="screen-reader-text section-heading"><?php _e( 'Comment navigation', 'twentythirteen' ); ?></h1>
            <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'twentythirteen' ) ); ?></div>
            <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'twentythirteen' ) ); ?></div>
        </nav><!-- .comment-navigation -->
        <?php endif; // Check for comment navigation ?>
 
        <?php if ( ! comments_open() && get_comments_number() ) : ?>
        <p class="no-comments"><?php _e( 'Comments are closed.' , 'twentythirteen' ); ?></p>
        <?php endif; ?>
 
    <?php endif; // have_comments() ?>
 
    <?php comment_form(); ?>
 
</div><!-- #comments -->