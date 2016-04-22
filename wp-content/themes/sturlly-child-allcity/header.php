<?php
/**
 *
 * Header.
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

<?php if ( cs_get_option( 'general_favicon' ) ) { echo '<link rel="shortcut icon" href="'. cs_get_option( 'general_favicon' ) .'" type="image/png" />'; } ?>
<?php wp_head(); ?>
</head>

<?php 
  $page_type = cs_get_option('page_type'); 
  $skin = cs_get_option('general_skin'); 
?>
<body <?php body_class($page_type.' '.$skin); ?>>

<div class="main <?php echo sanitize_html_class($skin); ?>">

    <!-- header-->
    <header id="main-header" data-stellar-background-ratio="0.5" class="header animated header-style1">
        <nav class="navbar navbar-default" role="navigation">
            <div class="container main-navigation">

                <div class="col-md-3 float-left">
                  <?php rs_site_logo(); ?>
                </div>

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle Navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                </div>
                <?php st_site_menu('', $skin); ?>
            </div>
        </nav>
    </header>
    <!-- header end -->
