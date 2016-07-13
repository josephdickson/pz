<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!-- Consider adding an manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <meta charset="<?php bloginfo('charset'); ?>">

	<title><?php wp_title('|', true, 'right'); ?></title>
	<!-- Mobile viewport optimized: j.mp/bplateviewport -->
	<meta name="viewport" content="width=device-width" />

	<!-- Favicon and Feed -->
	<link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> Feed" href="<?php echo home_url(); ?>/feed/">

	<!--  iPhone Web App Home Screen Icon -->
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/img/devices/reverie-icon-ipad.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/img/devices/reverie-icon-retina.png" />
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/img/devices/reverie-icon.png" />

	<!-- Enable Startup Image for iOS Home Screen Web App -->
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<link rel="apple-touch-startup-image" href="<?php echo get_template_directory_uri(); ?>/mobile-load.png" />

	<!-- Startup Image iPad Landscape (748x1024) -->
	<link rel="apple-touch-startup-image" href="<?php echo get_template_directory_uri(); ?>/img/devices/reverie-load-ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)" />
	<!-- Startup Image iPad Portrait (768x1004) -->
	<link rel="apple-touch-startup-image" href="<?php echo get_template_directory_uri(); ?>/img/devices/reverie-load-ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)" />
	<!-- Startup Image iPhone (320x460) -->
	<link rel="apple-touch-startup-image" href="<?php echo get_template_directory_uri(); ?>/img/devices/reverie-load.png" media="screen and (max-device-width: 320px)" />

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php 	
	if (function_exists('get_field')){
		$logo_header = get_field('logo_header' , 'option');
	 	$logo_url = get_field('url_header' ,  'option');
		$banner = get_field('image_banner' ,  'option');
	}
?>

<div class="container row shadow banner hide-for-print" style="background-image: url('<?php echo $banner['url']; ?>');">
<span class="large bold text-shadow text-white right hide-for-print"><?php bloginfo('name'); ?></span>





<a href="<?php echo $logo_url; ?>"><img class="left hide-for-print" alt="<?php echo $logo_header['alt']; ?>" src="<?php echo $logo_header['url']; ?>" /></a>



<span class="large bold text-shadow text-white right"></span>
</div>


<div id="top-nav" class="sticky contain-to-grid"> 

	<!-- Starting the Top-Bar -->
		<?php get_sidebar('top-bar-navigation'); ?>
	<!-- End of Top-Bar -->



</div>
<div class="container row full-page shadow">

<header class="row" role="banner">
	<div class="small-12 columns">
		<a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>
		<h4 class="subheader"><?php bloginfo('description'); ?></h4>
		<hr/>
	</div>
</header>

<!-- Start the main container -->
<section class="container row" role="document">
