<?php
$custom_loop = new WP_Query('showposts=5&category_name=News&orderby=ASC');
if ( $custom_loop->have_posts() ) :
	echo '<ul>';
	while ( $custom_loop->have_posts() ) : $custom_loop->the_post();

		echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
	
	endwhile;
	wp_reset_query();
	echo '</ul>';
endif;
?>	