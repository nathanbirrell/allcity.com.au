<?php
/**
 *
 * Comment Form
 * @since 1.0.0
 * @version 1.1.0
 *
 */
function hsv_comment( $comment, $args, $depth ) {

  //start comments
  $GLOBALS['comment'] = $comment;
  switch ( $comment->comment_type ):
    case 'pingback':
    case 'trackback':
  ?>
  <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>"><p><?php _e( 'Pingback:', 'sf' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'hsv' ), '<span class="edit-link">', '</span>' ); ?></p>
  <?php
      break;

      default:

    // generate comments
    global $post;
  ?>
  <li <?php comment_class('ct-part comments-details clearfix'); ?> id="li-comment-<?php comment_ID(); ?>">

  <div class="col-md-3 col-sm-3">
    <a class="pull-left">
    <div class="media-object">
       <?php echo get_avatar( $comment, 80 ); ?> 
    </div>
    </a>
    <span class="name"><?php echo get_comment_author_link(); ?></span>
    <span class="date light-gray"><?php printf( '%3$s', esc_url( get_comment_link( $comment->comment_ID ) ), get_comment_time( 'c' ), sprintf( get_comment_date(), get_comment_time() )); ?></span>
    <?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Post Reply', 'sf' ), 'after' => '', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
  </div>


    <div id="comment-<?php comment_ID(); ?>" class="comment-content col-md-9 col-sm-9">


        <?php comment_text(); ?>
    </div><!-- #comment container-## -->


  <?php
    break;
  endswitch;

}

if ( post_password_required() ) { return; }

$cmt_class = (!have_comments()) ? 'no-comment':'has-comment';

?>

<!-- <div id="comments" class="comments-area"> -->

  <?php if(comments_open()) : ?>
    <div class="comments <?php echo sanitize_html_classes($cmt_class); ?>">
    <?php if ( have_comments() ) : ?>

      <ul id="comment-list"><?php wp_list_comments( array( 'callback' => 'hsv_comment', 'style' => 'ul' ) ); ?></ul>

      <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
        <nav class="nav-single">
          <div class="nav-previous left"><?php previous_comments_link( __( 'Older Comments', 'hsv' ) ); ?></div>
          <div class="nav-next right"><?php next_comments_link( __( 'Newer Comments;', 'hsv' ) ); ?></div>
        </nav>
      <?php endif; endif; else: ?>
      <p class="nocomments alert box-custom alert-info tleft no-close"><i class="fa fa-exclamation-triangle"></i><?php _e( 'Comments are closed.' , 'st' ); ?></p>
    <?php endif; ?>

  <?php 

    //Custom Fields
    $fields =  array(
      'author'=> '<input id="comment-author" class="form-control" type="text" placeholder="Name (required)" tabindex="1"  name="author">',
      'email' => '<input type="email" id="comment-email" class="form-control" name="email" placeholder="E-mail (required)" tabindex="2">',
      'url'   => '<input type="text" id="comment-website" class="form-control" name="website" placeholder="Website" tabindex="3">',
    );

      $comments_args = array(
        'fields' => $fields,
            'comment_field' => '<textarea id="comment" aria-required="true" class="form-control" name="comment" placeholder="Message (required)" rows="6" tabindex="4"></textarea>',
            'must_log_in' => '',
            'logged_in_as' => '',
            'comment_notes_before' => '',
            'comment_notes_after' => '',
            'title_reply' => 'Leave a Comment',
            'title_reply_to' => __('Leave a Reply to %s', 'sf'),
            'cancel_reply_link' => __('Cancel &raquo;', 'sf'),
            'label_submit' => __('Send Message', 'sf'),
      );
      //echo '<div class="recent-comments col-sm-7">';
      comment_form($comments_args);

      echo '</div>';
  ?>

<!-- </div> -->