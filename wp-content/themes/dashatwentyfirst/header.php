<!DOCTYPE html>

<html dir="ltr" lang="en-US">
<head>
	<meta charset="utf-8" />
	<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<title><?php bloginfo('name'); wp_title();?></title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta name="viewport" content="width=device-width">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style"
	content="black">
		<?php wp_head();?>
</head>

<body <?php body_class($class); ?>>

<div class="wrapper">

	<header class="header">
	<?php wp_nav_menu( array( 
		'theme_location' => 'menu',
		'menu_class'      => 'myMenu'
	)); ?>
	<ul class="myMenu">
		<li><a href=""></a></li>
	</ul>
		<hgroup class="screen-reader-text">		
			<h2 id="site-description"><?php bloginfo( 'description' ); ?>
			</h2>
			<p><a href='<?php echo home_url();?>'>home</a></p>
			
		</hgroup>

	</header><!-- .header-->
