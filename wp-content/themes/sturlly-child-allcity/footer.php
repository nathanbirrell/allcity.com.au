<?php
/**
 *
 * Footer.
 * @since 1.0.0
 * @version 1.0.0
 *
 */
$footer_bg          = cs_get_option('footer_bg');
$fsocial_fb         = cs_get_option('fsocial_fb');
$fsocial_google     = cs_get_option('fsocial_google');
$fsocial_twitter    = cs_get_option('fsocial_twitter');
$fsocial_linkedin   = cs_get_option('fsocial_linkedin');
$fsocial_youtube    = cs_get_option('fsocial_youtube');
$fsocial_dribble    = cs_get_option('fsocial_dribble');
$fsocial_pinterest  = cs_get_option('fsocial_pinterest');
$fsocial_rss        = cs_get_option('fsocial_rss');
$csocial_intagram   = cs_get_option('csocial_intagram');
?>


<?php include("includes/cta-footer.php"); ?>

<!-- footer -->
<footer id="footer" class="footer footer-style1" style="background-image:url('<?php echo esc_url($footer_bg); ?>');">
    <div class="color-overlay">
        <div class="container">
            <ul class="social footer-social text-center">
                <?php if(!empty($fsocial_fb)): ?><li><a href="<?php echo esc_url($fsocial_fb); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li><?php endif; ?>
                <?php if( ! empty( $csocial_intagram ) ): ?><li><a href="<?php echo esc_url( $csocial_intagram ); ?>" target="_blank"><i class="fa fa-instagram"></i></a></li><?php endif; ?>
                <?php if(!empty($fsocial_google)): ?><li><a href="<?php echo esc_url($fsocial_google); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li><?php endif; ?>
                <?php if(!empty($fsocial_twitter)): ?><li><a href="<?php echo esc_url($fsocial_twitter); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li><?php endif; ?>
                <?php if(!empty($fsocial_linkedin)): ?><li><a href="<?php echo esc_url($fsocial_linkedin); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li><?php endif; ?>
                <?php if(!empty($fsocial_youtube)): ?><li><a href="<?php echo esc_url($fsocial_youtube); ?>" target="_blank"><i class="fa fa-youtube"></i></a></li><?php endif; ?>
                <?php if(!empty($fsocial_dribble)): ?><li><a href="<?php echo esc_url($fsocial_dribble); ?>" target="_blank"><i class="fa fa-dribbble"></i></a></li><?php endif; ?>
                <?php if(!empty($fsocial_pinterest)): ?><li><a href="<?php echo esc_url($fsocial_pinterest); ?>" target="_blank"><i class="fa fa-pinterest"></i></a></li><?php endif; ?>
                <?php if(!empty($fsocial_rss)): ?><li><a href="<?php echo esc_url($fsocial_rss); ?>"><i class="fa fa-rss"></i></a></li><?php endif; ?>
            </ul>
            <div class="row os-animation" data-os-animation="">
                <div class="transparent-line"></div>
            </div>


           <div class="contact-style1">
              <div class="head">
                 <span class="contact-title"></span>
                 <p class="content contact-text"></p>
                 <p><strong>Visit the Showroom</strong></p>
                 <p> <a href="https://goo.gl/maps/arnNrUny3dq" title="Find Us in Malvern East">516 Waverley Road,<br>
                    Malvern East, VIC 3145
                 </a></p>
                 <p></p>
              </div>
           </div>

            <div class="row os-animation" data-os-animation="">
                <p class="text-center copy"><?php echo wp_kses_post(cs_get_option('copyright_text')); ?><i class="fa fa-code"></i> built by <a href="http://nathanbirrell.me/" target="_blank">Nathan Birrell</a></p>
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


<!-- Root element of PhotoSwipe. Must have class pswp. -->
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

    <!-- Background of PhotoSwipe.
         It's a separate element as animating opacity is faster than rgba(). -->
    <div class="pswp__bg"></div>

    <!-- Slides wrapper with overflow:hidden. -->
    <div class="pswp__scroll-wrap">

        <!-- Container that holds slides.
            PhotoSwipe keeps only 3 of them in the DOM to save memory.
            Don't modify these 3 pswp__item elements, data is added later on. -->
        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>

        <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
        <div class="pswp__ui pswp__ui--hidden">

            <div class="pswp__top-bar">

                <!--  Controls are self-explanatory. Order can be changed. -->

                <div class="pswp__counter"></div>

                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

                <button class="pswp__button pswp__button--share" title="Share"></button>

                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                <!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->
                <!-- element will get class pswp__preloader--active when preloader is running -->
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                      <div class="pswp__preloader__cut">
                        <div class="pswp__preloader__donut"></div>
                      </div>
                    </div>
                </div>
            </div>

            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div>
            </div>

            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
            </button>

            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
            </button>

            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>

        </div>
    </div>
</div>

<!-- Mailchimp include -->
<script type="text/javascript" src="//s3.amazonaws.com/downloads.mailchimp.com/js/signup-forms/popup/embed.js" data-dojo-config="usePlainJson: true, isDebug: false"></script>

</body>
</html>
