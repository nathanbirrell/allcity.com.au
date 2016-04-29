<?php
/**
 * Blog Single Page
 *
 * @package sturlly
 * @since 1.0
 *
 */
get_header();
global $post;
$image_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
$el_style_bg = ($image_url && !empty($image_url)) ? ' style="background-image:url('.esc_url($image_url[0]).');"':'';
$post_id = $post->ID;
$terms = get_the_terms(get_the_ID(), 'category');
$term_names = array();
if (count($terms) > 0 && is_array( $terms ) ):
  foreach ($terms as $term):
    $term_names[] = $term->name;
  endforeach;
endif;

?>

<div class="blog-details-header blog-details-header-style1"<?php echo $el_style_bg; ?>>
    <div class="gradient-overlay-blue">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="intro-section os-animation" data-os-animation="fadeIn">
                        <div class="blog-title">
                          <?php if(cs_get_option('date')): ?>
                            <span class="medium light-gray"><?php the_time('l - F d, Y'); ?> </span>
                          <?php endif; ?>
                            <h3 class="blog-details-title"><?php the_title(); ?></h3>
                            <div class="white-line"></div>
                            <span class="month medium white-text no-margin">
                            <a href="#" class="white-text"><?php the_author_meta( 'user_nicename', $post->post_author ); ?></a> -

                            <?php if(cs_get_option('category')): ?>
                              <?php echo implode(', ', $term_names);?> -
                            <?php endif; ?>

                            <?php if(cs_get_option('tags')): ?>
                              <?php echo get_the_tag_list('<span class="tags">',', ','</span>'); ?> -
                            <?php endif; ?>

                            <?php if(cs_get_option('comment')): ?>
                            <a href="#" class="white-text"><?php echo get_comments_number( $post->ID ); ?> Comments</a></span>
                          <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section id="blog-details" <?php post_class('blog-details white-bg blog-page'); ?>>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 left">
                <div class="blog-listing">
                    <?php
                      while ( have_posts() ) : the_post();
                      $post_format = (get_post_format() == true) ? get_post_format():'standard';
                      get_template_part('post-formats/layout-1/content', $post_format );
                    ?>

                    <div class="col-md-12 blog-content">
                      <article class="contentarea">
                        <?php the_content(); ?>
                      </article>
                    </div>

                  <?php endwhile; ?>

                    <div class="blogpost_share">
                        <ul class="text-center">
                          <?php rs_social_share(); ?>
                        </ul>
                    </div>
                    <!-- blog details end -->
                </div>
            </div>

            <!-- comment -->
            <div class="comments-main">
              <!-- Comments -->
              <?php
                // If comments are open or we have at least one comment, load up the comment template
                if ( comments_open() || '0' != get_comments_number() ) {
                    comments_template( '', true );
                }

              ?>
            </div>

        </div>
    </div>
    <!-- comment end... -->
</section>

<?php get_footer(); ?>
