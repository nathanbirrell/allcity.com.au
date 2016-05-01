<?php
/**
 *
 * Clients
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function rs_model( $atts, $content = '' ) {

  global $wp_query, $post;

	extract( shortcode_atts( array(
  	'id'    => '',
  	'class' => '',
    'cats'  => '',
    'limit' => '',
	), $atts ) );


  $id                 = ( $id ) ? ' id="'. $id .'"' : '';
  $class              = ( $class ) ? ' '. $class : '';

  $args = array(
    'post_type'      => 'model',
    'posts_per_page' => $limit
  );

  if( $cats ) {
    $args['tax_query'] = array(
      array(
        'taxonomy' => 'model-category',
        'field'    => 'ids',
        'terms'    => explode( ',', $cats )
      )
    );
  }


  $tmp_query  = $wp_query;
  $wp_query   = new WP_Query( $args );

  ob_start();

  while( have_posts() ) : the_post();
    $post_id            = get_the_ID();
    $post_options       = get_post_meta( $post_id, '_custom_model_post_options', true );
    $model_description  = (!empty($post_options['model_sub_heading'])) ? $post_options['model_sub_heading']:'';
    $image_pos          = (!empty($post_options['model_featured_position'])) ? $post_options['model_featured_position']:'';

    if($image_pos == 'right') {
      $thumb_class = 'float-right';
      $content_class = 'float-left';
    } else {
      $thumb_class = '';
      $content_class = '';
    }
  ?>

  <div <?php echo esc_attr($id); ?> class="col-lg-6 col-md-6 col-sm-6 models-main no-padding <?php echo sanitize_html_classes($class); ?>">
    <?php if(has_post_thumbnail()): ?>
      <div class="models-photo col-lg-6 col-md-12 col-sm-12 <?php echo sanitize_html_classes($thumb_class); ?> no-padding"><?php the_post_thumbnail('portfolio'); ?></div>
    <?php endif; ?>
    <div class="col-lg-6 col-md-12 col-sm-12 models-text <?php echo sanitize_html_classes($content_class); ?> white-text no-padding">
        <h3 class="model-name"><?php the_title(); ?></h3>
        <p class="model-des"><?php echo esc_html($model_description); ?></p>
        <div class="margin-top"><?php the_content(); ?></div>
        <a class="small-button inner-link" href="#about">About Model</a>
    </div>
  </div>

  <?php

  endwhile;
  wp_reset_query();
  wp_reset_postdata();
  $wp_query = $tmp_query;

  $output = ob_get_clean();

  return $output;

}
add_shortcode('rs_model', 'rs_model');
