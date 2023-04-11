<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package favbet
 */


$footer_text = esc_html__('&copy;', 'favbet') . date('Y') . ' ' . get_bloginfo('name') . esc_html__('All Rights Reserved.', 'favbet');
?>

</main>

<footer class="favbet-footer">
  <div class="container">
    <div class="favbet-footer__wrap">
      <div class="favbet-footer__development">
        <a href="https://favbet.com/web-design/" rel="noopener" target="_blank">Web Design</a> and
        <a href="https://favbet.com/wordpress-development/" rel="noopener" target="_blank">Development</a> by
        <a href="https://favbet.com/" rel="noopener" target="_blank">favbet</a>
      </div>
      <div class="favbet-footer__copyright"><?php echo wp_kses($footer_text, 'favbet'); ?></div>
    </div>
  </div>
</footer>

</div>

<?php wp_footer(); ?>

</body>

</html>