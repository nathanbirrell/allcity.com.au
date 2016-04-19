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
  $image_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'blog-layout-2');
?>

<div data-os-animation="fadeInUp" <?php post_class('blog-style6 work-count-box blog-layout-2 col-md-4 col-sm-4 os-animation animated fadeInUp'); ?> id="post-<?php the_ID(); ?>">
    <div class="gray-bg float-left">
        <?php if(!post_password_required()): ?>
          <a href="<?php echo get_the_permalink(); ?>"><img src="<?php echo esc_url($image_url[0]); ?>" alt=""/></a>
          <?php echo rs_post_media( get_the_content() ); ?>
        <?php endif; ?>
        <div class="padding-30 no-padding-top">
            <a href="<?php echo get_the_permalink(); ?>"><span class="title"><?php the_title(); ?></span></a>
            <p class="date"><?php the_time('F j, Y'); ?>  &nbsp;/&nbsp;  By <?php echo get_the_author(); ?></p>
            <div class="gray-text width-100">            
              <?php 
                if(is_search() || has_excerpt()) {
                  the_excerpt();   
                } else {
                  the_content();
                }
              ?>
            </div>
            <a class="small-button" href="<?php echo get_the_permalink(); ?>">More Info</a>
        </div>
    </div>
</div>

