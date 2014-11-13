<div class="row footer-sitemap landing">
	<div class="small-12 large-4 columns text-right small border-right">

<a href="<?php the_field('url_footer'); ?>"><img class="left" alt="" src="<?php the_field('logo_footer'); ?>" /></a>

<?php //Contact Information
	get_sidebar('contact-information'); ?>


<?php //Footer Site map
get_sidebar('site-map'); ?>

	</div>
</div>
