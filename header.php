<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />    
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <title><?php bloginfo( 'name' ); ?><?php wp_title( '&mdash;' ); ?></title>
    <?php if ( is_singular() && get_option( 'thread_comments') ) wp_enqueue_script( 'comment-reply' ); ?>
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
  	<div id="wrapper">
      <div id="header">
      	<div id="logo">
	        <h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo( 'name' ); ?></a></h1>
	        <p id="description"><?php bloginfo( 'description' ); ?></p>
	        <?php if ( has_nav_menu( 'menu' ) ) : wp_nav_menu(); else : ?>
	          <ul><?php wp_list_pages( 'title_li=&depth=-1' ); ?></ul>
	        <?php endif; ?>
        </div><!-- logo -->
        <div id="search-form">
        	<?php get_search_form(); ?>
        </div><!-- search-form -->
      </div><!-- header -->