<?php
/**
 *
 * Template Name: Blog With Sidebar
 *
 */
get_header();
get_template_part( 'templates/page-header' );
global $wp_query, $post, $paged;
if( is_front_page() || is_home() ) {
  $paged = ( get_query_var('paged') ) ? intval( get_query_var('paged') ) : intval( get_query_var('page') );
} else {
  $paged = intval( get_query_var('paged') );
}

$args = array(
  'post_type'       => 'post',
  'posts_per_page'  =>  4,
  'paged'           => $paged,
);

$tmp_query  = $wp_query;
$wp_query   = new WP_Query( $args );
if ( post_password_required($post) ):

?>
<section id="blog-list" class="blog-list white-bg blog-page">
  <div class="container">
    <div class="row">
      <?php echo get_the_password_form(); ?>
    </div>
  </div>
</section>

<?php else : ?>
<!-- blog listing -->
<section id="blog-list" class="blog-list white-bg blog-page">
    <div class="container">
        <div class="row">
            <!-- left content area -->
            <div class="col-md-8 col-sm-8 blog-left">
                <div class="blog-listing">
                    <ul class="blog-post">

                        <?php if ( have_posts() ) while ( have_posts() ) : the_post();

                          $post_format = (get_post_format() == true) ? get_post_format():'standard';
                          get_template_part('post-formats/layout-3/content', $post_format );
                          endwhile;

                        ?>

                    </ul>
                </div>
                <!-- blog listing end -->
            </div>
            <!-- right content -->
            <div class="col-md-3 col-sm-3 blog-right">
                <div class="sidepanel">
                  <?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('sidebar') ); ?>
                </div>
            </div>
            <!-- right content end -->
        </div>
    </div>

    <!-- pagination -->
    <?php rs_paging_nav( array('nav' => 'default') ); ?>

    <!-- pagination end -->
</section>
<!-- blog list end -->

<?php
wp_reset_query();
wp_reset_postdata();
$wp_query = $tmp_query;
endif;
get_footer();
