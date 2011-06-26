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
$post_formats = array( 'standard', 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat', 'weibo' );
add_theme_support( 'post-formats',  $post_formats);	

add_action('get_search_form', 'get_vidor_search_form');

/***
function get_vidor_search_form() {
	$form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
				<input type="text" value="' . get_search_query() . '" name="s" id="s" />
			</form>';
	return $form;
}
 * 
 */

//for the menu description output
class description_walker extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth, $args){
       global $wp_query;
       $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

       $class_names = $value = '';

       $classes = empty( $item->classes ) ? array() : (array) $item->classes;

       $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
       $class_names = ' class="'. esc_attr( $class_names ) . '"';

       $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

       $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
       $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
       $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
       $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

       $prepend = '<strong>';
       $append = '</strong>';
       $description  = ! empty( $item->description ) ? '<span>'.esc_attr( $item->description ).'</span>' : '';

       if($depth != 0)
       {
                 $description = $append = $prepend = "";
       }

        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
        $item_output .= $description.$args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}


?>
