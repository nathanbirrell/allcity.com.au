<?php
/**
 *
 * Page ( page.php )
 * @since 1.0.0
 * @version 1.0.0
 *
*/
get_header(); ?>

<?php
global $post;
$website_type = cs_get_option('page_type');
if($website_type == 'one-page') {
  
  $args = array(
    'post_type'      => 'page',
    'posts_per_page' => -1,
    'order'          => 'ASC',
    'orderby'        => 'menu_order',
    'post__in'       => rs_get_post_id_by_menu()
  );

  $q = new WP_Query($args);

  if ( $q->have_posts() ) : while (  $q->have_posts() ) :  $q->the_post();
?>
<section id="<?php echo get_slug(get_the_id()); ?>" class="page-section">
  <?php
    the_content();
    wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number'));
  ?>
</section>

<?php
endwhile;
endif;

} else { 
  get_template_part( 'templates/page-header' );
  $post_id = get_the_ID();
  $page_options  = get_post_meta( $post_id, '_custom_page_options', true ); 
  $page_layout_model   = (!empty($page_options['page_layout_model'])) ? $page_options['page_layout_model']:false;
?>

<div class="page-section page-multi">
  <?php
    if($page_layout_model == false) { 
      get_template_part( 'templates/page-with-container' ); 
    } else {
      get_template_part( 'templates/page-full-width' );
    }
  ?>
</div>

<?php  
}
get_footer();

