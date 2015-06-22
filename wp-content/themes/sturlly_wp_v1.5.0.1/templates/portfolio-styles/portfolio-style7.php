<?php
/**
 *
 * Portfolio Style 6
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

<li class="portfolio-item col-md-3 col-sm-3 <?php echo sanitize_html_classes($slug); ?> style cs-style-3">
    <figure class="portfolio-figure"> <?php if(has_post_thumbnail()) { the_post_thumbnail('portfolio');} ?>
        <figcaption>
            <h4 class="title"><?php the_title(); ?></h4>
            <span><?php echo esc_html($category); ?></span> <a class="text-right" href="javascript:;"><i class="fa fa-plus i-font-yellow"></i></a> </figcaption>
    </figure>
</li>