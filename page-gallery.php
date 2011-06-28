<?php
/*
Template Name: Page-gallery
*/
?>

<?php

$args = array(
	'tax_query' => array(
		'relation' => 'AND',
		array(
			'taxonomy' => 'post_format',
			'field' => 'slug',
			'terms' => array( 'post-format-gallery' )
		)
	)
);
$query = new WP_Query( $args ); ?>

<?php //wordpress loop start ?>
	 

<?php while ( $query->have_posts() ) :
	$query->the_post();
	
the_title();
echo '<br /><pre>';

$images =& get_children('post_type=attachment&post_mime_type=image&post_parent=' . $post->ID );

foreach($images as $image) {
	echo '<img src="' . $image->guid . '" />';
}
	
?>

</div><!-- #post-## -->

<?php endwhile; // End the loop. Whew. ?>




