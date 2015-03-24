<?php get_header(); ?>

<!-- Row for main content area - tag-gallery.php -->

<div class="small-12 profile columns" role="main">

<div class="small-12 large-2 columns menu extra-small">&nbsp;</div>
	<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); ?>
				<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
           
			
            	<div class="small-12 large-8 columns">
                
			<header>
            	<?php if ( function_exists('yoast_breadcrumb') ) {
yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<?php reverie_entry_meta(); ?>
			</header>
                    <div class="row">
                        <?php the_content(); ?>
			<?php get_template_part( 'acf' , 'gallery' ); ?>
			<?php get_template_part( 'acf' , 'flexible-fields' ); ?>

                    </div>
				</div>

			<?php get_template_part('tile-menu'); ?>

	</article>	
			
            </div>


			<footer>
				
				<p><?php the_tags(); ?></p>
			</footer>

	<?php endwhile; // End the loop ?>


<?php get_footer(); ?>


	</div>
