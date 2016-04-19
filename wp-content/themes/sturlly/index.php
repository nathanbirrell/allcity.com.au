<?php
/**
 *
 * The template for displaying index pages.
 * @since 1.0.0
 * @version 1.1.0
 *
 */
get_header(); 

$background = cs_get_option('index_bg');
$bg_el = '';
if(!empty($background)) {
  $bg_el = ' style="background-image:url('.esc_url($background).');"';
}

?>

<div class="blog-header blog-list-header-style1"<?php echo $bg_el; ?>>
    <div class="gradient-overlay">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="intro-section os-animation" data-os-animation="fadeIn">
                        <h1 class="intro"><span class="highlight"><?php echo esc_html(cs_get_option('index_heading')); ?></span><br>
                            <?php echo esc_html(cs_get_option('index_desc')); ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- blog listing -->
<section id="blog-list" class="blog-list white-bg blog-page">
    <div class="container">
        <div class="row">
            <!-- left content area -->
            <div class="col-md-8 col-sm-8 blog-left">
                <div class="blog-listing">
                    <ul class="blog-post">

                      <?php
                        while ( have_posts() ) : the_post();

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
get_footer();
