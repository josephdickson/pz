<?php
/**
 * The template for displaying headlines. Used for both single and index/archive/search.
 *
 * @subpackage Reverie
 * @since Reverie 4.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php reverie_entry_meta(); ?>
	</header>
	<footer>
    <ul class="inline-list">
		<li class="small"><?php the_time('F j, Y') ?></li><li class="small"><?php $tag = get_the_tags(); if (!$tag) { } else { ?><?php the_tags(); ?><?php } ?></li>
	<ul>
	</footer>
	<hr />
</article>