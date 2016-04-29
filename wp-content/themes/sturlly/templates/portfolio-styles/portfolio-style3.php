<?php
/**
 *
 * Portfolio Style 3
 * @since 1.0.0
 * @version 1.1.0
 *
 */
global $post;
$post_category = get_the_terms($post->ID, 'portfolio-category');
$post_id         = get_the_ID();
$post_options    = get_post_meta( $post_id, '_custom_portfolio_post_options', true );
$price           = (!empty($post_options['pt_post_price'])) ? $post_options['pt_post_price']:'';
$slug = '';
$category = '';

foreach($post_category as $cat) { 
  $slug .= $cat->slug.' ';
  $category .= $cat->slug.', ';
}

?> 

<li class="portfolio-item item col-md-3 col-sm-3 <?php echo sanitize_html_classes($slug); ?> style cs-style-3" data-rel="popup-<?php print $post->ID;?>">
  <figure class="portfolio-figure"> <?php if(has_post_thumbnail()) { the_post_thumbnail('portfolio');} ?>
      <figcaption>
          <h4 class="title"><?php the_title(); ?></h4>
          <span><?php echo esc_html($price); ?></span></figcaption>
  </figure>
</li>