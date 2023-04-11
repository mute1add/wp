<?php

/**
 * Category Template
 */

get_header();


$term = get_queried_object();
$term_name = $term->taxonomy;

$title = is_category() ? esc_html__('Category: ', 'favbet') . $term->name : $title;
$title = is_tag() ? esc_html__('Tag: ', 'favbet') . $term->name : $title;


if (have_posts()) : ?>
  <section class="favbet-blog">

    <?php if (!empty($title)) { ?>
      <div class="favbet-blog__heading">
        <div class="container">
          <h1><?php echo esc_html__($title, 'favbet'); ?></h1>
        </div>
      </div>
    <?php } ?>

    <div class="favbet-blog__main">
      <div class="container">
        <div class="favbet-blog__main-wrap">
          <?php while (have_posts()) : the_post();

            favbet_post_card();

          endwhile;
          wp_reset_postdata(); ?>
        </div>
        <?php favbet_custom_pagination(); ?>
      </div>
    </div>
  </section>

<?php else :
  get_template_part('template-parts/theme', 'none');
endif;

get_footer();
