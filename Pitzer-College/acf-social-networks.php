<?php // Social Networking Icons
				$icon_size = get_field('icon_size', 'option');
				$icon_appearance = get_field('icon_appearance', 'option');
			?>
			<?php if(get_field('social_networks', 'option')): ?>

				<ul class="social-icons <?php echo $icon_size . ' ' . $icon_appearance ; ?>">

				<?php while(has_sub_field('social_networks', 'option')): ?>

					<li class="<?php the_sub_field('social_icon'); ?>" alt="<?php the_sub_field('social_icon'); ?>" title="<?php the_sub_field('social_icon'); ?>"><a href="<?php the_sub_field('social_network_url'); ?>"><span><?php the_sub_field('social_icon'); ?></span></a></li>

				<?php endwhile; ?>

				</ul>

<?php endif; ?>
