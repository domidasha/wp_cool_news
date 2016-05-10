<!DOCTYPE html>
<!-- [if IE 8] <html lang="en" class="ie8"> <![endif]-->
<!-- [if !IE]> <!--> <html <?php language_attributes(); ?>><!--<![endif]  -->

<head>
<meta charset="<?php bloginfo('charset');  ?>">
<title><?php wp_title('|',true,'right'); ?><?php bloginfo('name');?></title>
<meta name="description" content="<?php bloginfo('description'); ?>">
<meta name="author" content="Darya">

<!--Mobile Specigic Meta-->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- Stylesheets -->
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
<link rel="stylesheet" href="css/style.css">

<!-- [if lt IE9] 
<script src="http://html4shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->


<link href='http://fonts.googleapis.com/css?family=Economica' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
<!--menu-->
<link rel="stylesheet" href="css/superfish.css" media="screen">
<script src="js/jquery-1.9.0.min.js"></script>
<script src="js/hoverIntent.js"></script>
<script src="js/superfish.js"></script>
<script>

		// initialise plugins
		jQuery(function(){
			jQuery('#example').superfish({
				//useClick: true
			});
		});

		</script>
		<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>


<div class="wrap1">
<div class="container">
  <div class="header">
    <div class="logo">
      <h1>untitled site</h1>
    </div>
    <div class="menu">
    
    <?php
    	wp_nav_menu(array(
    			'theme_location'=>'main-menu',
    			'container'=>'',
    			'menu_class'=>'inline'
    	));
    ?>

    </div>
  </div>
  <div class="clearing"></div>
</div>
<div class="clearing"></div>
</div>
<!---header-wrap-->
<div class="wrap2">
<div class="container">
  <div class="banner"> <img src="<?php print IMG; ?>/banner-img.jpg" />
    <div class="banner-shadows"></div>
  </div>
<div class="clearing"></div>
</div>
</div>













































</head> 