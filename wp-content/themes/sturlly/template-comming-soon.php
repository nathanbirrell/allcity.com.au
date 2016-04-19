<?php
/**
 *
 * Template Name: Comming Soon
 * @since 1.0.0
 * @version 1.0.0
 *
 */
?><!DOCTYPE html>
<!--[if lte IE 6]> <html class="no-js ie  lt-ie10 lt-ie9 lt-ie8 lt-ie7 ancient oldie" lang="en-US"> <![endif]-->
<!--[if IE 7]>     <html class="no-js ie7 lt-ie10 lt-ie9 lt-ie8 oldie" lang="en-US"> <![endif]-->
<!--[if IE 8]>     <html class="no-js ie8 lt-ie10 lt-ie9 oldie" lang="en-US"> <![endif]-->
<!--[if IE 9]>     <html class="no-js ie9 lt-ie10 oldie" lang="en-US"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" dir="ltr" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo('charset'); ?>" />
<!--[if IE]> <meta http-equiv="X-UA-Compatible" content="IE=edge"> <![endif]-->
<title><?php wp_title( '-', true, 'right' ); ?></title>
<!-- Set the viewport width to device width for mobile -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<meta name="author" content="ppandp">
<meta name="Description" content="<?php bloginfo('name'); ?>" />

<!-- favicon -->
<?php if ( cs_get_option( 'general_favicon' ) ) { echo '<link rel="shortcut icon" href="'. cs_get_option( 'general_favicon' ) .'" type="image/png" />'; } ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php

// get the framework value
$bg_url = cs_get_option('comming_bg');
$year   = cs_get_option('comming_year');
$month  = cs_get_option('comming_month');
$day    = cs_get_option('comming_day');
$logo   = cs_get_option('comming_logo');
$csocial_fb = cs_get_option('csocial_fb');
$csocial_twitter = cs_get_option('csocial_twitter');
$csocial_linkedin = cs_get_option('csocial_linkedin');
$csocial_youtube = cs_get_option('csocial_youtube');
$csocial_dribble = cs_get_option('csocial_dribble');

?>

<div class="coming-soon"> 
  <!-- HOME SECTION -->
  <section id="home" class="full-screen" style="background-image:url('<?php echo esc_url($bg_url); ?>');">
      <div class="main">
          <div class="page">
              <div class="container">
                  <div class="logo"><img src="<?php echo esc_url($logo); ?>" alt="" /></div>
                  <div id="counter" data-year="<?php echo esc_attr($year); ?>" data-month="<?php echo esc_attr($month); ?>" data-day="<?php echo esc_attr($day); ?>"></div>
                  <div class="home">
                      <h1 class="align-center"><?php echo esc_html(cs_get_option('comming_heading')); ?></h1>
                      <p class="text"><?php echo esc_html(cs_get_option('comming_desc')); ?></p>
                      <div class="notify-by-email align-center">
                          <div class="row form-notify">
                              <form action="javascript:void(0)" id="notifyMe" name="notifyMe" method="POST" class="center-block align-center">
                                  <div class="input-group">
                                      <input type="text" class="form-control email-add" id="email" name="email" placeholder="Enter your email address">
                                      <span class="input-group-btn">
                                          <button class="btn btn-default notify-button" id="submitbutton" name="submitbutton"><span>Get Notified</span></button>
                                      </span> </div>
                                  <div id="successmsg"></div>
                              </form>
                          </div>
                      </div>
                      <div class="social">
                          <ul class="socials-icons">
                            <?php if(!empty($csocial_fb)): ?><li><a href="<?php echo esc_url($csocial_fb); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li><?php endif; ?>
                            <?php if(!empty($csocial_twitter)): ?><li><a href="<?php echo esc_url($csocial_twitter); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li><?php endif; ?>
                            <?php if(!empty($csocial_linkedin)): ?><li><a href="<?php echo esc_url($csocial_linkedin); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li><?php endif; ?>
                            <?php if(!empty($csocial_youtube)): ?><li><a href="<?php echo esc_url($csocial_youtube); ?>" target="_blank"><i class="fa fa-youtube"></i></a></li><?php endif; ?>
                            <?php if(!empty($csocial_dribble)): ?><li><a href="<?php echo esc_url($csocial_dribble); ?>" target="_blank"><i class="fa fa-dribbble"></i></a></li><?php endif; ?>
                            <?php if(!empty($csocial_rss)): ?><li><a href="<?php echo esc_url($csocial_rss); ?>"><i class="fa fa-rss"></i></a></li><?php endif; ?>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  
</div>

<?php wp_footer(); ?>

</body>
</html>
