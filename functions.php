<?php
  function getStyle() {
    wp_register_style('normalize', get_template_directory_uri() .'/css/normalize.css');
    wp_register_style('typekit', 'https://use.typekit.net/qqq8gfx.css', false);
    wp_register_style('fontawesome', 'https://use.fontawesome.com/releases/v5.5.0/css/all.css', false);
    wp_register_style('material-components-web', 'https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css', false);
    wp_enqueue_style('normalize');
    wp_enqueue_style('typekit');
    wp_enqueue_style('fontawesome');
    wp_enqueue_style('material-components-web');
    wp_enqueue_style('style', get_stylesheet_uri());
  }
  add_action('wp_enqueue_scripts', 'getStyle' );

  function getCustomScripts() {
    wp_enqueue_script('custom-script', get_stylesheet_directory_uri() .
    '/custom-script.js', array()
    );
  }
  add_action('wp_enqueue_scripts', 'getCustomScripts' );

  /* Forced introductory text on first paragraphs */
  function first_paragraph($content){
    return preg_replace('/<p([^>]+)?>/', '<p$1 class="intro-paragraph">', $content, 1);
  }
  add_filter('the_content', 'first_paragraph');

  /* Include Walker files */
  require get_template_directory() . '/inc/primary_walker.php';
  require get_template_directory() . '/inc/mobile_walker.php';

  /* Theme setup */
  function kayWPSetup() {

    // Register navigation menus
    register_nav_menus(array(
      'primary' => __('Primary'),
    ));
  }
  add_action('after_setup_theme', 'kayWPSetup');

/* Add Material Design classses to headings  */
  add_filter('the_content', 'add_classes_to_headings', 20);
  function add_classes_to_headings($content)
  {
      $doc = new DOMDocument(); //Instantiate DOMDocument
      $doc->loadHTML('<?xml encoding="utf-8" ?>' . $content); //Load the Post/Page Content as HTML
      $headline2 = $doc->getElementsByTagName('h2'); //Find all Textareas
      $headline3 = $doc->getElementsByTagName('h3'); //Find all Textareas
      $headline4 = $doc->getElementsByTagName('h4'); //Find all Textareas
      foreach($headline2 as $heading)
      {
          append_attr_to_element($heading, 'class', 'mdc-typography--headline2');
      }
      foreach($headline3 as $heading)
      {
          append_attr_to_element($heading, 'class', 'mdc-typography--headline3');
      }
      foreach($headline4 as $heading)
      {
          append_attr_to_element($heading, 'class', 'mdc-typography--headline4');
      }
      return $doc->saveHTML(); //Return modified content as string
  }

  function append_attr_to_element(&$element, $attr, $value) {
      if($element->hasAttribute($attr)) //If the element has the specified attribute
      {
          $attrs = explode(' ', $element->getAttribute($attr)); //Explode existing values
          if(!in_array($value, $attrs))
              $attrs[] = $value; //Append the new value
          $attrs = array_map('trim', array_filter($attrs)); //Clean existing values
          $element->setAttribute($attr, implode(' ', $attrs)); //Set cleaned attribute
      }
      else
          $element->setAttribute($attr, $value); //Set attribute
  }

  // Register widget area
  function widgets_area_init() {
    register_sidebar(array(
      'name' => 'Events widget',
      'id' => 'events_page_widget',
      'before_title' => '<h4>',
      'after_title' => '</h4>'
    ));
    register_sidebar(array(
      'name' => 'Join widget',
      'id' => 'join_page_widget',
      'before_title' => '<h4>',
      'after_title' => '</h4>'
    ));
  }
  add_action('widgets_init','widgets_area_init');
?>
