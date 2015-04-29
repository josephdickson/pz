</section><!-- Container End -->

<script type="text/javascript">
$(document).ready(function(){        
$(window).bind('scroll', function(){
    $(".trigger").toggle($(this).scrollTop() > 100);
});
});
</script>

<div class="row full-width hide-for-print">
	<?php get_sidebar('footer-sitemap-landing'); ?>
	<?php dynamic_sidebar("Footer"); ?>
</div>

<div class="container row full-page hide-for-print">
<footer class="row full-width" role="contentinfo">

	<div class="small-12 large-12 columns watermark hide-for-print">
<?php	
	if(function_exists('get_field')){
		$watermark = get_field('watermark' , 'option');
		echo '<img src="' . $watermark['url'] . '" alt="' . $watermark['alt'] . '" />' ;
	}
?>
	</div>
</footer>
</div>
<?php wp_footer(); ?>
</div><!-- Container End Full-Page -->

<script>
	(function($) {
		$(document).foundation();
		// Start Joyride on mouseover of class="start-joyride" rather than automatically at page load JD
			  $('.start-joyride').on('mouseover', function() {
				$(document).foundation('joyride','start');
			  });
	})(jQuery);
	

</script>

</body>
</html>
