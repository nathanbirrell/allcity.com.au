<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section
 */
?><!DOCTYPE html>
<html>
<!--<![endif]-->
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width">
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
    <![endif]-->

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- favicon -->
    <link rel="shortcut icon" href="/wp-content/themes/allcity/images/favicon.png" />
    <!-- google font -->
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" />
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Oswald:300,400,700" />
    <!-- font awesome-->
    <link rel="stylesheet" type="text/css" href="/wp-content/themes/allcity/css/font-awesome.min.css" />
    <!-- Animation -->
    <link rel="stylesheet" type="text/css"  id="animationcss" href="/wp-content/themes/allcity/css/animation.css" />
    <!-- bootstrap -->
    <link rel="stylesheet" type="text/css" href="/wp-content/themes/allcity/css/bootstrap.css" />
    <!-- custom style -->
    <link rel="stylesheet" type="text/css" href="/wp-content/themes/allcity/style.css" />
    <!-- custom scrollbar -->
    <link rel="stylesheet" type="text/css" href="/wp-content/themes/allcity/css/custom-scrollbar.css">
    <!-- responsive -->
    <link rel="stylesheet" type="text/css" href="/wp-content/themes/allcity/css/responsive.css">

    <?php wp_head(); ?>
</head>


<body>
    <!-- main page -->
    <div class="main"> 
        <!-- header-->
        <header id="home" data-stellar-background-ratio="0.5" class="header animated no-background">
            <nav class="navbar navbar-default navbar-fixed-top nav-transparent overlay-nav sticky-nav" role="navigation">
                <div class="container main-navigation">
                    <div class="col-md-3 float-left"> <a class="logo-dark" href="#home"><img alt="logo-dark" src="/wp-content/themes/allcity/images/logo-dark.png" class="logo-dark" /></a> <a class="logo-light" href="#home"><img alt="logo-white" src="/wp-content/themes/allcity/images/logo-white.png" class="logo-white" /></a> </div>
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle Navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                    </div>
                    <div class="col-md-9 text-left float-right collapse-navation">
                        <div class="navbar-collapse collapse navbar-inverse no-transition">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="#about">About</a></li>
                                <li><a href="#work">Work</a></li>
                                <li><a href="#expertise">Expertise</a></li>
                                <li><a href="#team">Team</a></li>
                                <li><a href="#blog">Blog</a></li>
                                <li class="last"><a href="#contact">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>

            <div class="home-slider full-screen">
                <div id="carousel3" class="carousel slide " data-ride="carousel3" data-interval='false'>
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li class="active" data-slide-to="0" data-target="#carousel3"></li>
                        <li data-slide-to="1" data-target="#carousel3" class=""></li>
                        <li data-slide-to="2" data-target="#carousel3" class=""></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="slider-gradient-overlay"></div>
                            <div style="background-image:url('http://placehold.it/1920x1080');" class="fill"></div>
                            <div class="slider-text">
                                <div class="col-md-6">
                                    <h1>Modern Portfolio</h1>
                                    <span>Useful features and a distinctive minimal design.</span>
                                    <a href="#about" class="highlight-button inner-link" >Digital Marketing</a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="slider-gradient-overlay"></div>
                            <div style="background-image:url('http://placehold.it/1920x1080');" class="fill"></div>
                            <div class="slider-text">
                                <div class="col-md-6">
                                    <h1>Powerful Slider</h1>
                                    <span>You will define what you want to use on your website.</span>
                                    <a href="#about" class="highlight-button inner-link" >Digital Marketing</a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="slider-gradient-overlay"></div>
                            <div style="background-image:url('http://placehold.it/1920x1080');" class="fill"></div>
                            <div class="slider-text">
                                <div class="col-md-6">
                                    <h1>Responsive Theme</h1>
                                    <span>It’s fully responsive, has moduled structure.</span>
                                    <a href="#about" class="highlight-button inner-link" >Digital Marketing</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header end --> 