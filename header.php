<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="Käyttäjän ystävät ry on käytettävyysopiskelijoiden ja muiden alasta kiinnostuneiden poikkitieteellinen yhdistys. Yhdistyksen tarkoituksena on edistää käytettävyydestä ja käyttöliittymistä kiinnostuneiden ihmisten verkottumista, tiedottaa alan opetuksesta, tapahtumista ja uravaihtoehdoista sekä lisätä yleisesti ihmisten tietoisuutta käytettävyydestä ja siihen liittyvistä asioista.">
    <link rel="shortcut icon" type="image/png" href="/img/favicon.ico"/>
    <title><?php bloginfo('name') ?></title>
    <link rel="canonical" href="https://kayttajanystavat.fi/">
    <?php wp_head(); ?>
  </head>
  <body <?php body_class( 'mdc-typography' ); ?>>
    <header class="top-bar frontpage-top-bar">
      <a href="<?php echo home_url(); ?>" class="top-bar-logo">
        <img src="<?php echo get_template_directory_uri() ?>/img/kay-white_vector.svg" alt="Käyttäjän ystävät ry">
      </a>
      <nav class="top-bar-nav">
        <?php
          $args = array(
            'theme_location' => 'primary',
            'container' => false,
            'walker' => new Walker_Nav_Primary()
          );
          wp_nav_menu( $args );
         ?>
       </nav>
      <button class="mdc-button menu-button" onclick="openMenu()">Valikko</button>
      <div class="mdc-menu mdc-menu-surface" tabindex="-1">
        <?php
          $args = array(
            'theme_location' => 'primary',
            'container' => false,
            'items_wrap' => '<div class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical">%3$s</div>',
            'walker' => new Walker_Nav_Mobile()
          );
          wp_nav_menu( $args );
         ?>
       </div>
    </header>
    <div class="frontpage-header">
      <div class="grid-container">
        <section class="frontpage-header-column" aria-labelledby="frontpage-top-headline">
          <h1 id="frontpage-top-headline" class="frontpage-headline"><?php echo get_theme_mod('kay_main_headline'); ?></h1>
          <button onClick="document.getElementById('about-section').scrollIntoView({behavior: 'smooth', block: 'start'});"
          aria-label="Skrollaa alaspäin seuraavaan sisältöön" title="Skrollaa seuraavaan sisältöön" class="scroll-button mdc-button" type="button" name="button">
            <span><?php echo get_theme_mod('kay_header_button_text'); ?></span>
            <i class="fas fa-angle-down"></i>
          </button>
        </section>
      </div>
    </div>
