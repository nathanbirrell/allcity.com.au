<?php
/**
 *
 * Audio Post Format
 * @since 1.0
 * @version 1.2.0
 *
 */
?>
<?php
  global $rs_active;
  $size = (is_single()) ? 'blog-single':'blog-regular';
  $terms = get_the_terms(get_the_ID(), 'category');
  $term_names = array();
  if (count($terms) > 0):
    foreach ($terms as $term):
      $term_names[] = $term->name;
    endforeach;
  endif;
  $image_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $size);
?>

<?php if(!is_single()): ?>
<div id="post-<?php the_ID(); ?>" <?php post_class('blog-style1 row blog blog-content os-animation group show '.$rs_active); ?> data-os-animation="fadeInUp">
  
    <div class="col-md-12">
      <?php if(!post_password_required()): ?>
        <div class="blog-image"><?php if(has_post_thumbnail()):?><img src="<?php echo esc_url($image_url[0]); ?>" class="fadeIn blog-img" alt="" /><?php endif; ?><?php echo rs_post_media( get_the_content() ); ?></div>
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
<?php else: if(!post_password_required()): ?>

<div class="col-md-12">
  <div class="blog-image"><img src="<?php echo esc_url($image_url[0]); ?>" class="fadeIn blog-img" alt="" /><?php echo rs_post_media( get_the_content() ); ?></div>
</div>

<?php endif; endif; ?>
