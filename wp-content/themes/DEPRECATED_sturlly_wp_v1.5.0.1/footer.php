<?php
/**
 *
 * Footer.
 * @since 1.0.0
 * @version 1.0.0
 *
 */
$footer_bg        = cs_get_option('footer_bg');
$fsocial_fb       = cs_get_option('fsocial_fb');
$fsocial_twitter  = cs_get_option('fsocial_twitter');
$fsocial_linkedin = cs_get_option('fsocial_linkedin');
$fsocial_youtube  = cs_get_option('fsocial_youtube');
$fsocial_dribble  = cs_get_option('fsocial_dribble');
$fsocial_rss      = cs_get_option('fsocial_rss');
?>

<!-- footer -->
<footer id="footer" class="footer footer-style1" style="background-image:url('<?php echo esc_url($footer_bg); ?>');">
    <div class="color-overlay">
        <div class="container">
            <div class="row os-animation" data-os-animation="bounceIn">
                <ul class="social footer-social text-center">
                    <?php if(!empty($fsocial_fb)): ?><li><a href="<?php echo esc_url($fsocial_fb); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li><?php endif; ?>
                    <?php if(!empty($fsocial_twitter)): ?><li><a href="<?php echo esc_url($fsocial_twitter); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li><?php endif; ?>
                    <?php if(!empty($fsocial_linkedin)): ?><li><a href="<?php echo esc_url($fsocial_linkedin); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li><?php endif; ?>
                    <?php if(!empty($fsocial_youtube)): ?><li><a href="<?php echo esc_url($fsocial_youtube); ?>" target="_blank"><i class="fa fa-youtube"></i></a></li><?php endif; ?>
                    <?php if(!empty($fsocial_dribble)): ?><li><a href="<?php echo esc_url($fsocial_dribble); ?>" target="_blank"><i class="fa fa-dribbble"></i></a></li><?php endif; ?>
                    <?php if(!empty($fsocial_rss)): ?><li><a href="<?php echo esc_url($fsocial_rss); ?>"><i class="fa fa-rss"></i></a></li><?php endif; ?>
                </ul>
            </div>
            <div class="row os-animation" data-os-animation="bounceIn">
                <div class="transparent-line"></div>
            </div>
            <div class="row os-animation" data-os-animation="bounceIn">
                <p class="text-center copy"><?php echo wp_kses_post(cs_get_option('copyright_text')); ?></p>
            </div>
        </div>
    </div>
</footer>
<!-- footer end -->

<!-- scroll to top -->
<a href="javascript:;" class="scrollToTop"><i class="fa fa-angle-up"></i></a>
<!-- scroll to top End... -->

</div><!--end of main-->
<?php wp_footer(); ?>
</body>
</html>
