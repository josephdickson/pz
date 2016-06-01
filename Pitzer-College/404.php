<?php get_header(); ?>

<!-- Row for main content area -->
	<div class="small-12 large-8 columns" role="main">
	
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h1 class="entry-title"><?php _e('File Not Found', 'reverie'); ?></h1>
			</header>
			<div class="entry-content">
				<div class="error">
					<p class="bottom"><?php _e('The page or file you are looking for has been removed, or had its name changed.', 'reverie'); ?></p>
				</div>
				<p><?php _e('Please try the following:', 'reverie'); ?></p>
				<ul> 
					<li><?php _e('Check your spelling', 'reverie'); ?></li>
					<li><?php printf(__('Return to the <a href="%s">home page</a>', 'reverie'), home_url()); ?></li>
					<li><?php _e('Click the <a href="javascript:history.back()">Back</a> button', 'reverie'); ?></li>
					<li><?php _e('Try using the search box at the top of the page','reverie'); ?></li>
				</ul>
			</div>
		</article>

	</div>
	<?php get_sidebar(); ?>
		
<?php get_footer(); ?>
