<?php
/**
 *
 * Video Post Format
 * @since 1.0
 * @version 1.2.0
 *
 */
global $rs_active;
$terms = get_the_terms(get_the_ID(), 'category');
$term_names = array();
if (count($terms) > 0):
  foreach ($terms as $term):
    $term_names[] = $term->name;
  endforeach;
endif;
?>


<?php if(!is_single()): ?>
<div id="post-<?php the_ID(); ?>" <?php post_class('blog-style1 row blog blog-content os-animation group show '.$rs_active); ?> data-os-animation="fadeInUp">
  <div class="col-md-12">
    <?php 
      if(!post_password_required()):
        echo rs_post_media( get_the_content() );
      endif; 
    ?>
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
<?php else: ?>

<div class="col-md-12">
  <?php echo rs_post_media( get_the_content() ); ?>
</div>

<?php endif; ?>
