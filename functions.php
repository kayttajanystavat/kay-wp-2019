<?php
  function getStyle() {
    wp_register_style('normalize', get_template_directory_uri() .'/css/normalize.css');
    wp_enqueue_style('normalize');
    wp_enqueue_style('style', get_stylesheet_uri());
  }
  add_action('wp_enqueue_scripts', 'getStyle' );

  function getCustomScripts() {
    wp_enqueue_script('custom-script', get_stylesheet_directory_uri() .
    '/custom-script.js', array()
    );
  }
  add_action('wp_enqueue_scripts', 'getCustomScripts' );

  // Ingressi
  function first_paragraph($content){
    return preg_replace('/<p([^>]+)?>/', '<p$1 class="intro-paragraph">', $content, 1);
  }
  add_filter('the_content', 'first_paragraph');

  // Theme setup
  function kayWPSetup() {
    // Navigation
    register_nav_menus(array(
      'primary' => __('Primary'),
    ));

  }
  add_action('after_setup_theme', 'kayWPSetup');
?>
