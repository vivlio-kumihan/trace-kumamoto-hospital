<?php get_header(); ?>

<main>
  <p>当法人へのお問い合わせは、お電話、メールフォームにてご連絡ください。</p>
  <p>
    フォームでのお問い合わせは下記に必要事項をご記入の上、「個人情報の取り扱いについて」をお読みいただき、<br>
    「同意して、入力内容を確認する」ボタンをクリックしてください。<br>
    内容を確認の上、担当者よりご連絡させていただきます。
  </p>

  <div class="form-wrapper">
    <h2>メールフォームからお問い合わせ</h2>
    <!-- rel -->
    <?php echo do_shortcode('[contact-form-7 id="6ecd0f5" title="コンタクトフォーム"]') ?>
    <!-- dev -->
    <!-- <?php echo do_shortcode('[contact-form-7 id="c3c0b60" title="コンタクトフォーム"]') ?> -->
  </div>
</main>

<?php get_footer(); ?>