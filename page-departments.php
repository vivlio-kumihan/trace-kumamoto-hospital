<?php get_header(); ?>

<main>
  <div class="front">
    <div class="site-title"><a href="<?php echo home_url('/') ?>"><span>特定医療法人 萬生会 熊本第一病院</span></a></div>
    <h2><?php echo get_the_title(); ?></h2>
  </div>

  <div class="container">
    <div class="section-link-menu">
      <?php
      wp_nav_menu(array(
        'theme_location' => 'departments',
        'container'      => '',
        'depth'          => 2,
      ));
      ?>
    </div>

    <?php the_content(); ?>
  </div>
</main>

<?php get_footer(); ?>