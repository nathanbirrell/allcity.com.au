<?php
/**
 *
 * The template for displaying archive pages.
 * @since 1.0.0
 * @version 1.1.0
 *
 */
get_header(); 

$background = cs_get_option('404_bg');
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
                        <h1 class="intro"><span class="highlight">
                          404
                        </span><br>
                          <?php echo esc_html(cs_get_option('404_desc')); ?></h1>
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
                <div class="blog-listing text-center">
                    <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will gice you a complete account of the system, and expound the actual teachings of the great.</p>
                    <a id="href-about" class="highlight-button-black inner-link" href="<?php echo esc_url( home_url( '/' ) ); ?>">Back to home</a>
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
</section>
<!-- blog list end -->

<?php
get_footer();
