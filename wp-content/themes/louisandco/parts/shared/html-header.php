<!DOCTYPE HTML>
<html class="no-js" lang="en">
	<head>
		<title><?php wp_title(''); ?></title>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
	  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon.ico"/>
		<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
		
		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
			<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/lte-ie7.js"></script>
			<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/ie.css" type="text/css" media="screen">
		<![endif]-->
		
		<script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmepGLYO31VOHdYAudfnU7oU0zTNUlfDc&sensor=false">
    </script>
		
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
