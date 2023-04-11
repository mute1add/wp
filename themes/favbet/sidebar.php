<?php

/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package favbet
 */

if (!is_active_sidebar('favbet-sidebar')) {
  return;
}
?>

<aside class="favbet-sidebar">
  <?php dynamic_sidebar('favbet-sidebar'); ?>
</aside>