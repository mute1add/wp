<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package favbet
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#ffffff">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php wp_body_open();

    $alarm = '<h4>' . esc_html__('Please register Top Navigation from', 'favbet') . ' <a href="' . esc_url(admin_url('nav-menus.php')) . '" target="_blank">' . esc_html__('Appearance &gt; Menus', 'favbet') . '</a></h4>';
    ?>

    <div class="favbet-main">
        <header class="favbet-header">
            <div class="container">
                <div class="favbet-header__wrapper">
                    <a class="favbet-header__logo" href="<?php echo esc_url(home_url('/')); ?>">
                        <span><?php echo get_option('blogname'); ?></span>
                    </a>

<!--                    --><?php //if (has_nav_menu('primary-menu')) {
//                        $args = array(
//                            'container_class' => 'favbet-header__menu',
//                            'container' => 'nav',
//                            'menu_class' => 'header-menu',
//                            'theme_location' => 'primary-menu'
//                        );
//                        wp_nav_menu($args);
//                    } else {
//                        echo wp_kses_post($alarm);
//                    } ?>

                    <button class="favbet-header__burger">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </div>
        </header>
        <main>