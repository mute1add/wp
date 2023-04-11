<?php

if (!function_exists('favbet_post_card')) {
	function favbet_post_card()
	{
		$author_id = get_the_author_meta('ID');
?>
		<div class="favbet-post-card">
			<?php if (!empty(get_the_title())) { ?>
				<div class="favbet-post-card__title">
					<h3>
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</h3>
				</div>
			<?php } ?>

			<div class="favbet-post-card__text"><?php the_excerpt(); ?></div>

			<?php if (has_post_thumbnail()) { ?>
				<div class="favbet-post-card__media">
					<?php the_post_thumbnail(); ?>
				</div>
			<?php } ?>

			<div class="favbet-post-card__categories">
				<?php the_category(' '); ?>
			</div>

			<div class="favbet-post-card__author">
				<?php echo get_avatar($author_id, 30); ?>
				<div class="favbet-post-card__author-name">
					<b><?php echo esc_html(get_the_author()); ?></b>
				</div>
			</div>

			<a href="<?php the_permalink(); ?>">
				<?php echo get_the_date(); ?>
			</a>
		</div>

		<?php
	}
}

/**
 * Blog Pagination 
 */
if (!function_exists('favbet_custom_pagination')) {
	function favbet_custom_pagination($query = null)
	{
		global $wp_query;
		$query = $query ? $query : $wp_query;
		$total_pages = $query->max_num_pages;

		if ($total_pages > 1) {
			$current_page = max(1, get_query_var('paged'));
			$paginate_links = paginate_links(array(
				'base' => add_query_arg('paged', '%#%'),
				'format' => 'page/%#%',
				'current' => $current_page,
				'total' => $total_pages,
				'prev_text' => esc_html__('« Prev', 'favbet'),
				'next_text' => esc_html__('Next »', 'favbet'),
			));

			if ($paginate_links) {
				echo '<div class="favbet-pagination">' . $paginate_links . '</div>';
			}
		}
	}
}

/**
 * Prints HTML with meta information about theme author.
 */
if (!function_exists('favbet_posted_by_author')) {
	function favbet_posted_by_author()
	{
		if (!get_the_author_meta('description') && post_type_supports(get_post_type(), 'author')) {
			printf(
				esc_html__('By %s', 'favbet'),
				'<a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '" rel="author">' . esc_html(get_the_author()) . '</a>'
			);
		}
	}
}

// Сomment
if (!function_exists('favbet_comments')) {
	function favbet_comments()
	{
		if (comments_open() || '0' != get_comments_number() && wp_count_comments(get_the_ID())) { ?>
			<div class="favbet-single__comments">
				<?php comments_template('', true); ?>
			</div>
<?php }
	}
}
