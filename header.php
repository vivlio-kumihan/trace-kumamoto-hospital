<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://unpkg.com/destyle.css@4.0.0/destyle.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.7/swiper-bundle.min.css" />
  <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.7/swiper-bundle.min.js"></script>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php if (is_page('contact')) : ?>
    <header>
      <div class="logo"><a href="<?php echo home_url('/') ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo_kumamoto.svg" alt=""></a></div>
      <h1><?php echo get_the_title(); ?>フォーム</h1>
    </header>
  <?php else : ?>
    <header>
      <button id="menu-toggle-btn" class="menu-toggle-btn">
        <span></span><span></span><span></span>
      </button>
      <div id="menu-wrapper" class="menu-wrapper">
        <div class="logo-landscape"></div>

        <div class="global-menu">
          <?php
          wp_nav_menu(array(
            'theme_location' => 'global-menu',
            'container'      => '',
            'depth'          => 2,
          ));
          ?>
        </div>
        <div class="lower-menu">
          <?php
          wp_nav_menu(array(
            'theme_location' => 'sub-menu',
            'container'      => '',
            'depth'          => 2,
          ));
          ?>
        </div>

        <div id="hamburger-menu" class="hamburger-menu">
          <div class="main-menu">
            <?php
            wp_nav_menu(array(
              'theme_location' => 'hamburger-menu',
              'container'      => '',
              'depth'          => 2,
            ));
            ?>
          </div>
          <div class="group-link">
            <h2>萬生会グループリンク</h2>
            <ul>
              <li><a href="/vansay-top"><span class="leading-arrow"></span>萬生会総合トップ</a></li>
              <li><a href="/kumamoto-hospital"><span class="leading-arrow"></span>熊本第一病院</a></li>
              <li><a href="/koshi-hospital"><span class="leading-arrow"></span>合志第一病院</a></li>
              <li><a href="/zaitaku"><span class="leading-arrow"></span>在宅事業部</a></li>
            </ul>
          </div>
        </div>

        <div class="hospital-address">
          <div class="site-title"><a href="<?php echo home_url('/') ?>"><span>特定医療法人 萬生会 熊本第一病院</span></a></div>
          <address>
            &#12306;862-0965 熊本市南区田迎町田井島224<br>
            電話：<a href="tel:0963707333">096-370-7333</a><br>
            FAX：096-370-7334
          </address>
        </div>
        <div class="lower">
          <a href="/privacy-policy">プライバシーポリシー</a>
          <small>© vansay.</small>
        </div>
      </div>
    </header>
  <?php endif; ?>