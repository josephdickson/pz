	<?php
		// wysiwyg acf
		if(get_field('content')) {
			echo '<div class="panel white radius">' ;
			echo get_field('content') ;
			echo '</div>' ;
		}

		else; // no rows found


	?>
