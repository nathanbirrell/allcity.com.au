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

$post_category = get_the_terms($post_id, 'portfolio-category');
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

<li class="popup-slideshow content-scroll">
    <figure class="ipad-scroll">
        <figcaption>
            <div class="popup-slider">
                <div id="carousel1" class="carousel slide" data-ride="carousel">

                    <?php if(!empty($gallery_images)): ?>
                    <ol class="carousel-indicators">
                        <?php foreach($image_array as $key => $image_id): $active_class  = ( $key == 0 ) ? ' class="active"':''; ?>
                          <li data-target="#carousel1" data-slide-to="<?php echo esc_attr($key); ?>"<?php echo $active_class; ?>></li>
                        <?php endforeach; ?>
                    </ol>
                    <?php endif; ?>

                    <div class="carousel-inner">

                        <?php 
                          if(!empty($gallery_images)): foreach($image_array as $key => $image_id): 
                          $active_class  = ( $key == 0 ) ? ' active':''; 
                          $image_src  = wp_get_attachment_image_src( $image_id, 'portfolio-single' );
                        ?>
                          <div class="item <?php echo $active_class; ?>"> <img src="<?php echo esc_url($image_src[0]); ?>" alt="work-01"/></div>
                        <?php endforeach; else: ?>

                        <div class="item active"><?php the_post_thumbnail('portfolio-single'); ?></div>

                      <?php endif; ?>

                    </div>
                </div>
            </div>
            <div class="right-part">
                <h4 class="title text-left"><?php the_title(); ?></h4>
                <span class="text-left category"><?php echo esc_html($category); ?></span>
                <div class="popup-line"></div>

                <?php if(!empty($additional_text)): ?>
                  <span class="work-details"><?php echo esc_html($additional_text); ?></span>
                  <div class="popup-line"></div>
                <?php endif; ?>
                
                <?php the_content(); ?>

                <?php if(!empty($about_client)): ?>
                  <div class="popup-line"></div>
                  <?php if($review): ?>
                    <div class="reviews"><i class="fa fa-star i-font-green"></i><i class="fa fa-star i-font-green"></i><i class="fa fa-star i-font-green"></i><i class="fa fa-star i-font-green"></i><i class="fa fa-star-half-o i-font-green"></i></div>
                  <?php else: ?>
                    <span class="work-details">Client Speak</span>
                  <?php endif; ?>
                  <p class="client-speak"><?php echo esc_html($about_client); ?></p>
                <?php endif; ?>

            </div>
        </figcaption>
    </figure>
</li>