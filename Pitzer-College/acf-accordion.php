	<?php

	// check if the accordion repeater field has rows of data
	if( have_rows('accordion') ): ?>

 	<?php // loop through the rows of data
	    while ( have_rows('accordion') ) : the_row(); ?>

		<div class="section-container accordion content" data-section="accordion">
			<section>
				<p class="title" data-section-title><strong><a href="#"><?php the_sub_field('accordion_title'); // accordion title acf ?></a></strong></p>
		<div class="content" data-section-content>
			<?php the_sub_field('accordion_content'); // accordion content acf ?>
		</div>
			</section>
		</div>



		<?php 

	    endwhile;

	else :

	    // no rows found

	endif;

	?>
