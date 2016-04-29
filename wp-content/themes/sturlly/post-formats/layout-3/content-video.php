<?php
/**
 *
 * Video Post Format
 * @since 1.0
 * @version 1.2.0
 *
 */
?>
<?php
  $terms = get_the_terms(get_the_ID(), 'category');
  $term_names = array();
  if (count($terms) > 0 && !empty($terms)):
    foreach ($terms as $term):
      $term_names[] = $term->name;
    endforeach;
  endif;
?>

<?php if(!is_single()): ?>

<li <?php post_class('post-preview'); ?> id="post-<?php the_ID(); ?>">
  <?php if(!post_password_required()): ?>
    <div class="col-md-12 blog-wrapper no-padding blog-img">
      <?php echo rs_post_media( get_the_content() ); ?>
    </div>
  <?php endif; ?>
  <div class="col-md-12 col-sm-12 blog-content no-padding">
      <div class="blog-title"> <span class="medium light-gray"><?php the_time('l - F, d, Y'); ?> </span>
          <h3 class="title "><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a></h3>
          <span class="month medium"><a href="#"><?php echo get_the_author(); ?></a> - <a href="#"><?php echo implode(', ', $term_names);?></a> - <a href="#"><?php comments_number( 'No Comments', '01 Comment', '% Comments' ); ?>.</a></span> </div>
      <article class="contentarea ">
        <?php 
          if(is_search() || has_excerpt()) {
            the_excerpt();   
          } else {
            the_content();
          }
        ?>
      </article>
      <div class="blog-share"> <a class="small-button no-margin float-left" href="<?php echo get_the_permalink(); ?>">Continue Reading</a>
          <div class="blogpost_share">
              <ul class="text-center">
                <?php rs_social_share(); ?>
          </div>
      </div>
  </div>
</li>
<?php else: if(!post_password_required()): ?>

<div class="col-md-12">
  <?php echo rs_post_media( get_the_content() ); ?>
</div>

<?php endif; endif; ?>
