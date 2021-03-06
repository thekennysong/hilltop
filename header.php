<?php if (is_single()) : $schema = 'Article'; else : $schema = 'Organization'; endif; ?>
<!doctype html>
<!--[if lt IE 7 ]><html itemscope itemtype="http://schema.org/<?php echo $schema; ?>" id="ie6" class="ie ie-old" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 7 ]>   <html itemscope itemtype="http://schema.org/<?php echo $schema; ?>" id="ie7" class="ie ie-old" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8 ]>   <html itemscope itemtype="http://schema.org/<?php echo $schema; ?>" id="ie8" class="ie ie-old" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 9 ]>   <html itemscope itemtype="http://schema.org/<?php echo $schema; ?>" id="ie9" class="ie" <?php language_attributes(); ?>><![endif]-->
<!--[if gt IE 9]><!--><html itemscope itemtype="http://schema.org/<?php echo $schema; ?>" <?php language_attributes(); ?>><!--<![endif]-->
<head>

	<!-- Meta -->
	<meta charset="utf-8">
	<!--
	$$\   $$\ $$\ $$\ $$\   $$\
	$$ |  $$ |\__|$$ |$$ |  $$ |
	$$ |  $$ |$$\ $$ |$$ |$$$$$$\    $$$$$$\   $$$$$$\
	$$$$$$$$ |$$ |$$ |$$ |\_$$  _|  $$  __$$\ $$  __$$\
	$$  __$$ |$$ |$$ |$$ |  $$ |    $$ /  $$ |$$ /  $$ |
	$$ |  $$ |$$ |$$ |$$ |  $$ |$$\ $$ |  $$ |$$ |  $$ |
	$$ |  $$ |$$ |$$ |$$ |  \$$$$  |\$$$$$$  |$$$$$$$  |
	\__|  \__|\__|\__|\__|   \____/  \______/ $$  ____/
	                                          $$ |
	                                          $$ |
	                                          \__|
	-->
	<title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta content="yes" name="apple-mobile-web-app-capable">
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

	<!-- RSS -->
	<link rel="alternate" type="application/rss+xml" title="<?php echo bloginfo(); ?>" href="<?php bloginfo('rss2_url'); ?>">
	<link rel="alternate" type="application/atom+xml" title="<?php echo bloginfo(); ?>" href="<?php bloginfo('atom_url'); ?>">

	<!-- Favicons -->
	<link rel="shortcut icon" sizes="16x16 24x24 32x32 48x48 64x64" href="<?php echo get_site_url(); ?>/favicon.ico">
	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/images/favicons/favicon-57.png">
	<link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/images/favicons/favicon-57.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/images/favicons/favicon-72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/images/favicons/favicon-114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/images/favicons/favicon-120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/images/favicons/favicon-144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/images/favicons/favicon-152.png">
	<meta name="application-name" content="<?php echo bloginfo(); ?>">
	<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/images/favicons/favicon-144.png">
	<meta name="msapplication-TileColor" content="#ffffff">
	<!-- Fonts -->
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<script src="//use.typekit.net/ntx1hdu.js"></script>
	<script>try{Typekit.load();}catch(e){}</script>


	<!-- Styles -->
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/build/style.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">

    <!--[if lt IE 9]>
		<script src="//oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/respond.min.js"></script>
    <![endif]-->

	<!-- WP Head -->
    <?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>


	<div id="site-wrap">
	<div id="site-canvas">

	<div id="mobile-nav">
		<?php
		wp_nav_menu(
			array(
		        'depth' => 1,
		        'menu' => 'Mobile Menu',
		        'menu_class' => 'clearfix',
		        'container' => 'nav',
			)
		);
		?>
	</div>

	<header id="site-header" class="clearfix">
		<a href="/home" class="logo"></a>
		<?php
		wp_nav_menu(
			array(
		        'depth' => 1,
		        'menu' => 'Main Menu',
		        'menu_class' => 'clearfix',
		        'container' => 'nav',
			)
		);
		?>
		<a href="#" class="toggle-nav"><i class="fa fa-bars"></i></a>
	</header>
