<?php /* Template Name: Board page */ ?>
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
              <?php if( have_rows('boards_list') ):
                $count = 0;
                while( have_rows('boards_list') ): the_row();
                  $boardName = get_sub_field('board_name');
                ?>
                  <section class="board-persons-section" aria-labelledby="2019-headline">
                    <h4 id="<?php echo $boardName; ?>-headline" class="mdc-typography--<?php if ($count > 0) { ?>headline5<?php } else { ?>headline4<?php } ?>">Hallitus <?php echo $boardName; ?></h4>
                    <div class="grid-container">
                      <?php if( have_rows('board_members') ):
                         while( have_rows('board_members') ): the_row();
                          $memberTitle = get_sub_field('member_title');
                          $memberName = get_sub_field('member_name');
                        ?>
                          <article class="board-person<?php if ($count > 0) { ?> past<?php } ?>">
                            <span><?php echo $memberTitle; ?></span><br />
                            <span><strong><?php echo $memberName; ?></strong></span>
                          </article>
                        <?php endwhile; ?>
                      <?php endif; ?>
                    </div>
                  </section>
                <?php
                  $count++;
                endwhile;
              endif; ?>
            </div>
       <?php endwhile;
       else :
         echo "<p>Sisältö on työn alla.</p>";
       endif;
       ?>
    </section>
  </main>
  <?php get_footer(); ?>
