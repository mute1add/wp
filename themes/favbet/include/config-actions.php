<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package favbet
 */
add_action('widgets_init', 'favbet_widgets_init');
add_action('wp_enqueue_scripts', 'favbet_enqueue_scripts', 999);
add_action('after_setup_theme', 'favbet_register_nav_menu', 0);
add_action('enqueue_block_editor_assets', 'favbet_add_gutenberg_assets');

/**
 * Register nav menu.
 */
if (!function_exists('favbet_register_nav_menu')) {
	function favbet_register_nav_menu()
	{
		register_nav_menus(array(
			'primary-menu' => esc_html__('Primary Menu', 'favbet'),
		));
	}
}

/**
 * Register widget area.
 */
if (!function_exists('favbet_widgets_init')) {
	function favbet_widgets_init()
	{
		register_sidebar(array(
			'name'          => esc_html__('Sidebar', 'favbet'),
			'id'            => 'favbet-sidebar',
			'description'   => esc_html__('Add widgets here.', 'favbet'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		));
	}
}


/**
 * Enqueue scripts and styles.
 */
if (!function_exists('favbet_enqueue_scripts')) {
	function favbet_enqueue_scripts()
	{
		$blog_page = is_archive() || is_author() || is_category() || is_home() || is_tag() || is_search();

		if ((is_admin())) {
			return;
		}

		if (is_404()) {
			wp_enqueue_style('favbet-error-page', FAVBET_T_URI . '/assets/css/error-page.min.css');
		}

		if ($blog_page) {
			wp_enqueue_style('favbet-blog-list', FAVBET_T_URI . '/assets/css/blog.min.css');
		}

		if (is_active_sidebar('favbet-sidebar') && $blog_page) {
			wp_enqueue_style('favbet-sidebar', FAVBET_T_URI . '/assets/css/sidebar.min.css');
		}

		if (is_single()) {
			wp_enqueue_style('favbet-blog-single', FAVBET_T_URI . '/assets/css/single.min.css');
		}

		wp_enqueue_style('favbet-main-style', FAVBET_T_URI . '/assets/css/style.min.css');
		wp_enqueue_style('favbet-style', FAVBET_T_URI . '/style.css');

		wp_localize_script(
			'favbet-script',
			'get',
			array(
				'ajaxurl' => admin_url('admin-ajax.php'),
				'siteurl' => get_template_directory_uri(),
			)
		);

		if ((!is_admin()) && is_singular() && comments_open() && get_option('thread_comments')) {
			wp_enqueue_script('comment-reply');
		}

		wp_enqueue_script('favbet-script', FAVBET_T_URI . '/assets/js/script.min.js', array(), '', true);
	}
}

/**
 * Add backend styles for Gutenberg.
 */
if (!function_exists('favbet_add_gutenberg_assets')) {
	function favbet_add_gutenberg_assets()
	{
		wp_enqueue_style('favbet-gutenberg', FAVBET_T_URI . '/assets/css/gutenberg.min.css');
	}
}
