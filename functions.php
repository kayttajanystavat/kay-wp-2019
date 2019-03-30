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
    '/custom-script.js', array('jquery'), '3.3.1', true
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


  /* Header customization options */
  function kay_customize_register( $wp_customize ) {
    $wp_customize->add_section('kay_header_section', array(
  		'title' => 'Header',
  		'priority' => 30,
  	));
    $wp_customize->add_setting('kay_main_headline', array(
  		'default' => 'Olemme <strong>käytettävyydestä</strong>, <strong>käyttäjäkokemuksesta</strong> ja <strong>palvelumuotoilusta</strong> kiinnostuneiden poikkitieteellinen yhdistys.',
  	));
  	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kay_main_headline_control', array(
  		'label' => 'Main headline',
  		'section' => 'kay_header_section',
  		'settings' => 'kay_main_headline',
      'type' => 'text',
  	)));

    $wp_customize->add_setting('kay_header_button_text', array(
  		'default' => 'Tutustu meihin',
  	));
  	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kay_header_button_text_control', array(
  		'label' => 'Header button text',
  		'section' => 'kay_header_section',
  		'settings' => 'kay_header_button_text',
      'type' => 'text',
  	)));

    /* Promotion customization options */
    $wp_customize->add_section('kay_join_section', array(
  		'title' => 'Promotion',
  		'priority' => 31,
  	));
    $wp_customize->add_setting('kay_join_headline', array(
      'default' => 'Ryhdy Käyttäjän ystäväksi!',
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kay_join_headline_control', array(
      'label' => 'Promo headline',
      'section' => 'kay_join_section',
      'settings' => 'kay_join_headline',
      'type' => 'text',
    )));

    $wp_customize->add_setting('kay_join_paragraph', array(
      'default' => 'Liittymällä jäseneksemme saat helposti tiedon KäYn tulevista tapahtumista ja mm. alan työtarjouksista!',
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kay_join_paragraph_control', array(
      'label' => 'Promo paragraph',
      'section' => 'kay_join_section',
      'settings' => 'kay_join_paragraph',
      'type' => 'text',
    )));

    $wp_customize->add_setting('kay_join_button_text', array(
  		'default' => 'Liity jäseneksi',
  	));
  	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kay_join_button_text_control', array(
  		'label' => 'Promo button text',
  		'section' => 'kay_join_section',
  		'settings' => 'kay_join_button_text',
      'type' => 'text',
  	)));

    $wp_customize->add_setting('kay_join_button_link', array());
  	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kay_join_button_link_control', array(
  		'label' => 'Promo button link',
  		'section' => 'kay_join_section',
  		'settings' => 'kay_join_button_link',
      'type' => 'dropdown-pages',
  	)));

    /* Social media icons */
    $wp_customize->add_section('kay_some_section', array(
  		'title' => 'Social media icons',
  		'priority' => 32,
  	));

    $wp_customize->add_setting('kay_facebook_link', array(
  		'default' => '',
  	));
  	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kay_facebook_link_control', array(
  		'label' => 'Facebook',
  		'section' => 'kay_some_section',
  		'settings' => 'kay_facebook_link',
      'type' => 'text',
  	)));

    $wp_customize->add_setting('kay_twitter_link', array(
  		'default' => '',
  	));
  	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kay_twitter_link_control', array(
  		'label' => 'Twitter',
  		'section' => 'kay_some_section',
  		'settings' => 'kay_twitter_link',
      'type' => 'text',
  	)));

    $wp_customize->add_setting('kay_linkedin_link', array(
  		'default' => '',
  	));
  	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kay_linkedin_link_control', array(
  		'label' => 'LinkedIn',
  		'section' => 'kay_some_section',
  		'settings' => 'kay_linkedin_link',
      'type' => 'text',
  	)));

    $wp_customize->add_setting('kay_instagram_link', array(
  		'default' => '',
  	));
  	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kay_instagram_link_control', array(
  		'label' => 'Instagram',
  		'section' => 'kay_some_section',
  		'settings' => 'kay_instagram_link',
      'type' => 'text',
  	)));

    $wp_customize->add_setting('kay_whatsapp_link', array(
  		'default' => '',
  	));
  	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kay_whatsapp_link_control', array(
  		'label' => 'Whatsapp',
  		'section' => 'kay_some_section',
  		'settings' => 'kay_whatsapp_link',
      'type' => 'text',
  	)));

  }
  add_action('customize_register', 'kay_customize_register');
?>
