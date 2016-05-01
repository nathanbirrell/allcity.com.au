<?php
/**
 *
 * Portfolio Style All City
 * @since 1.0.0
 * @version 1.1.0
 *
 */
global $post;
$post_id = get_the_ID();
$post_category = get_the_terms($post->ID, 'portfolio-category');
$slug = '';
$category = '';

foreach($post_category as $cat) { 
  $slug .= $cat->slug.' ';
  $category .= $cat->slug.', ';
}

$post_options    = get_post_meta( $post_id, '_custom_portfolio_options', true );
$gallery_images  = (!empty($post_options['pt_gallery'])) ? $post_options['pt_gallery']:'';
$image_array     = explode(',', $gallery_images);
?> 

<?php if( ! empty( $gallery_images ) ) { ?>
<li class="portfolio-item item col-md-3 col-sm-3 gallery <?php echo sanitize_html_classes($slug); ?> " data-rel="popup-<?php print $post->ID;?>">
  <figure class="portfolio-figure gallery-thumb"> 
    <?php if(has_post_thumbnail()) { 
      $image_src_obj = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'large' );
      $image_src = esc_url($image_src_obj[0]); 
      $image_width = $image_src_obj[1];
      $image_height = $image_src_obj[2];
      ?>
      <a href="<?= $image_src ?>" title="" data-size="<?= $image_width ?>x<?= $image_height ?>"> <img src="<?= $image_src ?>" alt=""></a>
    <?php } ?>
      <figcaption itemprop="caption description" class="hidden"><?php the_title(); ?></figcaption>
  </figure>

  <?php foreach( $image_array as $key => $image_id ) {
      $image_src_obj  = wp_get_attachment_image_src( $image_id, 'large' );
      $image_src = esc_url($image_src_obj[0]); 
      $image_width = $image_src_obj[1];
      $image_height = $image_src_obj[2];
      $image_title = get_the_title($image_id);
    ?>
    <figure class="hidden" itemprop="associatedMedia" itemscope="" itemtype="http://schema.org/ImageObject">
      <a href="<?= $image_src ?>" title="<?= $image_title ?>" data-size="<?= $image_width ?>x<?= $image_height ?>">
        <img src="<?= $image_src ?>" alt="<?= $image_title ?>">
      </a>
      <figcaption itemprop="caption description" class="hidden"><?php the_title(); ?></figcaption>
    </figure>
  <?php } ?>
</li>
<?php } ?>