<?php

/**
 * 404 Page
 */

get_header(); ?>

<div class="favbet-error">
    <div class="container">
        <div class="favbet-error__wrap">
            <div class="favbet-error__title"><?php esc_html_e('OOPS!', 'favbet'); ?></div>
            <div class="favbet-error__subtitle"><?php esc_html_e('404', 'favbet'); ?></div>
            <h1 class="favbet-error__text"><?php esc_html_e('Page not found', 'favbet'); ?></h1>
            <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Go home', 'favbet'); ?></a>
        </div>
    </div>
</div>

<?php get_footer();
