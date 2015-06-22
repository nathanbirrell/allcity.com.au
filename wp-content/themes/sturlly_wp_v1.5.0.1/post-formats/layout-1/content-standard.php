<?php
/**
 *
 * Standard Post Format
 * @since 1.0
 * @version 1.2.0
 *
 */
?>
<?php
  global $rs_active, $post;
  $post_id = $post->ID;
  $size = (is_single()) ? 'blog-single':'blog-regular';
  $terms = get_the_terms(get_the_ID(), 'category');
  $term_names = array();
  if (count($terms) > 0):
    foreach ($terms as $term):
      $term_names[] = $term->name;
    endforeach;
  endif;
  $image_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $size);
  $post_options = get_post_meta( $post_id, '_custom_post_options', true );
  $gallery       = (!empty($post_options['post_gallery'])) ? $post_options['post_gallery']:'';
  $blog_post_type  = (!empty($post_options['blog_post_type'])) ? $post_options['blog_post_type']:'';
  $video       = (!empty($post_options['post_video'])) ? $post_options['post_video']:'';
  $image_array   = explode(',', $gallery);
?>

<?php if(!is_single()): ?>
<div id="post-<?php the_ID(); ?>" <?php post_class('blog-style1 row blog blog-content os-animation group show '.$rs_active); ?> data-os-animation="fadeInUp">
  <div class="col-md-12">
    <?php if(!post_password_required() && has_post_thumbnail()): ?>
      <div class="blog-image"><img src="<?php echo esc_url($image_url[0]); ?>" class="fadeIn blog-img" alt="blog-img-01" /></div>
    <?php endif; ?>
    <div class="col-md-1 blog-day text-center"> <span><?php the_time('d'); ?></span> </div>
  </div>
  <div class="col-md-12 frameOverlay">
      <div class="col-md-10 col-md-offset-2">
          <div class="blog-title">
              <h5 class="title"><?php the_title(); ?></h5>
              <span class="month"><?php the_time('F j, Y'); ?>  &nbsp;/&nbsp;  By <?php echo get_the_author(); ?> in <?php echo implode(', ', $term_names);?></span> </div>
          <div class="blog-content-out">
            <div class="content">
              <?php 
                if(is_search() || has_excerpt()) {
                  the_excerpt();   
                } else {
                  the_content();
                }
              ?>
            </div>
            <a href="<?php echo get_the_permalink(); ?>" class="small-button text-left">more details</a> </div>
      </div>
  </div>
</div>

<?php elseif($blog_post_type == 'video' && !post_password_required()): ?>
<div class="blog-image video-iframe"><?php echo do_shortcode($video); ?></div>

<?php elseif($blog_post_type == 'gallery' && !empty($gallery) && !post_password_required()): ?>
<div data-ride="carousel" class="carousel slide" id="carousel-example-generic">
  <div class="carousel-inner">
      <?php
        foreach($image_array as $key => $id):
        $active_class  = ( $key == 0 ) ? ' active':'';
        $image_src  = wp_get_attachment_image_src( $id, 'blog-single' );
      ?>
      <div class="item <?php echo sanitize_html_class($active_class); ?>"><img alt="" src="<?php echo esc_url($image_src[0]); ?>"></div>
    <?php endforeach; ?>
  </div>
<a data-slide="prev" role="button" href="#carousel-example-generic" class="left carousel-control icon-prev"> <i class="fa fa-angle-left"></i> </a> <a data-slide="next" role="button" href="#carousel-example-generic" class="right carousel-control icon-next"> <i class="fa fa-angle-right"></i> </a> </div>

<?php else: ?>

<?php if(has_post_thumbnail() && !post_password_required()): ?>
<div class="col-md-12">
  <div class="blog-image"><img src="<?php echo esc_url($image_url[0]); ?>" class="fadeIn blog-img" alt="" /></div>
</div>
<?php endif; ?>

<?php endif; ?>
