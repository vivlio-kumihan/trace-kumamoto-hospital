<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://unpkg.com/destyle.css@4.0.0/destyle.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
  <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <header>
    <div class="menu-wrapper">
      <div class="global-menu">
        <?php
        wp_nav_menu(array(
          'theme_location' => 'global-menu',
          'container'      => '',
          'depth'          => 2,
        ));
        ?>
      </div>
      <div class="sub-menu">
        <?php
        wp_nav_menu(array(
          'theme_location' => 'sub-menu',
          'container'      => '',
          'depth'          => 2,
        ));
        ?>
      </div>
    </div>
  </header>