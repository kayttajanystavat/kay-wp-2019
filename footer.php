<footer class="main-footer grid-container">
  <section class="main-footer-bottom col-12">
    <?php if (get_theme_mod('kay_facebook_link') !== ''): ?>
      <a href="<?php echo get_theme_mod('kay_facebook_link'); ?>" class="footer-icon mdc-button" aria-label="Facebook"><i class="fab fa-facebook-square fa-2x"></i></a>
    <?php endif; ?>
    <?php if (get_theme_mod('kay_twitter_link') !== ''): ?>
      <a href="<?php echo get_theme_mod('kay_twitter_link'); ?>" class="footer-icon mdc-button" aria-label="Twitter"><i class="fab fa-twitter-square fa-2x"></i></a>
    <?php endif; ?>
    <?php if (get_theme_mod('kay_linkedin_link') !== ''): ?>
      <a href="<?php echo get_theme_mod('kay_linkedin_link'); ?>" class="footer-icon mdc-button" aria-label="LinkedIn"><i class="fab fa-linkedin fa-2x"></i></a>
    <?php endif; ?>
    <?php if (get_theme_mod('kay_instagram_link') !== ''): ?>
      <a href="<?php echo get_theme_mod('kay_instagram_link'); ?>" class="footer-icon mdc-button" aria-label="Instagram"><i class="fab fa-instagram fa-2x"></i></a>
    <?php endif; ?>
    <?php if (get_theme_mod('kay_whatsapp_link') !== ''): ?>
      <a href="<?php echo get_theme_mod('kay_instagram_link'); ?>" class="footer-icon mdc-button" aria-label="Whatsapp"><i class="fab fa-whatsapp fa-2x"></i></a>
    <?php endif; ?>
    <p class="mdc-typography--body1 footer-signature"><i>Käyttäjän ystävät ry</i></p>
  </section>
</footer>
</div>
<script src="https://use.typekit.net/qqq8gfx.js"></script>
<?php wp_footer(); ?>
</body>
</html>
