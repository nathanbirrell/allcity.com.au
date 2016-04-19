<?php
/**
 *
 * Portfolio Single
 * @since 1.0.0
 * @version 1.1.0
 *
 */
global $post;
$post_id = get_the_ID();

$post_category = get_the_terms( $post_id, 'portfolio-category' );
$slug = '';
$category = '';

foreach($post_category as $cat) { 
  $category .= $cat->slug.' ';
}

$post_options    = get_post_meta( $post_id, '_custom_portfolio_options', true );
$about_client    = (!empty($post_options['pt_about_client'])) ? $post_options['pt_about_client']:'';
$additional_text = (!empty($post_options['pt_additonal_note'])) ? $post_options['pt_additonal_note']:'';
$gallery_images  = (!empty($post_options['pt_gallery'])) ? $post_options['pt_gallery']:'';
$review          = (!empty($post_options['pt_review'])) ? $post_options['pt_review']:false;

$image_array     = explode(',', $gallery_images);

?>

<div data-rel="popup-<?php print $post_id; ?>" class="popup-main">
  <div class="left-block">
    <?php if( ! empty( $gallery_images ) ) { ?>
      <div class="swiper-container" data-autoplay="5000" data-loop="1" data-speed="1000" data-center="0" data-slides-per-view="1">
        <div class="swiper-wrapper">
          <?php foreach( $image_array as $key => $image_id ) {
            $image_src  = wp_get_attachment_image_src( $image_id, 'portfolio-single' );
            ?>
            <div class="swiper-slide">
              <img src="<?php echo esc_url($image_src[0]); ?>" alt="" class="resp-img">
            </div>
          <?php } ?>
        </div>
        <div class="pagination"></div>
      </div>
    <?php } else { ?>
      <?php the_post_thumbnail('portfolio-single'); ?>
    <?php } ?>
  </div>
  <div class="right-block">
    <h4 class="title text-left"><?php the_title(); ?></h4>
    <span class="text-left category"><?php echo esc_html($category); ?></span>
    <div class="popup-line"></div>
    <?php if( ! empty( $additional_text ) ): ?>
      <span class="work-details"><?php echo esc_html( $additional_text ); ?></span>
      <div class="popup-line"></div>
    <?php endif; ?>
        
    <?php the_content(); ?>

    <?php if(!empty($about_client)): ?>
      <div class="popup-line"></div>
      <?php if( $review ): ?>
        <div class="reviews">
          <i class="fa fa-star i-font-green"></i>
          <i class="fa fa-star i-font-green"></i>
          <i class="fa fa-star i-font-green"></i>
          <i class="fa fa-star i-font-green"></i>
          <i class="fa fa-star-half-o i-font-green"></i>
        </div>
      <?php else: ?>
        <span class="work-details">Client Speak</span>
      <?php endif; ?>
      <p class="client-speak"><?php echo esc_html($about_client); ?></p>
    <?php endif; ?>
  </div>
</div>