<div class="row footer-sitemap landing">
	<div class="small-12 large-4 columns text-right small border-right">


<?php //Contact Information
	get_sidebar('contact-information'); ?>


<?php

	$logo_footer = get_field('logo_footer' , 'option');
	$logo_url_footer = get_field('url_header' , 'option');

 ?>

<a href="<?php echo $logo_url_footer; ?>"><img class="left" alt="<?php echo $logo_footer['alt']; ?>" src="<?php echo $logo_footer['url']; ?>" /></a>


<?php //Footer Site map
get_sidebar('site-map'); ?>

	</div>
</div>
