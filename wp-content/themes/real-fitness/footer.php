<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Real Fitness
 */
?>
<div id="footer">
  <div class="copywrap text-center">
    <div class="container">
      <p class="mb-0"><?php echo esc_html(get_theme_mod('real_fitness_copyright_line',__('Fitness WordPress Theme','real-fitness'))); ?></p>
    </div>
  </div>
</div>
<?php wp_footer(); ?>
</body>
</html>