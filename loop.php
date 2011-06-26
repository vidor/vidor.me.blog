<?php /* If there are no posts to display, such as an empty archive page */ ?>
<?php if ( ! have_posts() ) : ?>
	<div id="post-0" class="post error404 not-found">
		<h1 class="entry-title"><?php _e( 'Not Found', 'twentyten' ); ?></h1>
		<div class="entry-content">
			<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyten' ); ?></p>
			<?php get_search_form(); ?>
		</div><!-- .entry-content -->
	</div><!-- #post-0 -->
<?php endif; ?>


<?php //wordpress loop start ?>
	 
<?php global $post_formats;//this var in functions.php ?>

<?php while ( have_posts() ) : the_post(); ?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php $is_standard = false;
		foreach($post_formats as $format) {
			if(has_post_format($format)) {
				get_template_part('post', $format);
				$is_standard = true;
				break;
			}
		}
		//Note that posts with the default format will return a value of FALSE
		if(!$is_standard) get_template_part('post', 'standard');
	?>

</div><!-- #post-## -->

	<?php comments_template( '', true ); ?>

<?php endwhile; // End the loop. Whew. ?>

<?php if (function_exists("pagination")) pagination($additional_loop->max_num_pages); ?>


