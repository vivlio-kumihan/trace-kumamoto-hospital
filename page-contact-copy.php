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
  <header>
    <div class="logo"><a href="<?php echo home_url('/') ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo_kumamoto.svg" alt=""></a></div>
    <h1><?php echo get_the_title(); ?>フォーム</h1>
  </header>
  <main>
    <p>当法人へのお問い合わせは、お電話、メールフォームにてご連絡ください。</p>
    <p>
      フォームでのお問い合わせは下記に必要事項をご記入の上、「個人情報の取り扱いについて」をお読みいただき、<br>
      「同意して、入力内容を確認する」ボタンをクリックしてください。<br>
      内容を確認の上、担当者よりご連絡させていただきます。
    </p>

    <div class="form-wrapper">
      <h2>メールフォームからお問い合わせ</h2>
      <?php echo do_shortcode('[contact-form-7 id="c3c0b60" title="コンタクトフォーム"]') ?>
    </div>
  </main>

  <footer class="footer-contact">
    © Vansay.
  </footer>


  <!-- <dl class="contact-form">
  <div>
    <dt><span>必須</span>お名前</dt>
    <dd>[text* sender placeholder "例）田中 太郎"]</dd>
  </div>
  <div>
    <dt><span>必須</span>ふりがな</dt>
    <dd>[text* ruby placeholder "例）たなか たろう"]</dd>
  </div>
  <div>
    <dt><span>必須</span>メールアドレス</dt>
    <dd>[email* email placeholder "例）example@example.com"]</dd>
  </div>
  <div>
    <dt><span>必須</span>電話番号</dt>
    <dd>[tel* tel placeholder "000-000-0000"]</dd>
  </div>
  <div>
    <dt><span>必須</span>お問い合わせ内容</dt>
    <dd>
      [text* contents "例）お問い合わせ内容を入力してください。"]]
    </dd>
  </div>
</dl>
<div class="agreement">
  <p>
    当法人の「個人情報保護方針」をお読みになり、<br>
    内容に同意いただける場合は「同意して入力内容を確認する」ボタンを押して、<br>
    入力内容の確認画面へ進んでください。
  </p>
  <button>[submit "同意して入力内容を確認する"]</button>
  <p>送信ボタンを押すことは、「個人情報保護方針」に同意されたものとみなします。</p>
</div> -->