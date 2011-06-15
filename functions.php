<?php
  if ( !isset( $content_width ) ) $content_width = 768;
  if ( function_exists( 'add_theme_support' ) ) add_theme_support( 'automatic-feed-links' );
  if ( function_exists( 'register_nav_menu' ) ) register_nav_menu( 'menu', 'Menu' );
  if ( function_exists('register_sidebar') ) register_sidebar( array(
    'name' => __( 'Widgets', 'simplest' ),
    'id' => 'widgets',
    'before_widget' => '<div class="widget">',
    'after_widget' => '</div><!-- widget -->',
    'before_title' => '<h4>',
    'after_title' => '</h4>') );
	
// Add Post Format Support
add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ) );	

add_action('get_search_form', 'get_vidor_search_form');

function get_vidor_search_form() {
	$form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
				<input type="text" value="' . get_search_query() . '" name="s" id="s" />
			</form>';
	return $form;
}

?>
