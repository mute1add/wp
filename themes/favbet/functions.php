<?php

/**
 * favbet functions and definitions
 *
 * @package WordPress*
 * @package favbet
 * @since favbet 1.0
 */

// Do not allow directly accessing this file.
if (!defined('ABSPATH')) {
	exit('Direct script access denied.');
}

defined('FAVBET_T_URI') or define('FAVBET_T_URI', get_template_directory_uri());
defined('FAVBET_T_PATH') or define('FAVBET_T_PATH', get_template_directory());

require_once ABSPATH . 'wp-admin/includes/plugin.php';

require_once FAVBET_T_PATH . '/include/config-actions.php';
require_once FAVBET_T_PATH . '/include/customizer.php';
require_once FAVBET_T_PATH . '/include/function-helper.php';
require_once FAVBET_T_PATH . '/include/function-global.php';
require_once FAVBET_T_PATH . '/include/optimization.php';
require_once FAVBET_T_PATH . '/include/site-options.php';


if (!function_exists('favbet_blog_pagination')) {
    function favbet_blog_pagination($query, $paged)
    {
        if ($query->max_num_pages > 1) { ?>
            <div class="cda-post--pagination">
                <?php echo paginate_links(
                    [
                        'total'        => $query->max_num_pages,
                        'current'      => $paged,
                        'format'       => '?page=%#%',
                        'show_all'     => false,
                        'type'         => 'plain',
                        'end_size'     => 0,
                        'mid_size'     => 2,
                        'prev_next'    => true,
                        'prev_text'    => '<i class="fas fa-angle-left"></i>',
                        'next_text'    => '<i class="fas fa-angle-right"></i>',
                        'add_args'     => false,
                        'add_fragment' => '',
                    ]
                ); ?>
            </div>
        <?php }
    }
}