<?php
/**
 *
 * Page Header
 * @since 1.0.0
 * @version 1.0.0
 *
*/
?>
<?php
	global $post;
	$post_id = get_the_ID();
	$page_options  = get_post_meta( $post_id, '_custom_page_options', true );
	$background    = (!empty($page_options['page_header_bg'])) ? $page_options['page_header_bg']:'';
	$description   = (!empty($page_options['page_header_description'])) ? $page_options['page_header_description']:'';
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
                        <h1 class="intro"><span class="highlight"><?php echo get_the_title(); ?></span><br>
                            <?php if(!empty($description)): ?><?php echo esc_html($description); ?><?php endif; ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>