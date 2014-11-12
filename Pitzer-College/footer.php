</section><!-- Container End -->

<script type="text/javascript">
$(document).ready(function(){        
$(window).bind('scroll', function(){
    $(".trigger").toggle($(this).scrollTop() > 100);
});
});
</script>

<div class="row full-width">
	<?php get_sidebar('footer-sitemap-landing'); ?>
	<?php dynamic_sidebar("Footer"); ?>
</div>

<div class="container row full-page">
<footer class="row full-width" role="contentinfo">

	<div class="small-12 large-12 columns watermark"></div>
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
