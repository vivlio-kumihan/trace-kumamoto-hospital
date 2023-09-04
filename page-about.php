<?php get_header(); ?>

<main>
  <div class="front">
    <div class="site-title"><span>特定医療法人 萬生会 熊本第一病院</span></div>
    <h2>病院案内</h2>
    <!-- <img class="divider" src="<?php echo get_template_directory_uri(); ?>/img/divider.png" alt=""> -->
  </div>

  <div class="container">
    <div class="section-link-menu">
      <?php
      wp_nav_menu(array(
        'theme_location' => 'about',
        'container'      => '',
        'depth'          => 2,
      ));
      ?>
    </div>

    <?php the_content(); ?>
  </div>
</main>

<?php get_footer(); ?>