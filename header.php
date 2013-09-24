<!doctype html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title><?php wp_title(" - ", true, "right"); ?><?php bloginfo('name'); ?></title>
  <meta name="author" content="André Rendeiro">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="HandheldFriendly" content="True">
  <meta name="viewport" content="width=device-width, maximum-scale=1.0">
  <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
  <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/style.css">
  <link href='http://fonts.googleapis.com/css?family=Cuprum:400,700' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Junge' rel='stylesheet' type='text/css'>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/menuslider.js"></script>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/animate.js"></script>
<!--[if lt IE 9]>
  <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' );?>
	<?php wp_head(); ?>
</head>

<body>
<?php include_once("analyticstracking.php") ?>
<?php add_filter('show_admin_bar', '__return_false');?>

<a id='home' href='/wp-admin'><img class="social" src="<?php bloginfo('template_directory');?>/img/32x32/wordpress-32.png"></a>
<nav id="n">

  <h1 id='sitetitle'><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>

  <div id="navbar"><a href="#">Nav Menu</a></div>

  <?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'container' => false, 'theme_location' => 'header-menu' ) ); ?>

  <div id='socialbuttons'>
    <!-- Icons from here: http://www.pixelfrau.com/free-gray-circle-social-media-icons -->
    <a class="socialIcons" href="http://twitter.com/afrendeiro" title="Follow me on Twitter" alt="Twitter Icon" target="_blank"><img class="social" src="<?php bloginfo('template_directory');?>/img/32x32/twitter-32.png"></a>
    <a class="socialIcons" href="http://gplus.to/andrerendeiro" title="Add me on Google+" alt="Google Plus Icon" target="_blank"><img class="social" src="<?php bloginfo('template_directory');?>/img/32x32/googleplus-32.png"></a>
    <a class="socialIcons" href="http://github.com/afrendeiro" title="Fork me on Github" alt="Github Icon" target="_blank"><img class="social" src="<?php bloginfo('template_directory');?>/img/32x32/github-32.png"></a>
    <script type="text/javascript" src="<?php bloginfo('template_directory');?>/js/obfuscate-email_nav.js" language="javascript"></script>
    <a class="socialIcons" href="<?php bloginfo('rss2_url'); ?>" title="Subscribe to my RSS feed" alt="RSS Icon" target="_blank"><img class="social" src="<?php bloginfo('template_directory');?>/img/32x32/rss-32.png"></a>
  </div>

</nav>
	
  <div id="cc">
      <a rel="license" href="http://creativecommons.org/licenses/by/3.0/" target="_blank"><img id='CC' alt="Creative Commons License" src="http://i.creativecommons.org/l/by/3.0/80x15.png" /></a>
  </div>
	
	<div id="mainbody">
		<header id="top">
    <!--
			<div class="wrapper">
				<h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
			</div>		
      -->
		</header>

