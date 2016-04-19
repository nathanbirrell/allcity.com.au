<?php
/**
 *
 * Portfolio Style 2
 * @since 1.0.0
 * @version 1.1.0
 *
 */
global $post;
$post_category = get_the_terms($post->ID, 'portfolio-category');
$slug = '';
$category = '';

foreach($post_category as $cat) { 
  $slug .= $cat->slug.' ';
  $category .= $cat->slug.', ';
}

?> 

<li class="portfolio-item item col-md-3 col-sm-3 <?php echo sanitize_html_classes($slug); ?> portfolio-style2 style cs-style-3" data-rel="popup-<?php print $post->ID;?>">
  <figure class="portfolio-figure"> 
    <?php if(has_post_thumbnail()) { the_post_thumbnail('portfolio');} ?>
      <figcaption>
          <div class="spa-details">
              <h4 class="title white-text"><?php the_title(); ?></h4>
              <?php the_excerpt(); ?>
              <a class="small-button" href="#">View Details</a>
          </div>
      </figcaption>
  </figure>
</li>