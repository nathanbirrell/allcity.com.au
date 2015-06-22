<?php
/**
 *
 * Portfolio Style 4
 * @since 1.0.0
 * @version 1.1.0
 *
 */
global $post;
$post_category   = get_the_terms($post->ID, 'portfolio-category');
$post_id         = get_the_ID();
$post_options    = get_post_meta( $post_id, '_custom_portfolio_post_options', true );
$price           = (!empty($post_options['pt_post_price'])) ? $post_options['pt_post_price']:'';
$discount        = (!empty($post_options['pt_post_price_discount'])) ? $post_options['pt_post_price_discount']:'';
$slug = '';
$category = '';

foreach($post_category as $cat) { 
  $slug .= $cat->slug.' ';
  $category .= $cat->slug.', ';
}

?> 

<li class="portfolio-item col-md-3 col-sm-3 <?php echo sanitize_html_classes($slug); ?> style cs-style-3">
    <figure class="portfolio-figure text-center"> <?php if(has_post_thumbnail()) { the_post_thumbnail('portfolio');} ?>
        <figcaption>
            <h4 class="title"><?php the_title(); ?></h4>
            <!-- <span>8 Days / 7 Nights</span> -->
            <span class="tour-price-popup"><?php echo esc_html($price); ?> 
                <?php if(!empty($discount)): ?>
                    <span class="red-font">(<?php echo esc_html($discount); ?> OFF)</span>
                <?php endif; ?>
            </span>
            <div class="black-line"></div>
            <div class="text-center tour-details"><?php the_excerpt(); ?></div>
            <a href="#" class="small-button">Explore Now</a>
        </figcaption>
    </figure>
</li>