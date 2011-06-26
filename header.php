<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />    
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <title><?php bloginfo( 'name' ); ?><?php wp_title( '/' ); ?></title>
    <?php if ( is_singular() && get_option( 'thread_comments') ) wp_enqueue_script( 'comment-reply' ); ?>
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
  	<div id="wrapper">
      <div id="header">      	
      	<div id="logo">
	        <h1><a href="<?php bloginfo('url'); ?>"><span><?php bloginfo( 'name' ); ?></span></a></h1>
	        <p id="description"><?php bloginfo( 'description' ); ?></p>
        </div><!-- logo -->
        <?php wp_nav_menu( array('menu' => 'Vidor Nav','container' => '', 'walker' => new description_walker() )); ?>
      </div><!-- header -->