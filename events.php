<?php /* Template Name: Events page */ ?>
<?php get_header('page'); ?>
<div class="wrapper page-wrapper">
  <main class="grid-container">
    <section class="col-12" aria-labelledby="page-headline">
      <?php
        if (have_posts()) :
          while (have_posts()) : the_post(); ?>
            <h3 id="page-headline" class="mdc-typography--headline3"><?php the_title()?></h3>
            <div class="mdc-typography--body1">
              <?php the_content(); ?>
              <?php if (is_active_sidebar('events_page_widget')) : ?>
                <?php dynamic_sidebar('events_page_widget'); ?>
              <?php endif; ?>
            </div>
       <?php endwhile;
       else :
         echo "<p>Sisältö on työn alla.</p>";
       endif;
       ?>

    </section>
  </main>
  <?php get_footer(); ?>
