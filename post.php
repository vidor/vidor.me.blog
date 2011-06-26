<div class="post-aside">
	<div class="post-format"><?php the_time('m月d日, Y'); ?></div>
	<div class="post-meta">
		<ul>
			<?php the_shortlink('Shortlink', null, '<li>', '</li>');?>
				<?php if(count(get_the_category())) : ?>
			<li><?php the_category(', ');?></li><?php endif;?>
				<?php $tags_list = get_the_tag_list( '', ', ' );?>
				<?php if($tags_list) : ?>
			<li><?php the_tags( '', ', ' );?></li><?php endif;?>
			<li><?php comments_popup_link('Leave a comment', '1 Comment','% Comments' ); ?></li>
			<?php edit_post_link('Edit', '<li>', '</li>' ); ?>
			
		</ul>
	</div><!-- post-meta -->
	
</div>

<div class="post-body">
	<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
	<?php if ( is_archive() || is_search() ) : // Only display excerpts for archives and search. ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php the_content('Continue reading <span class="meta-nav">&rarr;</span>'); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	<?php endif; ?>
</div> <!-- post-body -->


