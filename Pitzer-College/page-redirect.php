<?php
/*
Template Name: Redirect
*/
?>

<!-- Row for main content area - page.php -->


<script type="text/javascript">
<!--
window.location = "<?php the_field('redirect_to_url'); ?>"
-->
</script>

<p>If not automatically redirected please <a href="<?php the_field('redirect_to_url'); ?>">click here</a>.</p>

