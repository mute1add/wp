<?php

add_action('after_setup_theme', 'favbet_setup');

if (!function_exists('favbet_setup')) {
	function favbet_setup()
	{
		add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));

		add_theme_support('post-formats', array(
			'aside',
			'gallery',
			'link',
			'image',
			'quote',
			'status',
			'video',
			'audio',
			'chat'
		));

		load_theme_textdomain('favbet', get_template_directory() . '/languages');

		add_theme_support('automatic-feed-links');

		add_theme_support('title-tag');

		add_theme_support('customize-selective-refresh-widgets');

		add_theme_support('post-thumbnails');

		add_theme_support('custom-logo', array(
			'height' => 250,
			'width' => 250,
			'flex-width' => true,
			'flex-height' => true,
		));
	}
};


if (!function_exists('favbet_content_width')) {
	function favbet_content_width()
	{
		$GLOBALS['content_width'] = apply_filters('favbet_content_width', 1200);
	}
}
add_action('after_setup_theme', 'favbet_content_width', 0);

/**
 * Filter for excerpt more string
 */

if (!function_exists('favbet_excerpt_more')) {
	function favbet_excerpt_more()
	{
		return '...';
	}

	add_filter('excerpt_more', 'favbet_excerpt_more');
}


if (!function_exists('favbet_mime_types')) {
	function favbet_mime_types($mimes)
	{
		$mimes['svg'] = 'image/svg+xml';
		return $mimes;
	}

	add_filter('upload_mimes', 'favbet_mime_types');
}
