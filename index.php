<?php get_header(''); ?>
<div class="wrapper">
  <main class="grid-container">
    <section id="about-section" class="col-12">

      <?php
        if (have_posts()) :
          while (have_posts()) : the_post(); ?>
            <h2 id="about-headline" class="mdc-typography--headline2" aria-labelledby="about-headline"><?php the_title()?></h2>
            <div class="mdc-typography--body1" aria-labelledby="about-headline">
              <?php the_content(); ?>
            </div>
       <?php endwhile;
       else :
         echo "<p>Sisältö on työn alla.</p>";
       endif;
       ?>
    </section>
    <section class="col-12 frontpage-bottom-section" aria-labelledby="frontpage-bottom-section-headline">
      <h4 id="frontpage-bottom-section-headline" class="mdc-typography--headline4">Ryhdy Käyttäjän ystäväksi</h4>
      <p class="mdc-typography--body1">Liittymällä jäseneksemme saat helposti tiedon KäYn tulevista tapahtumista ja mm. alan työtarjouksista!</p>
      <a href="/liity/" class="mdc-fab mdc-fab--extended">
        <span class="mdc-fab__label">Liity jäseneksi</span>
      </a>
    </section>
  </main>
<?php get_footer(); ?>
