<?php

/**
 * Single post
 */

get_header();

while (have_posts()) : the_post();


?>
	<section class="favbet-single" <?php post_class(); ?>>
		<div class="container">
			<div class="favbet-single__wrap">

				<?php the_title('<h1 class="favbet-single__title">', '</h1>'); ?>

				<?php if (has_post_thumbnail()) { ?>
					<div class="favbet-single__banner">
						<?php the_post_thumbnail(); ?>
					</div>
				<?php } ?>

				<div class="favbet-single__categories">
					<?php the_category(' '); ?>
				</div>

				<div class="favbet-single__author">
					<?php favbet_posted_by_author() ?>
				</div>

				<div class="favbet-single__date">
					<?php echo get_the_date(); ?>
				</div>

				<div class="favbet-single__content">
					<?php the_content(); ?>
				</div>

				<?php
				the_tags(
					'<div class="favbet-single__tags">',
					' ',
					'</div>'
				); ?>


			</div>
		</div>
	</section>


<?php endwhile;

wp_reset_postdata();

get_footer();
