<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://unpkg.com/destyle.css@4.0.0/destyle.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
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

<!-- SEO SIMPLE PACK 3.2.0 -->
<!-- <meta property="og:locale" content="ja_JP">
<meta property="og:type" content="article">
<meta property="og:image" content="https://vansay.jp/wp/wp-content/themes/vansay/assets/config/ogp_kumamoto.png">
<meta property="og:title" content="特定医療法人 萬生会 熊本第一病院">
<meta property="og:description" content="特定医療法人 萬生会 熊本第一病院。地域の皆さまの「その人らしい生き方」をささえるために、手をおしまない医療、手厚い看護、心をこめた介護を提供します。">
<meta property="og:url" content="https://vansay.jp/kumamoto/">
<meta property="og:site_name" content="特定医療法人 萬生会">
<meta name="twitter:card" content="summary_large_image"> -->
<!-- / SEO SIMPLE PACK -->

<!-- 
<ul>
  <li>
    <div class="guide-title"><a href="">病院案内</a></div>
    <div class="menu">
      <ul>
        <li><a href="">病院概要</a></li>
        <li><a href="">ご挨拶</a></li>
        <li><a href="">治療実績・退院実績</a></li>
        <li><a href="">災害に強い病院</a></li>
        <li><a href="">患者様のご紹介</a></li>
        <li><a href="">資料・情報誌</a></li>
      </ul>
    </div>
  </li>
  <li>
    <div class="guide-title"><a href="">受診案内</a></div>
    <div class="menu">
      <ul>
        <li><a href="">外来診療</a></li>
        <li><a href="">入院案内</a></li>
        <li><a href="">入院の流れ</a></li>
        <li><a href="">健康診断</a></li>
      </ul>
    </div>
  </li>
  <li>
    <div class="guide-title"><a href="">診療科・部門</a></div>
    <div class="menu">
      <ul>
        <li><a href="">血液・腫瘍内科</a></li>
        <li><a href="">糖尿病・代謝内科</a></li>
        <li><a href="">消化器・肝臓内科</a></li>
        <li><a href="">循環器内科</a></li>
        <li><a href="">呼吸器内科</a></li>
        <li><a href="">リハビリテーション科</a></li>
        <li><a href="">緩和ケア内科</a></li>
        <li><a href="">看護部</a></li>
        <li><a href="">部門</a></li>
      </ul>
    </div>
  </li>
  <li><a href="">アクセス</a></li>
  <li><a href="">お知らせ</a></li>
  <li><a href="">採用情報</a></li>
</ul> 
-->